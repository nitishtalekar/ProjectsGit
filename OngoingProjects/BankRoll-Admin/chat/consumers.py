import json
from channels.generic.websocket import AsyncWebsocketConsumer
from channels.db import database_sync_to_async
from .models import *
import random

class ChatConsumer(AsyncWebsocketConsumer):
    @database_sync_to_async
    def get_count(self, name):
        return int(Room.objects.filter(name=name)[0].count)

    @database_sync_to_async
    def add_count(self, name):
        count = int(Room.objects.filter(name=name)[0].count)
        Room.objects.filter(name=name).update(count=str(count+1))
        return 0

    @database_sync_to_async
    def del_count(self, name):
        count = int(Room.objects.filter(name=name)[0].count)
        Room.objects.filter(name=name).update(count=str(count-1))
        return 0

    @database_sync_to_async
    def add_user(self, name, channel_name):
        User.objects.filter(name=name).update(channel_name=channel_name, tag="1")
        return 0

    @database_sync_to_async
    def del_user(self, name, channel_name):
        User.objects.filter(name=name).update(channel_name="", tag="-1")
        return 0

    @database_sync_to_async
    def roll(self, name):
        room = Room.objects.filter(name=name)
        id = room[0].game
        game = Game.objects.get(id=id)
        if game.player_count == game.type:
            return game
        return 0

    @database_sync_to_async
    def get_name(self, id):
        user = User.objects.get(id=id)
        return user.name

    @database_sync_to_async
    def change_turn(self, id):
        game = Game.objects.get(id=id)
        turn = (int(game.turn) + 1) % int(game.type)
        Game.objects.filter(id=id).update(turn=str(turn))
        return 1

    @database_sync_to_async
    def get_turn(self, id):
        return int(Game.objects.get(id=id).turn)

    async def connect(self):
        self.room_name = self.scope['url_route']['kwargs']['room_name']
        self.room_group_name = 'chat_%s' % self.room_name

        # Join room group
        await self.channel_layer.group_add(
            self.room_group_name,
            self.channel_name
        )

        await self.accept()
        await self.add_count(self.room_name)
        await self.add_user(self.scope["session"]["name"], self.channel_name)
        game = await self.roll(self.room_name)

        await self.channel_layer.group_send(
            self.room_group_name,
            {
                'type': 'chat_message',
                'message':"",
                'name':self.scope["session"]["name"],
                'roll':0
            }
        )

        if game != 0:
            player = game.player.split("#")
            turn = player[int(game.turn)]
            name = await self.get_name(turn)

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'message':"",
                    'name':"",
                    'roll':str(name)
                }
            )


    async def disconnect(self, close_code):
        # Leave room group

        await self.del_count(self.room_name)
        count = await self.get_count(self.room_name)
        await self.del_user(self.scope["session"]["name"], self.channel_name)

        await self.channel_layer.group_send(
            self.room_group_name,
            {
                'type': 'chat_message',
                'message':self.scope["session"]["name"],
                'count':count
            }
        )

        await self.channel_layer.group_discard(
            self.room_group_name,
            self.channel_name
        )


    # Receive message from WebSocket
    async def receive(self, text_data):
        text_data_json = json.loads(text_data)
        message = text_data_json['message']
        curr_player = text_data_json['name']
        roll = text_data_json['roll']
        # Send message to room group

        if roll == "roll":
            roll = random.randint(1,6)
            game = await self.roll(self.room_name)
            await self.change_turn(game.id)
            game = await self.roll(self.room_name)
            player = game.player.split("#")
            turn = player[int(game.turn)]
            print(turn)
            name = await self.get_name(turn)
            print(name)

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'message': str(roll) + "#" + curr_player,
                    'name':'',
                    'roll':name
                }
            )
            return

        await self.send(text_data=json.dumps({
            'type': "yo",
            'message': "sender"
        }))
        await self.channel_layer.group_send(
            self.room_group_name,
            {
                'type': 'chat_message',
                'message': message,
            }
        )

    # Receive message from room group
    async def chat_message(self, event):
        message = event['message']
        type = event['type']
        roll = event['roll']
        # count = event['count']
        name = event['name']
        count = await self.get_count(self.room_name)

        # Send message to WebSocket
        await self.send(text_data=json.dumps({
            'type': type,
            'message': message,
            'count':count,
            'name':name,
            'roll':roll
        }))
