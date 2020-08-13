from django.shortcuts import render

def index(request):
    return render(request, 'chat/index.html')

def room(request, room_name):
    id = [[7,8,9,10],[11,12,13,14],[6,15],[5,16],[4,17],[3,18],[2,19],[1,20],[0,27,26,25],[24,23,22,21]]
    data = "QWERTYUIOPASDFGHJKLZXCVBNM?@"  
    sl = list(data)
    info_dict = {}
    for i in range(28):
        info_dict[i] = sl[i]
    print(info_dict)
    info = []
    dummy = {"num":-1,'place':"X"}
    for i in id:
        if len(i) == 2:
            one = {"num":i[0],'place':info_dict[i[0]]}
            two = {"num":i[1],'place':info_dict[i[1]]}
            info.append([one,dummy,dummy,dummy])
            info.append([dummy,dummy,dummy,two])
        else:
            temp = []
            for x in i:
                temp.append({"num":x,'place':info_dict[x]}) 
            info.append(temp)
    return render(request, 'chat/room.html', {'room_name': room_name,'info':info,'info_dict':info_dict})
# Create your views here.
