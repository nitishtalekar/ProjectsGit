from django.shortcuts import render
from .models import *
import random

def index(request):
    id = [i for i in range(28)]
    data = "QWERTYUIOPASDFGHJKLZXCVBNM?@"
    data = ['Start','Delhi','Rio','Bangkok','Harbor','Madrid','Cairo','Random','Jakarta','Berlin']
    data = data + ['Moscow','Railway','Toronto','Seoul','Jail','Zurich','Riyadh','Sydney','Electric Co.','Beijing','Dubai']
    data = data + ['Auction','Paris','Hong Kong','London','Airport','Tokyo','New York']
    bg = ["#CBCBCB","#73CF94","#73CF94","#909090","#547BB3","#547BB3","#547BB3","#CBCBCB","#D12944","#D12944","#C6D949","#909090","#C6D949","#C6D949"]
    bg = bg + ["#CBCBCB","#087E25","#087E25","#935B10","#909090","#935B10","#935B10","#CBCBCB","#52087A","#52087A","#EC4540","#909090","#EC4540","#EC4540"]
    print(data,len(data))

    Board.objects.all().delete()
    for i in range(28):
        Board.objects.create(id=id[i], name=data[i], color=bg[i], buy=random.randint(100,3000), rent=random.randint(100,3000))
    board = Board.objects.all()
    print(board)
    return render(request, 'chat/index.html')

def room(request, room_name):
    id = [[7,8,9,10],[11,12,13,14],[6,15],[5,16],[4,17],[3,18],[2,19],[1,20],[0,27,26,25],[24,23,22,21]]

    board = Board.objects.all()

    # FORM DATA

    places = ['Start','Delhi','Rio','Bangkok','Harbor','Madrid','Cairo','Random','Jakarta','Berlin']
    places = places + ['Moscow','Railway','Toronto','Seoul','Jail','Zurich','Riyadh','Sydney','Electric Co.','Beijing','Dubai']
    places = places + ['Auction','Paris','Hong Kong','London','Airport','Tokyo','New York']
    bgs = ["#FFFFFF","#8ebc42","#8ebc42","#58b4f5","#C2FBFF","#58b4f5","#58b4f5","#FFFFFF","#af3e6a","#af3e6a","#f39704","#C2FBFF","#f39704","#f39704"]
    bgs = bgs + ["#FFFFFF","#1b8f6c","#1b8f6c","#905422","#C2FBFF","#905422","#905422","#FFFFFF","#6f3dc2","#6f3dc2","#f45631","#C2FBFF","#f45631","#f45631"]
    tags = [2,0,0,0,1,0,0,2,0,0,0,1,0,0,2,0,0,0,1,0,0,2,0,0,0,1,0,0]
    place = {}
    bg = {}
    tag = {}
    for i in range(28):
        place[i] = places[i]
        bg[i] = bgs[i]
        tag[i] = tags[i]

    # FORM DATA

    info = []
    dummy = {"num":-1}
    for i in id:
        if len(i) == 2:
            one = {"num":i[0],'place':place[i[0]],'bgcolor':bg[i[0]],'tag':tag[i[0]]}
            two = {"num":i[1],'place':place[i[1]],'bgcolor':bg[i[1]],'tag':tag[i[1]]}
            info.append([one,dummy,dummy,dummy])
            info.append([dummy,dummy,dummy,two])
        else:
            temp = []
            for x in i:
                temp.append({"num":x,'place':place[x],'bgcolor':bg[x],'tag':tag[x]})
            info.append(temp)
    return render(request, 'chat/room.html', {'room_name': room_name,'info':info, 'board':board})
# Create your views here.
