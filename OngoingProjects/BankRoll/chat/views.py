from django.shortcuts import render

def index(request):
    return render(request, 'chat/index.html')

def room(request, room_name):
    id = [[7,8,9,10],[11,12,13,14],[6,15],[5,16],[4,17],[3,18],[2,19],[1,20],[0,27,26,25],[24,23,22,21]]
    
    # FORM DATA
    
    data = "QWERTYUIOPASDFGHJKLZXCVBNM?@"
    bg = ["rgb(203, 63, 63)","rgb(90, 218, 207)","rgb(189, 199, 79)"]  
    bg2 = ["white"]+[ x for x in bg for i in range(9)] 
    sl = list(data)
    info_dict = {}
    col = {}
    for i in range(28):
        info_dict[i] = sl[i]
        col[i] = bg2[i]
        
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
    return render(request, 'chat/room.html', {'room_name': room_name,'info':info})
# Create your views here.
