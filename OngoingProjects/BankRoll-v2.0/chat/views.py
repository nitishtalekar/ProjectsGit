from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from .forms import *
from .models import *
import random
import math

def index(request):
    # id = [i for i in range(28)]
    # data = ['Start','Peru','Athens','Cab Co.','Rome','Rio','Berlin','Random','Goa','Dubai']
    # data = data + ['Delhi','Railway','Cairo','Mumbai','Jail','Madrid','Sydney','Harbor','Melbourne.','London','Paris']
    # data = data + ['Random','Texas','Los Angles','Tokyo','Singapore','Airport','New York']
    # bgs = ["#FFFFFF","#9abd31","#28bd90","#C2FBFF","#28bd90","#9abd31","#28bd90"]
    # bgs = bgs + ["#FFFFFF","#f57142","#dbb93b","#f57142","#C2FBFF","#dbb93b","#f57142"]
    # bgs = bgs + ["#FFFFFF","#6f3dc2","#2993c4","#C2FBFF","#2993c4","#6f3dc2","#6f3dc2"]
    # bgs = bgs + ["#FFFFFF","#d92e07","#d92e07","#0f40a3","#0f40a3","#C2FBFF","#d92e07"]
    # tags = [2,0,0,1,0,0,0,2,0,0,0,1,0,0,2,0,0,1,0,0,0,2,0,0,0,0,1,0]
    # b = [0,100,100,140,140,180,180,0,200,200,240,240,280,280,0,300,300,340,340,380,380,0,400,400,440,440,480,480,0]
    # Board.objects.all().delete()
    # for i in range(28):
    #     r = b[i]//2
    #     s = math.ceil((int(r)*0.7)/5)*5
    #     b1 = math.ceil((int(b[i])*0.7)/5)*5
    #     b2 = math.ceil((int(b[i])*0.5)/5)*5
    #     b3 = math.ceil((int(b[i])*0.8)/5)*5
    #     Board.objects.create(id=id[i], name=data[i], color=bgs[i], buy=b[i], rent=r, tag=tags[i], sell=s, build1=b1, build2=b2, build3=b3)

    if request.method == "POST":
        lf = LoginForm(request.POST)
        gf = GameForm(request.POST)
        if lf.is_valid():
            uname = lf.cleaned_data["uname"]
            rname = lf.cleaned_data["rname"]
            password = lf.cleaned_data["password"]
            auth = Room.objects.filter(name=rname, password=password)
            if auth.count() == 1:
                user = User.objects.filter(name=uname)
                print(user,"hi", auth[0].game)
                if auth[0].game != "0":
                    game = Game.objects.get(id=auth[0].game)
                    if game.player_count == game.type:
                        error = "Room full Game is started"
                        return render(request, 'chat/index.html', {'error':error})
                if user.count() == 1 and user[0].tag == "-1":
                    request.session['name'] = uname
                    print(auth[0].count)
                    if auth[0].count == "0":
                        return render(request, 'chat/index.html',{"game":1, 'room':rname})

                    player = game.player.split("#")
                    roll = game.roll.split("#")
                    roll.append("0")
                    cost = game.amount.split("#")
                    cost.append(str(int(cost[-1]) + 50))
                    count = int(game.player_count)
                    player.append(str(user[0].id))
                    Game.objects.filter(id=auth[0].game).update(player="#".join(player), player_count=str(count+1), roll="#".join(roll), amount="#".join(cost), worth="#".join(cost))
                    return HttpResponseRedirect('/chat/' + rname + '/')

                # User.objects.create(name=uname, channel_name="", tag="-1")
                request.session['name'] = uname
                print(auth[0].count,"yo")
                if auth[0].count == "0":
                    return render(request, 'chat/index.html',{"game":1, 'room':rname})

                player = game.player.split("#")
                roll = game.roll.split("#")
                roll.append("0")
                cost = game.amount.split("#")
                cost.append(str(int(cost[-1]) + 50))
                count = int(game.player_count)
                player.append(str(user[0].id))
                Game.objects.filter(id=auth[0].game).update(player="#".join(player), player_count=str(count+1), roll="#".join(roll), amount="#".join(cost), worth="#".join(cost))
                return HttpResponseRedirect('/chat/' + rname + '/')
            error = "Invalid Room Name or password"
            return render(request, 'chat/index.html', {'error':error})
        if gf.is_valid():
            type = gf.cleaned_data["type"]
            room = gf.cleaned_data["room"]
            player = User.objects.filter(name=request.session['name'])[0].id
            c = random.sample(color, int(type))
            game = Game.objects.create(player=player, player_count="1", turn="0", type=type, color="#".join(c), roll="0")
            Room.objects.filter(name=room).update(game=game.id, tag="1")
            User.objects.filter(name=request.session['name']).update(tag="1")

            return HttpResponseRedirect('/chat/' + room + '/')

    lf = LoginForm()
    gf = GameForm()
    return render(request, 'chat/index.html')

def room(request, room_name):
    if 'name' in request.session:

        Game.objects.filter(id=1).update(roll="0#0", amount="10000#10500", worth="10000#10500", card="-1#-1", cost="-1#-1", build="-1#-1")
        id = [[7,8,9,10],[11,12,13,14],[6,15],[5,16],[4,17],[3,18],[2,19],[1,20],[0,27,26,25],[24,23,22,21]]


        board = Board.objects.all()

        places = list(Board.objects.values_list('name', flat=True))
        bgs = list(Board.objects.values_list('color', flat=True))
        tags = [int(i) for i in list(Board.objects.values_list('tag', flat=True))]
        prices = list(Board.objects.values_list('buy', flat=True))
        rents = list(Board.objects.values_list('rent', flat=True))
        sells = list(Board.objects.values_list('sell', flat=True))
        build1s = list(Board.objects.values_list('build1', flat=True))
        build2s = list(Board.objects.values_list('build2', flat=True))
        build3s = list(Board.objects.values_list('build3', flat=True))

        place = {}
        bg = {}
        tag = {}
        price = {}
        rent = {}
        sell = {}
        build1 = {}
        build2 = {}
        build3 = {}
        for i in range(28):
            place[i] = places[i]
            bg[i] = bgs[i]
            tag[i] = tags[i]
            price[i] = prices[i]
            rent[i] = rents[i]
            sell[i] = sells[i]
            build1[i] = build1s[i]
            build2[i] = build2s[i]
            build3[i] = build3s[i]

        # FORM DATA

        info = []
        dummy = {"num":-1}
        for i in id:
            if len(i) == 2:
                one = {"num":i[0],'place':place[i[0]],'bgcolor':bg[i[0]],'tag':tag[i[0]], 'price':price[i[0]],'rent':rent[i[0]],'sell':sell[i[0]], 'build1':build1[i[0]], 'build2':build2[i[0]], 'build3':build3[i[0]]}
                two = {"num":i[1],'place':place[i[1]],'bgcolor':bg[i[1]],'tag':tag[i[1]], 'price':price[i[1]],'rent':rent[i[1]],'sell':sell[i[1]], 'build1':build1[i[1]], 'build2':build2[i[0]], 'build3':build3[i[0]]}
                info.append([one,dummy,dummy,dummy])
                info.append([dummy,dummy,dummy,two])
            else:
                temp = []
                for x in i:
                    temp.append({"num":x,'place':place[x],'bgcolor':bg[x],'tag':tag[x], 'price':price[x],'rent':rent[x],'sell':sell[x],'build1':build1[x], 'build2':build2[x], 'build3':build3[x]})
                info.append(temp)
    return render(request, 'chat/room.html', {'room_name': room_name,'info':info, 'name':request.session['name']})
# Create your views here.
