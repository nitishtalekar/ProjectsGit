from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
from DHOPD.forms import *
from .models import *

def auth_code(a):
    c = -1
    # print(a)
    al = []
    for i in range(len(a)):
        print(a[i],i)
        if a[i] == "'":
            i+=1
            # print(i)
            str = ""
            while a[i] != "'":
                print("while ",a[i],i)
                str = str + a[i]
                i+=1
            al.append(str)

    print(al)

    for i in al:
        print(i)
        if i == 'female':
            c = 1
        if i == 'male':
            if c == -1:
                c = 2
            if c == 1:
                c = 4
        if i == 'room':
            if c == -1:
                c = 3
            if c == 2:
                c = 5
            if c == 1:
                c = 6
            if c == 4:
                c = 0
    return c



def index(request):
    if request.method == "POST":
        form = LoginForm(request.POST)
        if form.is_valid():
            u = form.cleaned_data['user_name']
            pwd = form.cleaned_data['password']
            log = Users.objects.filter(user_name = u, password=pwd)
            if log.count() == 1:
                log = Users.objects.get(user_name = u, password=pwd)
                d = {'form':form,'log':log}
                return render(request, 'DHOPDW/index.html',d)
            else:
                e = "Username or Password Incorrect"
                d = {'form':form,'error':e}
                return render(request, 'DHOPDW/index.html', d)
    else:
        form = LoginForm()
        d = {'form':form}
        return render(request, 'DHOPDW/index.html', d)

def user(request):
    if request.method == "POST":
        form = AddUserForm(request.POST)
        d = {'form':form}
        if form.is_valid():
            u = form.cleaned_data['user_name']
            f = form.cleaned_data['first_name']
            l = form.cleaned_data['last_name']
            p = form.cleaned_data['phon_no']
            a = auth_code(form.cleaned_data['authority'])
            d = {'form':form, 'u':u, 'f':f, 'l':l, 'p':p, 'al':form.cleaned_data['authority'], 'a':a}
            log = Users.objects.filter(user_name = u)
            if log.count() == 1:
                error = 'User name already exists....'
                d = {'form':form,'error':error}
                return render(request, 'DHOPDW/add_user.html', d)
            # else:
            #     user = Users(user_name=u, fname=f, lname=l, password=p, pno=p, priority='U', authority=)


            return render(request, 'DHOPDW/add_user.html', d)
        return render(request, 'DHOPDW/add_user.html', d)
            #     return render(request, 'DHOPDW/index.html',d)
            # else:
            #     e = "Username or Password Incorrect"
            #     d = {'form':form,'error':e}
            #     return render(request, 'DHOPDW/index.html', d)
    else:
        form =AddUserForm()
        d = {'form':form}
        return render(request, 'DHOPDW/add_user.html', d)


def male(request):
    return render(request, 'DHOPDW/male.html')

def female(request):
    return render(request, 'DHOPDW/female.html')

def room(request):
    return render(request, 'DHOPDW/room.html')
# Create your views here.
