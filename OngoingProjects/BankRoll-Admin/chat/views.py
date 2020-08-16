from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from .forms import *
from .models import *

def index(request):
    if request.method == "POST":
        lf = LoginForm(request.POST)
        # print(lf, lf.is_valid())
        if lf.is_valid():
            uname = lf.cleaned_data["uname"]
            rname = lf.cleaned_data["rname"]
            password = lf.cleaned_data["password"]
            auth = Room.objects.filter(name=rname, password=password)
            if auth.count() == 1:
                user = User.objects.filter(name=uname)
                if user.count() == 1 and user[0].tag == "-1":
                    request.session['name'] = uname
                    return HttpResponseRedirect('/chat/' + rname + '/')
                User.objects.create(name=uname, channel_name="", tag="-1")
                request.session['name'] = uname
                return HttpResponseRedirect('/chat/' + rname + '/')
            error = "Invalid Room Name or password"
            return render(request, 'chat/index.html', {'error':error})

    lf = LoginForm()
    return render(request, 'chat/index.html')

def room(request, room_name):
    if 'name' in request.session:
        return render(request, 'chat/room.html', {
            'room_name': room_name,
            'name':request.session['name']
            })
    return render(request, 'chat/index.html')
# Create your views here.
