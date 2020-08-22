import json
from channels.generic.websocket import AsyncWebsocketConsumer
from channels.db import database_sync_to_async
from .models import *
import random



# 0 - Message
# 1 - Add
# 2 - Remove
# 3 - Roll-btn
# 4 - Roll-value
# 5 - Card-data



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
    def get_game(self, name):
        room = Room.objects.filter(name=name)
        id = room[0].game
        game = Game.objects.get(id=id)
        return game

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
    def change_roll(self, id, roll):
        game = Game.objects.get(id=id)
        curr_loc_all = game.roll.split("#")
        curr_loc = curr_loc_all[int(game.turn)]
        curr_color_all = game.color.split("#")
        curr_color = curr_color_all[int(game.turn)]
        new_loc = (int(curr_loc) + roll) % 28
        curr_loc_all[int(game.turn)] = str(new_loc)
        colors = []
        for i in range(len(curr_loc_all)):
            if curr_loc_all[i] == str(new_loc):
                colors.append(curr_color_all[i])
        Game.objects.filter(id=id).update(roll="#".join(curr_loc_all))
        return curr_loc, curr_color, new_loc, colors

    @database_sync_to_async
    def get_turn(self, id):
        return int(Game.objects.get(id=id).turn)

    @database_sync_to_async
    def get_card(self, id):
        return Board.objects.get(id=id)

    @database_sync_to_async
    def game_update(self, id, card, amount, worth, cost):
        Game.objects.filter(id=id).update(card=card, amount=amount, worth=worth, cost=cost)
        return 1

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
        game = await self.get_game(self.room_name)
        player_all = game.player.split("#")
        color = game.color.split("#")
        amount = game.amount.split("#")
        worth = game.worth.split("#")
        player = []
        for i in player_all:
            player.append(await self.get_name(i))

        await self.channel_layer.group_send(
            self.room_group_name,
            {
                'type': 'chat_message',
                'tag': 1,
                'name':self.scope["session"]["name"],
                'player':player,
                'color':color,
                'amount':amount,
                'worth':worth,
            }
        )
        print("add")

        game = await self.roll(self.room_name)

        if game != 0:
            player = game.player.split("#")
            colors = game.color.split("#")
            turn = player[int(game.turn)]
            name = await self.get_name(turn)
            color = colors[int(game.turn)]

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':3,
                    'roll':str(name),
                    'color':color
                }
            )
            print("roll1")


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
                'tag':2,
                'count':count
            }
        )

        await self.channel_layer.group_discard(
            self.room_group_name,
            self.channel_name
        )
        print("delete")


    # Receive message from WebSocket
    async def receive(self, text_data):
        text_data_json = json.loads(text_data)
        tag = text_data_json['tag']
        if tag == 3:
            curr_player = text_data_json['name']
            roll = text_data_json['roll']
            roll = random.randint(1,6)
            # roll = 12
            game = await self.roll(self.room_name)
            curr_loc, curr_color, new_loc, colors = await self.change_roll(game.id, roll)
            await self.change_turn(game.id)
            game = await self.roll(self.room_name)
            player = game.player.split("#")
            turn = player[int(game.turn)]
            name = await self.get_name(turn)
            color = game.color.split("#")
            next_color = color[int(game.turn)]

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':4,
                    'curr_player':curr_player,
                    'curr_loc':curr_loc,
                    'curr_color':curr_color,
                    'roll_value':roll,
                    'new_loc':new_loc,
                    'next_color':next_color,
                    'colors':colors
                }
            )
            print("next_roll", curr_player, curr_loc, curr_color, roll, new_loc, next_color)
            return

        if tag == 0:
            message = text_data_json['message']

            await self.send(text_data=json.dumps({
                'type': "yo",
                'tag':0,
                'message': "sender"
            }))
            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':0,
                    'message': message,
                }
            )
            print("message")
            return

        if tag == 5:
            name = text_data_json['name']
            card_id = text_data_json['card'].split("#")
            print(card_id)
            game = await self.roll(self.room_name)
            players = game.player.split("#")
            color = game.color.split("#")
            curr_color = color[int(game.turn)]
            name = players[int(game.turn)]
            name = await self.get_name(name)
            if card_id[0] == "buy":
                turn = (int(game.turn) - 1) % int(game.type)
                cards = await self.get_card(card_id[1])
                user_card = game.card.split("#")
                card = user_card[turn].split(";")
                if card[0] == "-1":
                    card[0] = str(card_id[1])
                else:
                    card.append(str(card_id[1]))
                user_card[turn] = ";".join(card)
                # print("card", "#".join(user_card))

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount - int(cards.buy)
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth - int(cards.buy)
                worths[turn] = str(worth)
                # print("worth", "#".join(worths))

                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                if cost[0] == "-1":
                    cost[0] = str(cards.rent)
                else:
                    cost.append(str(cards.rent))
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                await self.game_update(game.id, "#".join(user_card), "#".join(amounts), "#".join(worths), "#".join(user_cost))
                names = []
                for i in players:
                    names.append(await self.get_name(i))


                await self.channel_layer.group_send(
                    self.room_group_name,
                    {
                        'type': 'chat_message',
                        'tag':5,
                        'names': names,
                        'color':color,
                        'curr_color':color[turn],
                        'user_card':user_card,
                        'amount':amounts,
                        'worth':worths,
                        'user_cost':user_cost
                    }
                )
                print("buy")

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':3,
                    'roll':name,
                    'color':curr_color
                }
            )
            print("roll")
            return

    # Receive message from room group
    async def chat_message(self, event):
        tag = event['tag']
        type = event['type']
        if tag == 0:
            message = event['message']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag':0,
                'message':message,
                'count':count,
            }))
            print("group message")
            return

        if tag == 1:
            name = event['name']
            player = event['player']
            color = event['color']
            amount = event['amount']
            worth = event['worth']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag':tag,
                'count':count,
                'name':name,
                'player':player,
                'color':color,
                'amount':amount,
                'worth':worth
            }))
            print("group add")
            return

        if tag == 2:
            message = event['message']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag':tag,
                'count':count,
                'message':message,
            }))
            print("group remove")
            return

        if tag == 3:
            roll = event['roll']
            color = event['color']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag': tag,
                'count':count,
                'roll':roll,
                'color':color
            }))
            print("group roll")
            return
        if tag == 4:
            roll_value = event['roll_value']
            curr_player = event['curr_player']
            curr_loc = event['curr_loc']
            curr_color = event['curr_color']
            new_loc = event['new_loc']
            colors = event['colors']
            next_color = event['next_color']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag': tag,
                'curr_player':curr_player,
                'curr_loc':curr_loc,
                'curr_color':curr_color,
                'roll_value':roll_value,
                'new_loc':new_loc,
                'next_color':next_color,
                'colors':colors,
                'count':count
            }))
            print("group next_roll")
            return

        if tag == 5:
            names = event['names']
            color = event['color']
            curr_color = event['curr_color']
            user_card = event['user_card']
            amount = event['amount']
            worth = event['worth']
            user_cost = event['user_cost']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag': tag,
                'names': names,
                'color':color,
                'curr_color':curr_color,
                'user_card':user_card,
                'amount':amount,
                'worth':worth,
                'user_cost':user_cost,
                'count':count
            }))
            print("group buy")
            return


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
