import json
from channels.generic.websocket import AsyncWebsocketConsumer
from channels.db import database_sync_to_async
from .models import *
import random
import math



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
    def get_id(self, name):
        user = User.objects.filter(name=name)
        return user[0].id

    @database_sync_to_async
    def change_turn(self, id):
        game = Game.objects.get(id=id)
        turn = (int(game.turn) + 1) % int(game.type)
        Game.objects.filter(id=id).update(turn=str(turn))
        return 1

    @database_sync_to_async
    def change_roll(self, id, roll, turn):
        game = Game.objects.get(id=id)
        if turn == "":
            turn = int(game.turn)
        curr_loc_all = game.roll.split("#")
        curr_loc = curr_loc_all[turn]
        curr_color_all = game.color.split("#")
        curr_color = curr_color_all[turn]
        new_loc = (int(curr_loc) + roll) % 28
        curr_loc_all[turn] = str(new_loc)
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
    def get_board(self):
        board = [i.id for i in Board.objects.all()]
        return board

    @database_sync_to_async
    def get_build_card(self, color):
        build = Board.objects.filter(color=color)
        id = []
        for i in build:
            id.append(i.id)
        return id

    @database_sync_to_async
    def get_rent(self, id):
        return Board.objects.get(id=id).rent

    @database_sync_to_async
    def game_update(self, id, card, amount, worth, cost, build, start):
        Game.objects.filter(id=id).update(card=card, amount=amount, worth=worth, cost=cost, build=build, start=start)
        return 1

    @database_sync_to_async
    def game_jail(self, id, jail):
        Game.objects.filter(id=id).update(jail=jail)
        return 1

    @database_sync_to_async
    def get_random(self, id):
        r = Random.objects.get(id=int(id))
        return r

    @database_sync_to_async
    def relode_random(self, id):
        random = Random.objects.all()
        game_random = [i.id for i in random]
        print(game_random, id)
        Game.objects.filter(id=id).update(random="#".join(game_random))
        return 1

    @database_sync_to_async
    def update_random(self, id, random):
        Game.objects.filter(id=id).update(random="#".join(random))
        return 1

    @database_sync_to_async
    def get_build_amount(self, id, tag):
        if tag == "1":
            return int(Board.objects.get(id=id).build1)
        if tag == "2":
            return int(Board.objects.get(id=id).build2)
        if tag == "3":
            return int(Board.objects.get(id=id).build3)
        return 0

    @database_sync_to_async
    def get_player_details(self, turn, id):
        players = Game.objects.get(id=id).player
        this_player = players.split('#')[turn]
        colors = Game.objects.get(id=id).color
        this_color = colors.split('#')[turn]
        username = User.objects.filter(id=this_player)[0].name
        return [username , this_color]

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
                    'color':color,
                    'jail':[],
                    'jail_count':[]
                }
            )

            names = [await self.get_name(i) for i in player]
            await self.relode_random(game.id)

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':5,
                    'names': names,
                    'color':colors,
                    'curr_color':colors[int(game.turn)],
                    'user_card':game.card.split("#"),
                    'amount':game.amount.split("#"),
                    'worth':game.worth.split("#"),
                    'user_cost':game.cost.split("#"),
                    'display':"",
                    'build':game.build.split("#")
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
                'tag':2,
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
        tag = text_data_json['tag']
        if tag == 3:
            curr_player = text_data_json['name']
            roll = text_data_json['roll']
            value = text_data_json['value']
            # print("value",value)

            game = await self.roll(self.room_name)
            players = game.player.split("#")

            names = [await self.get_name(i) for i in players]
            turn = names.index(curr_player)

            if value == "":
                roll = random.randint(1,6)
            else:
                roll = int(value)
            # roll = 12
            game = await self.roll(self.room_name)
            curr_loc, curr_color, new_loc, colors = await self.change_roll(game.id, roll, "")
            if roll != 6:
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
            return

        if tag == 6:
            name = text_data_json['name']
            roll = int(text_data_json['roll'])
            card_id = text_data_json['card'].split("#")
            # print(card_id)
            game = await self.roll(self.room_name)
            players = game.player.split("#")
            color = game.color.split("#")
            curr_color = color[int(game.turn)]
            name = players[int(game.turn)]
            name = await self.get_name(name)
            turn = (int(game.turn) - 1) % int(game.type)
            if roll == 6:
                turn = int(game.turn)

            amounts = game.amount.split("#")
            amount = int(amounts[turn])
            amount = amount + int(game.start.split("#")[turn])
            amounts[turn] = str(amount)
            # print("amount", "#".join(amounts))

            worths = game.worth.split("#")
            worth = int(worths[turn])
            worth = worth + int(game.start.split("#")[turn])
            worths[turn] = str(int(worth))

            await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)
            startmoney = int(game.start.split("#")[turn])
            details = await self.get_player_details(turn,game.id)
            disp_msg = details[0]+"##"+details[1]+"**got ₹"+str(startmoney)+" Salary**"

            names = []
            for i in players:
                names.append(await self.get_name(i))

            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':6,
                    'names': names,
                    'color':color,
                    'amount':amounts,
                    'worth':worths,
                    'display':disp_msg,
                }
            )
            return



        if tag == 5:
            name = text_data_json['name']
            name1 = name
            roll = int(text_data_json['roll'])
            card_id = text_data_json['card'].split("#")
            print(card_id)
            game = await self.roll(self.room_name)
            players = game.player.split("#")
            color = game.color.split("#")
            curr_color = color[int(game.turn)]
            name = players[int(game.turn)]
            name = await self.get_name(name)
            jail = []
            jail_count = []
            for i in range(len(game.jail.split("#"))):
                if game.jail.split("#")[i] != "0":
                    jail.append(await self.get_name(players[i]))
                    jail_count.append(game.jail.split("#")[i])

            if card_id[0] == "buy":
                turn = (int(game.turn) - 1) % int(game.type)
                if roll == 6:
                    turn = int(game.turn)
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
                worth = worth + (int(cards.buy) * 0.7)
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                check = [i for i in build_cards if str(i) in user_card[turn]]
                if build[0] == "-1":
                    build[0] = "0"
                else:
                    build.append("0")
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))


                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                if cost[0] == "-1":
                    cost[0] = str(cards.rent)
                else:
                    cost.append(str(cards.rent))
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                if len(check) > 1:
                    for i in range(len(card)):
                        if str(card[i]) in build_cards:
                            rent = await self.get_rent(card[i])
                            # cost[i] = str(len(check) * (int(cost[i]) // (len(check) - 1)))
                            cost[i] = str(len(check) * int(rent))
                            if len(check) == len(build_cards):
                                build[i] = "X-Y-Z"
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                await self.game_update(game.id, "#".join(user_card), "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), game.start)
                names = []
                for i in players:
                    names.append(await self.get_name(i))

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**bought**"+cards.name+"##"+cards.color

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "tbuy":
                turn = (int(game.turn) - 1) % int(game.type)
                if roll == 6:
                    turn = int(game.turn)
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
                worth = worth + (int(cards.buy) * 0.7)
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                check = [i for i in build_cards if str(i) in user_card[turn]]
                if build[0] == "-1":
                    build[0] = "0"
                else:
                    build.append("0")
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))


                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                if cost[0] == "-1":
                    cost[0] = str(cards.rent)
                else:
                    cost.append(str(cards.rent))
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                if len(check) > 1:
                    for i in range(len(card)):
                        if str(card[i]) in build_cards:
                            rent = await self.get_rent(card[i])
                            # cost[i] = str(len(check) * (int(cost[i]) // (len(check) - 1)))
                            cost[i] = str(len(check) * int(rent))
                            if len(check) == 2:
                                build[i] = "X>A"
                            else:
                                build[i] = "X-Y"
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                await self.game_update(game.id, "#".join(user_card), "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), game.start)
                names = []
                for i in players:
                    names.append(await self.get_name(i))

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**bought**"+cards.name+"##"+"#407B87"

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "rent":
                turn = (int(game.turn) - 1) % int(game.type)
                if roll == 6:
                    turn = int(game.turn)

                from_name = card_id[-1].split(">")[0]
                from_id = await self.get_id(from_name)
                from_index = players.index(str(from_id))
                to_name = card_id[-1].split(">")[1]
                to_id = await self.get_id(to_name)
                to_index = players.index(str(to_id))

                if game.jail.split("#")[to_index] == "0":
                    card_rent = card_id[1]
                    user_rent = game.cost.split("#")
                    user_card = game.card.split("#")

                    card_index = user_card[to_index].split(";").index(card_rent)
                    rent = user_rent[to_index].split(";")[card_index]

                    amounts = game.amount.split("#")
                    # print("old", amounts)
                    from_amount = int(amounts[from_index])
                    from_amount = from_amount - int(rent)
                    amounts[from_index] = str(from_amount)
                    to_amount = int(amounts[to_index])
                    to_amount = to_amount + int(rent)
                    amounts[to_index] = str(to_amount)
                    # print("amount", "#".join(amounts))

                    worths = game.worth.split("#")
                    # print("old", worths)
                    from_worth = int(worths[from_index])
                    from_worth = from_worth - int(rent)
                    worths[from_index] = str(from_worth)
                    to_worth = int(worths[to_index])
                    to_worth = to_worth + int(rent)
                    worths[to_index] = str(to_worth)
                    # print("worth", "#".join(worths))

                    await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)

                    # print(card_index, rent)
                    # print(card_rent)
                    # print(from_name, from_id, from_index)
                    # print(to_name, to_id, to_index)

                    names = []
                    for i in players:
                        names.append(await self.get_name(i))

                    details = await self.get_player_details(turn,game.id)
                    details_pay = await self.get_player_details(to_index,game.id)
                    disp_msg = details[0]+"##"+details[1]+"**paid ₹"+rent+" to**"+details_pay[0]+"##"+details_pay[1]

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
                            'user_cost':user_rent,
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                else:
                    details = await self.get_player_details(turn,game.id)
                    # details_pay = await self.get_player_details(to_index,game.id)
                    disp_msg = ""

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
                            'user_card':game.card.split("#"),
                            'amount':game.amount.split("#"),
                            'worth':game.worth.split("#"),
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

            if card_id[0] == "sell":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                card_rent = card_id[1]
                cards = await self.get_card(card_id[1])
                user_rent = game.cost.split("#")
                user_card = game.card.split("#")
                sell = user_rent[turn].split(";")[user_card[turn].split(";").index(card_id[1])]
                sell_val = math.ceil((int(sell)*0.7)/5)*5
                # print(sell_val)
                # print("index", user_card[turn].split(";").index(card_id[1]))

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount + sell_val
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth + 0
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                check = [i for i in build_cards if str(i) in user_card[turn]]
                if len(build) == 1:
                    build[0] = "-1"
                else:
                    build.pop(user_card[turn].split(";").index(card_id[1]))
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                if len(cost) == 1:
                    cost[0] = "-1"
                else:
                    rent = cost.pop(user_card[turn].split(";").index(card_id[1]))
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                cards = await self.get_card(card_id[1])
                user_card = game.card.split("#")
                card = user_card[turn].split(";")
                if len(card) == 1:
                    card[0] = "-1"
                else:
                    card.remove(card_id[1])
                user_card[turn] = ";".join(card)
                # print("card", "#".join(user_card))

                if len(check) > 1:
                    for i in range(len(card)):
                        if str(card[i]) in build_cards:
                            # cost[i] = str(len(check) * (int(cost[i]) // (len(check) - 1)))
                            c = (len(check) - 1) * int(cost[i]) / len(build_cards)
                            cost[i] = str(math.ceil(c / 5) * 5)
                            if len(check) == len(build_cards):
                                build[i] = "0"
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))



                await self.game_update(game.id, "#".join(user_card), "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), game.start)
                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**Sold**"+cards.name+"##"+cards.color

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "tsell":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                card_rent = card_id[1]
                cards = await self.get_card(card_id[1])
                user_rent = game.cost.split("#")
                user_card = game.card.split("#")
                sell = user_rent[turn].split(";")[user_card[turn].split(";").index(card_id[1])]
                sell_val = math.ceil((int(sell)*0.7)/5)*5
                # print(sell_val)
                # print("index", user_card[turn].split(";").index(card_id[1]))

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount + sell_val
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth + 0
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                check = [i for i in build_cards if str(i) in user_card[turn]]
                if len(build) == 1:
                    build[0] = "-1"
                else:
                    build.pop(user_card[turn].split(";").index(card_id[1]))
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                if len(cost) == 1:
                    cost[0] = "-1"
                else:
                    rent = cost.pop(user_card[turn].split(";").index(card_id[1]))
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                cards = await self.get_card(card_id[1])
                user_card = game.card.split("#")
                card = user_card[turn].split(";")
                if len(card) == 1:
                    card[0] = "-1"
                else:
                    card.remove(card_id[1])
                user_card[turn] = ";".join(card)
                # print("card", "#".join(user_card))

                if len(check) > 1:
                    for i in range(len(card)):
                        if str(card[i]) in build_cards:
                            # cost[i] = str(len(check) * (int(cost[i]) // (len(check) - 1)))
                            c = (len(check) - 1) * int(cost[i]) / len(build_cards)
                            cost[i] = str(math.ceil(c / 5) * 5)
                            if len(check) == 3:
                                build[i] = "X>A"
                            elif len(check) < 3:
                                build[i] = "0"
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))



                await self.game_update(game.id, "#".join(user_card), "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), game.start)
                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**Sold "+" on**"+cards.name+"##"+"#407B87"

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "build":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                cards = await self.get_card(card_id[2])
                user_rent = game.cost.split("#")
                user_card = game.card.split("#")
                rent = user_rent[turn].split(";")[user_card[turn].split(";").index(card_id[2])]
                if card_id[1] == "X":
                    build_amount = await self.get_build_amount(card_id[2],"1")
                    building = "Lodge"
                    rent_value = math.ceil((int(rent) * 1.80)/5)*5
                elif card_id[1] == "Y":
                    build_amount = await self.get_build_amount(card_id[2],"2")
                    building = "Hotel"
                    rent_value = math.ceil((int(rent) * 1.90)/5)*5
                elif card_id[1] == "Z":
                    build_amount = await self.get_build_amount(card_id[2],"3")
                    building = "Resort"
                    rent_value = math.ceil((int(rent) * 2)/5)*5

                # print(rent_value)

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount - build_amount
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth + math.ceil((rent_value * 0.7)/5)*5
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                xyz = build[user_card[turn].split(";").index(card_id[2])].split("-")
                xyz.remove(card_id[1])
                if len(xyz) == 0:
                    xyz.append("1")
                build[user_card[turn].split(";").index(card_id[2])] = "-".join(xyz)
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                cost[user_card[turn].split(";").index(card_id[2])]
                cost[user_card[turn].split(";").index(card_id[2])] = str(rent_value)
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), game.start)

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**built "+building+" on**"+cards.name+"##"+cards.color

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "build_sell":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                cards = await self.get_card(card_id[2])
                user_rent = game.cost.split("#")
                user_card = game.card.split("#")
                rent = user_rent[turn].split(";")[user_card[turn].split(";").index(card_id[2])]
                if card_id[1] == "X":
                    build_amount = math.ceil(int(rent) * 0.10 / 5) * 5
                    building = "Lodge"
                    rent_value = math.ceil((int(rent) * 0.60)/5)*5
                elif card_id[1] == "Y":
                    build_amount = math.ceil(int(rent) * 0.15 / 5) * 5
                    building = "Hotel"
                    rent_value = math.ceil((int(rent) * 0.55)/5)*5
                elif card_id[1] == "Z":
                    build_amount = math.ceil(int(rent) * 0.20 / 5) * 5
                    building = "Resort"
                    rent_value = math.ceil((int(rent) * 0.50)/5)*5

                # print(rent_value)

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount + build_amount
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth + 0
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                xyz = build[user_card[turn].split(";").index(card_id[2])].split("-")
                if xyz[0] == "1":
                    xyz[0] = card_id[1]
                else:
                    xyz.append(card_id[1])
                build[user_card[turn].split(";").index(card_id[2])] = "-".join(xyz)
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                cost[user_card[turn].split(";").index(card_id[2])]
                cost[user_card[turn].split(";").index(card_id[2])] = str(rent_value)
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), game.start)

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**sold "+building+" on**"+cards.name+"##"+cards.color

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "transport_sell":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                cards = await self.get_card(card_id[2])
                user_rent = game.cost.split("#")
                user_card = game.card.split("#")
                rent = user_rent[turn].split(";")[user_card[turn].split(";").index(card_id[2])]
                if card_id[1] == "X":
                    build_amount = math.ceil(int(rent) * 0.10 / 5) * 5
                    building = "Lodge"
                    rent_value = math.ceil((int(rent) * 0.60)/5)*5
                elif card_id[1] == "Y":
                    build_amount = math.ceil(int(rent) * 0.15 / 5) * 5
                    building = "Hotel"
                    rent_value = math.ceil((int(rent) * 0.55)/5)*5
                elif card_id[1] == "Z":
                    build_amount = math.ceil(int(rent) * 0.20 / 5) * 5
                    building = "Resort"
                    rent_value = math.ceil((int(rent) * 0.50)/5)*5

                # print(rent_value)

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount + build_amount
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth + 0
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                xyz = build[user_card[turn].split(";").index(card_id[2])].split("-")
                if xyz[0] == "1":
                    xyz[0] = card_id[1]
                else:
                    xyz.append(card_id[1])
                build[user_card[turn].split(";").index(card_id[2])] = "-".join(xyz)
                builds[turn] = ";".join(build)
                # print("build", "#".join(builds))

                user_cost = game.cost.split("#")
                cost = user_cost[turn].split(";")
                cost[user_card[turn].split(";").index(card_id[2])]
                cost[user_card[turn].split(";").index(card_id[2])] = str(rent_value)
                user_cost[turn] = ";".join(cost)
                # print("cost", "#".join(user_cost))

                starts = game.start.split("#")
                start = int(starts[turn])
                start = start - rent_value
                starts[turn] = str(start)

                await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), "#".join(user_cost), "#".join(builds), "#".join(starts))

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**stopped "+building+" on**"+cards.name+"##"+"#407B87"

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
                        'user_cost':user_cost,
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "transport":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                cards = await self.get_card(card_id[2])
                user_rent = game.cost.split("#")
                user_card = game.card.split("#")
                rent = user_rent[turn].split(";")[user_card[turn].split(";").index(card_id[2])]
                if card_id[1] == "X":
                    build_amount = await self.get_build_amount(card_id[2],"1")
                    building = "Cargo"
                    rent_value = math.ceil((int(rent) * 0.40)/5)*5
                elif card_id[1] == "Y":
                    build_amount = await self.get_build_amount(card_id[2],"2")
                    building = "Tour"
                    rent_value = math.ceil((int(rent) * 0.50)/5)*5

                amounts = game.amount.split("#")
                amount = int(amounts[turn])
                amount = amount - build_amount
                amounts[turn] = str(amount)
                # print("amount", "#".join(amounts))

                worths = game.worth.split("#")
                worth = int(worths[turn])
                worth = worth + 0
                worths[turn] = str(int(worth))
                # print("worth", "#".join(worths))

                builds = game.build.split("#")
                build = builds[turn].split(";")
                build_cards = await self.get_build_card(cards.color)
                xyz = build[user_card[turn].split(";").index(card_id[2])].split("-")
                xyz.remove(card_id[1])
                build[user_card[turn].split(";").index(card_id[2])] = "-".join(xyz)
                builds[turn] = ";".join(build)
                print("build", "#".join(builds))

                starts = game.start.split("#")
                start = int(starts[turn])
                start = start + rent_value
                starts[turn] = str(start)
                # print("start", "#".join(starts))


                await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, "#".join(builds), "#".join(starts))

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**started "+building+" on**"+cards.name+"##"+"#407B87"

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
                        'user_cost':game.cost.split("#"),
                        'display':disp_msg,
                        'build':builds
                    }
                )

            if card_id[0] == "jail":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                # print(name)
                if card_id[1] == "bail":

                    amounts = game.amount.split("#")
                    amount = int(amounts[turn])
                    amount = amount - int(card_id[2])
                    amounts[turn] = str(amount)
                    # print("amount", "#".join(amounts))

                    worths = game.worth.split("#")
                    worth = int(worths[turn])
                    worth = worth - int(card_id[2])
                    worths[turn] = str(int(worth))

                    await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"**bailed out by paying ₹"+card_id[2]+"**"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':amounts,
                            'worth':worths,
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                elif card_id[1] == "miss":

                    jail.append(name1)
                    jail_count.append(card_id[2])

                    jails = game.jail.split("#")
                    jails[turn] = card_id[2]

                    amounts = game.amount.split("#")
                    worths = game.worth.split("#")

                    await self.game_jail(game.id,"#".join(jails))

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"**is in Jail for "+card_id[2]+" chances**"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':amounts,
                            'worth':worths,
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                    if roll == 6:
                        await self.change_turn(game.id)
                        game = await self.roll(self.room_name)
                        # print(turn)
                        name = names[int(game.turn)]
                        # print(name)
                        curr_color = color[int(game.turn)]
                        # print(curr_color)


                        await self.channel_layer.group_send(
                            self.room_group_name,
                            {
                                'type': 'chat_message',
                                'tag':3,
                                'roll':name,
                                'color':curr_color,
                                'jail':jail,
                                'jail_count':jail_count
                            }
                        )
                        return

            if card_id[0] == "jail_pass":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)


                jails = game.jail.split("#")
                jails[turn] = str(int(jails[turn]) - 1)

                jail_count[jail.index(name1)] = int(jails[turn]) - 1


                await self.game_jail(game.id, "#".join(jails))

                if jails[turn] == "0":
                    jail_count.pop(jail.index(name1))
                    jail.pop(jail.index(name1))

                details = await self.get_player_details(turn,game.id)
                disp_msg = details[0]+"##"+details[1]+"**is in jail for "+jails[turn]+" chances**"

                await self.channel_layer.group_send(
                    self.room_group_name,
                    {
                        'type': 'chat_message',
                        'tag':5,
                        'names': names,
                        'color':color,
                        'curr_color':color[turn],
                        'user_card':game.card.split("#"),
                        'amount':game.amount.split("#"),
                        'worth':game.worth.split("#"),
                        'user_cost':game.cost.split("#"),
                        'display':disp_msg,
                        'build':game.build.split("#")
                    }
                )
                if jails[turn] != "0":
                    await self.change_turn(game.id)

                    game = await self.roll(self.room_name)
                    # print(turn)
                    name = names[int(game.turn)]
                    # print(name)
                    curr_color = color[int(game.turn)]
                    # print(curr_color)


                await self.channel_layer.group_send(
                    self.room_group_name,
                    {
                        'type': 'chat_message',
                        'tag':3,
                        'roll':name,
                        'color':curr_color,
                        'jail':jail,
                        'jail_count':jail_count
                    }
                )
                return

            if card_id[0] == "random":
                names = [await self.get_name(i) for i in players]
                turn = names.index(name1)
                game_random = game.random.split("#")
                random_id = random.choice(game_random)
                random_card = await self.get_random(random_id)
                flag = 0
                # random_card = await self.get_random(random_id)

                if random_card.tag == "1":

                    print("1")

                    amounts = game.amount.split("#")
                    amount = int(amounts[turn])
                    amount = amount - int(random_card.quants)
                    amounts[turn] = str(amount)
                    # print("amount", "#".join(amounts))

                    worths = game.worth.split("#")
                    worth = int(worths[turn])
                    worth = worth - int(random_card.quants)
                    worths[turn] = str(int(worth))
                    # print("worth", "#".join(worths))

                    await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"** **"+random_card.reason+random_card.quants +"##"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':amounts,
                            'worth':worths,
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                if random_card.tag == "2":

                    print("2")

                    amounts = game.amount.split("#")
                    amount = int(amounts[turn])
                    amount = amount + int(random_card.quants)
                    amounts[turn] = str(amount)
                    # print("amount", "#".join(amounts))

                    worths = game.worth.split("#")
                    worth = int(worths[turn])
                    worth = worth + int(random_card.quants)
                    worths[turn] = str(int(worth))
                    # print("worth", "#".join(worths))

                    await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"** **"+random_card.reason+random_card.quants +"##"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':amounts,
                            'worth':worths,
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                if random_card.tag == "3":
                    players = [i for i in names if i != name1]
                    print(players)

                    amounts = game.amount.split("#")
                    amount = int(amounts[turn])
                    amount = amount - (len(players) * int(random_card.quants))
                    amounts[turn] = str(amount)
                    # print("amount", "#".join(amounts))

                    worths = game.worth.split("#")
                    worth = int(worths[turn])
                    worth = worth -(len(players) * int(random_card.quants))
                    worths[turn] = str(int(worth))

                    for i in names:
                        if i in players:

                            index = names.index(i)

                            amount = int(amounts[index])
                            amount = amount +  int(random_card.quants)
                            amounts[index] = str(amount)
                            # print("amount", "#".join(amounts))

                            worth = int(worths[index])
                            worth = worth + int(random_card.quants)
                            worths[index] = str(int(worth))

                    await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"** **"+random_card.reason+random_card.quants +"##"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':amounts,
                            'worth':worths,
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                if random_card.tag == "4":
                    players = [i for i in names if i != name1]
                    print(players)

                    amounts = game.amount.split("#")
                    amount = int(amounts[turn])
                    amount = amount + (len(players) * int(random_card.quants))
                    amounts[turn] = str(amount)
                    # print("amount", "#".join(amounts))

                    worths = game.worth.split("#")
                    worth = int(worths[turn])
                    worth = worth + (len(players) * int(random_card.quants))
                    worths[turn] = str(int(worth))

                    for i in names:
                        if i in players:
                            index = names.index(i)
                            amount = int(amounts[index])
                            amount = amount -  int(random_card.quants)
                            amounts[index] = str(amount)
                            # print("amount", "#".join(amounts))

                            worth = int(worths[index])
                            worth = worth - int(random_card.quants)
                            worths[index] = str(int(worth))

                    await self.game_update(game.id, game.card, "#".join(amounts), "#".join(worths), game.cost, game.build, game.start)

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"** **"+random_card.reason+random_card.quants +"##"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':amounts,
                            'worth':worths,
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                if random_card.tag == "5":
                    flag = 1
                    board_id = await self.get_board()
                    card = await self.get_card(random.choice(board_id))
                    print("cardid", card.id)

                    roll_new = (int(card.id) - int(card_id[1])) % 28

                    # roll_new = (1 - int(card_id[1])) % 28
                    print("roll", roll_new)

                    curr_loc, curr_color, new_loc, colors = await self.change_roll(game.id, roll_new, turn)
                    if roll == 6:
                        await self.change_turn(game.id)
                    game = await self.roll(self.room_name)
                    # player = game.player.split("#")
                    # turn = player[int(game.turn)]
                    # name = await self.get_name(turn)
                    # color = game.color.split("#")
                    # next_color = color[int(game.turn)]

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':4,
                            'curr_player':name1,
                            'curr_loc':card_id[1],
                            'curr_color':color[turn],
                            'roll_value':roll_new,
                            'new_loc':new_loc,
                            'next_color':color[int(game.turn)],
                            'colors':colors
                        }
                    )

                    details = await self.get_player_details(turn,game.id)
                    disp_msg = details[0]+"##"+details[1]+"** **"+random_card.reason+card.name +"##"

                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':5,
                            'names': names,
                            'color':color,
                            'curr_color':color[turn],
                            'user_card':game.card.split("#"),
                            'amount':game.amount.split("#"),
                            'worth':game.worth.split("#"),
                            'user_cost':game.cost.split("#"),
                            'display':disp_msg,
                            'build':game.build.split("#")
                        }
                    )

                game_random.remove(str(random_id))
                if len(game_random) == 0:
                    await self.relode_random(game.id)
                else:
                    await self.update_random(game.id, game_random)
                if flag:
                    await self.channel_layer.group_send(
                        self.room_group_name,
                        {
                            'type': 'chat_message',
                            'tag':3,
                            'roll':"",
                            'color':"",
                            'jail':jail,
                            'jail_count':jail_count
                        }
                    )
                    return


            await self.channel_layer.group_send(
                self.room_group_name,
                {
                    'type': 'chat_message',
                    'tag':3,
                    'roll':name,
                    'color':curr_color,
                    'jail':jail,
                    'jail_count':jail_count
                }
            )
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
            return

        if tag == 3:
            roll = event['roll']
            color = event['color']
            jail = event['jail']
            jail_count = event['jail_count']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag': tag,
                'count':count,
                'roll':roll,
                'color':color,
                'jail':jail,
                'jail_count':jail_count
            }))
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
            return

        if tag == 5:
            names = event['names']
            color = event['color']
            curr_color = event['curr_color']
            user_card = event['user_card']
            amount = event['amount']
            worth = event['worth']
            user_cost = event['user_cost']
            display = event['display']
            build = event['build']
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
                'count':count,
                'display':display,
                'build':build
            }))
            return

        if tag == 6:
            names = event['names']
            color = event['color']
            amount = event['amount']
            worth = event['worth']
            display = event['display']
            count = await self.get_count(self.room_name)
            await self.send(text_data=json.dumps({
                'type': type,
                'tag': tag,
                'names': names,
                'color':color,
                'amount':amount,
                'worth':worth,
                'count':count,
                'display':display,
            }))
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
