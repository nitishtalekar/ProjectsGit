from django.shortcuts import render
import random as r
from .forms import *
from django.http import HttpResponse
from . import views

# Create your views here.
def home(request,k):
    p = request.session['players']
    if request.method == "POST":
        form = Btnform(request.POST)
        form2 = Rollform(request.POST)
        if form.is_valid():
            if 'correct' in request.POST:
                request.session['score'] = request.session['score']+1
                request.session['dice'] = 0
            elif 'wrong' in request.POST:
                request.session['score'] = request.session['score']
                request.session['dice'] = 0
        if form2.is_valid():
            if 'roll' in request.POST:
                request.session['dice'] = r.choice([i for i in range(1,7)])
        dice = request.session['dice']
        score = request.session['score']
    else:
        form = Btnform()
        form2 = Rollform()
        request.session['score'] = 0
        score = request.session['score']
        request.session['dice'] = 0
        dice = request.session['dice']
    return render(request,'pictionary/home.html',{'dice':dice,'score':score,'form':form,'form2':form2,'players':p})
    
def login(request):
    if request.method == "POST":
        login = Loginform(request.POST)
        players = []
        ind = 1
        if login.is_valid():
            if login.cleaned_data['team1']:
                players.append((ind , login.cleaned_data['team1'],login.cleaned_data['color1']))
                ind = ind+1
            if login.cleaned_data['team2']:
                players.append((ind , login.cleaned_data['team2'],login.cleaned_data['color2']))
                ind = ind+1
            if login.cleaned_data['team3']:
                players.append((ind , login.cleaned_data['team3'],login.cleaned_data['color3']))
                ind = ind+1
            if login.cleaned_data['team4']:
                players.append((ind , login.cleaned_data['team4'],login.cleaned_data['color4']))
                ind = ind+1
            request.session['players'] = players
            request.session['score'] = 0
            request.session['dice'] = 0
        return home(request,0)
    else:        
        login = Loginform()
        return render(request,'pictionary/login.html',{'login':login})