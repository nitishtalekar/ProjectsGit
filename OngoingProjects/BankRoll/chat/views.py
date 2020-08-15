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
        Board.objects.create(id=id[i], name=data[i], color=bg[i], buy=random.randint(100,3000))
    board = Board.objects.all()
    print(board)
    return render(request, 'chat/index.html')

def room(request, room_name):
    id = [[7,8,9,10],[11,12,13,14],[6,15],[5,16],[4,17],[3,18],[2,19],[1,20],[0,27,26,25],[24,23,22,21]]

    board = Board.objects.all()

    # FORM DATA

    data = ['Start','Delhi','Rio','Bangkok','Harbor','Madrid','Cairo','Random','Jakarta','Berlin']
    data = data + ['Moscow','Railway','Toronto','Seoul','Jail','Zurich','Riyadh','Sydney','Electric Co.','Beijing','Dubai']
    data = data + ['Auction','Paris','Hong Kong','London','Airport','Tokyo','New York']
    bg = ["#CBCBCB","#3CD627","#3CD627","#547BB3","#909090","#547BB3","#547BB3","#CBCBCB","#D12944","#D12944","#D3F014","#909090","#D3F014","#D3F014"]
    bg = bg + ["#CBCBCB","#087E25","#087E25","#935B10","#909090","#935B10","#935B10","#CBCBCB","#52087A","#52087A","#EC4540","#909090","#EC4540","#EC4540"]

    info_dict = {}
    col = {}
    for i in range(28):
        info_dict[i] = data[i]
        col[i] = bg[i]

    # FORM DATA

    info = []
    dummy = {"num":-1}
    for i in id:
        if len(i) == 2:
            one = {"num":i[0],'place':info_dict[i[0]],'bgcolor':col[i[0]]}
            two = {"num":i[1],'place':info_dict[i[1]],'bgcolor':col[i[1]]}
            info.append([one,dummy,dummy,dummy])
            info.append([dummy,dummy,dummy,two])
        else:
            temp = []
            for x in i:
                temp.append({"num":x,'place':info_dict[x],'bgcolor':col[x]})
            info.append(temp)
    return render(request, 'chat/room.html', {'room_name': room_name,'info':info, 'board':board})
# Create your views here.
