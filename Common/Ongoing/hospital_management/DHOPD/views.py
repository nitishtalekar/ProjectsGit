from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
from DHOPD.forms import *
from .models import *
import re


def auth_code(a):
    c = -1
    b = re.findall(r"\'(.+?)\'", a)

    for i in b:
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
            log = Users.objects.filter(user_name = u)
            if log.count() == 1:
                log = Users.objects.filter(user_name = u, password = pwd)
                if log.count() == 1:
                    log = Users.objects.get(user_name = u, password=pwd)
                    request.session['log'] = log.user_id
                    return HttpResponseRedirect("dashboard/")
                else:
                    e = "Password Incorrect"
                    d = {'form':form, 'error': e}
                    return render(request, 'DHOPDW/index.html', d)
            else:
                e = "Username Incorrect"
                d = {'form':form,'error':e}
                return render(request, 'DHOPDW/index.html', d)
    else:
        form = LoginForm()
        d = {'form':form}
        return render(request, 'DHOPDW/index.html', d)


def dashboard(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        d_dash = {'log':log}
        return render(request, 'DHOPDW/dashboard.html',d_dash)

    return render(request, 'DHOPDW/index.html')



def user(request):
    if'log' in request.session:
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
                else:
                    add_user = Users.objects.create(user_name=u, fname=f, lname=l, password=p, pno=p, priority='U', auth=a)
                    return HttpResponseRedirect("/DHOPD/dashboard/")


                return render(request, 'DHOPDW/add_user.html', d)
            return render(request, 'DHOPDW/add_user.html', d)
        else:
            form =AddUserForm()
            d = {'form':form}
            return render(request, 'DHOPDW/add_user.html', d)

    return render(request, 'DHOPDW/index.html')



def test(request):
    username = "not logged in"
    print("\nyoyoyoyoyoy\n")
    if request.method == "POST":
      #Get the posted form
      MyLoginForm = TestForm(request.POST)
      if MyLoginForm.is_valid():
          username = MyLoginForm.cleaned_data['username']
          print(MyLoginForm.cleaned_data['password'])
    else:
        MyLoginForm = TestForm()
    return render(request, 'DHOPDW/test.html', {"username" : username})

def padd(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        service = Service.objects.all()
        d_dash = {'log':log,'service':service,'sl':service.count()}
        # tag = request.GET['auth']
        if request.method == "POST":
            print("\nyoyoyoy\n")
            AddPatient = AddPatientForm(request.POST)
            if AddPatient.is_valid():
                title = AddPatient.cleaned_data['title']
                f_name = AddPatient.cleaned_data['f_name']
                m_name = AddPatient.cleaned_data['m_name']
                l_name = AddPatient.cleaned_data['l_name']
                addr = AddPatient.cleaned_data['addr']
                number = AddPatient.cleaned_data['number']
                service = AddPatient.cleaned_data['service']
                cost = AddPatient.cleaned_data['cost']
                vacc = AddPatient.cleaned_data['vacc']
                town = AddPatient.cleaned_data['town']
                service = re.findall(r"\'(.+?)\'", service)
                print(service)
                d = {'title':title, 'f_name':f_name,'m_name':m_name,'l_name':l_name,'addr':addr,'number':number,'service':service,'cost':cost,'vacc':vacc,"town":town}
                return render(request, 'DHOPDW/test.html', d)
        else:
            AddPatient = AddPatientForm()
        return render(request, 'DHOPDW/patient_add.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def pbill(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        d_dash = {'log':log}
        return render(request, 'DHOPDW/patient_bill.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def pwaitlist(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        d_dash = {'log':log}
        tag = request.GET['auth']
        return render(request, 'DHOPDW/patient_waitlist.html',d_dash)

    return render(request, 'DHOPDW/index.html')
# Create your views here.
