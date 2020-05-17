from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
from DHOPD.forms import *
from .models import *
import re
from datetime import datetime



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
            log = Users.objects.get(user_id = request.session['log'])
            d = {'form':form,'log':log}
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
            log = Users.objects.get(user_id = request.session['log'])
            d = {'form':form,'log':log}
            return render(request, 'DHOPDW/add_user.html', d)

    return render(request, 'DHOPDW/index.html')



def test(request):
    username = "not logged in"
    print("\nyoyoyoyoyoy\n")
    tag = request.GET['auth']
    l=[['0','1','3'],['!','@','3'],[['0','1','i','ji'],'$','*']]
    if request.method == "POST":
      #Get the posted form
      MyLoginForm = TestForm(request.POST)
      if MyLoginForm.is_valid():
          username = MyLoginForm.cleaned_data['username']
          print(MyLoginForm.cleaned_data['password'])
    else:
        MyLoginForm = TestForm()
    return render(request, 'DHOPDW/test.html', {"username" : username, 'l':l, 'log':Users.objects.get(user_id = request.session['log'])})

def padd(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        service = Service.objects.all()
        d_dash = {'log':log,'service':service,'sl':service.count(),'tag':request.GET['auth']}
        tag = request.GET['auth']
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
                c = AddPatient.cleaned_data['cost'].split(',')
                vacc = AddPatient.cleaned_data['vacc'].split(',')
                town = AddPatient.cleaned_data['town']
                service = re.findall(r"\'(.+?)\'", service)
                cost = [Service.objects.get(service_id = i).service_cost for i in service]
                s = []
                if '8' in service:
                    for i in vacc:
                        if Vaccine.objects.filter(vaccine_name = i).count() == 0:
                            Vaccine.objects.create(vaccine_name=i)
                        v = "8." + str(Vaccine.objects.get(vaccine_name = i).vaccine_id)
                        s.append(v)
                    cost = cost + c

                tcost = sum(list(map(float, cost)))
                # print(tcost)
                cost = ";".join(cost)
                # print(cost)
                service = service + s
                service = ";".join(service)
                # print(service)
                if tag == 'Doctor':
                    Patient.objects.create(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    print(obj.patient_id)
                    Receipt.objects.create(receipt_patient=obj.patient_id, receipt_cost=tcost)
                # print(service,cost,vacc)
                d = {'title':title, 'f_name':f_name,'m_name':m_name,'l_name':l_name,'addr':addr,'number':number,'service':service,'tcost':tcost,'vacc':vacc,"town":town,'tag':tag,'ser':service.split(';')}
                return render(request, 'DHOPDW/test.html', d)
        else:
            AddPatient = AddPatientForm()
        return render(request, 'DHOPDW/patient_add.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def pbill(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        d_dash = {'log':log,'tag':request.GET['auth']}
        return render(request, 'DHOPDW/patient_bill.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def pwaitlist(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        tag = request.GET['auth']
        if request.method == "POST":
            print("\nyoyoyoy\n")
            WV = WVForm(request.POST)
            if WV.is_valid():
                status = WV.cleaned_data['status'].split('.')
                Patient.objects.filter(patient_id=status[1]).update(patient_status=status[0])
            AddPatient = AddPatientForm(request.POST)
            if AddPatient.is_valid():
                title = AddPatient.cleaned_data['title']
                f_name = AddPatient.cleaned_data['f_name']
                m_name = AddPatient.cleaned_data['m_name']
                l_name = AddPatient.cleaned_data['l_name']
                addr = AddPatient.cleaned_data['addr']
                number = AddPatient.cleaned_data['number']
                service = AddPatient.cleaned_data['service']
                c = AddPatient.cleaned_data['cost'].split(',')
                vacc = AddPatient.cleaned_data['vacc'].split(',')
                town = AddPatient.cleaned_data['town']
                pid = AddPatient.cleaned_data['pid']
                service = re.findall(r"\'(.+?)\'", service)
                cost = [Service.objects.get(service_id = i).service_cost for i in service]
                s = []
                if '8' in service:
                    for i in vacc:
                        if Vaccine.objects.filter(vaccine_name = i).count() == 0:
                            Vaccine.objects.create(vaccine_name=i)
                        v = "8." + str(Vaccine.objects.get(vaccine_name = i).vaccine_id)
                        s.append(v)
                    cost = cost + c

                tcost = sum(list(map(float, cost)))
                # print(tcost)
                cost = ";".join(cost)
                # print(cost)
                service = service + s
                service = ";".join(service)
                # print(title,f_name,m_name,l_name,addr,number,service,cost,town,pid)
                if tag == 'Doctor':
                    Patient.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt.objects.filter(receipt_patient=obj.patient_id).update(receipt_cost=tcost)
        else:
            WV = WVForm()
            AddPatient = AddPatientForm()
        service = Service.objects.all()
        patient = Patient.objects.filter(patient_date=datetime.today().strftime('%Y-%m-%d'))
        patient_c = []
        patient_w = []
        titles = ['Mr.', 'Ms.', 'Mrs.', 'Baby Girl', 'Baby Boy']
        c = 1
        w = 1
        for i in patient:
            temp = []
            temp.append(i.patient_id)                                                           #0
            if i.patient_status == '0':
                temp.append(c)
                c+=1                                                                            #1
            elif i.patient_status == '1':
                temp.append(w)                                                                  #1
                w+=1
            temp.append(i.patient_fname)                                                        #2
            temp.append(i.patient_mname)                                                        #3
            temp.append(i.patient_lname)                                                        #4
            title = [0]*5
            title[titles.index(i.patient_title)] = 1
            temp.append(i.patient_title)                                                        #5
            temp.append(i.patient_address)                                                      #6
            temp.append(i.patient_town)                                                         #7
            temp.append(i.patient_phone)                                                        #8
            s = []
            allsid =[]
            cost = []
            vacc = []
            for j,k in zip(i.patient_services.split(';'), i.patient_cost.split(';')):
                if float(j) > 8:
                    s.append(Vaccine.objects.get(vaccine_id = j.split('.')[1]).vaccine_name)
                    vacc.append(Vaccine.objects.get(vaccine_id = j.split('.')[1]).vaccine_name)
                    cost.append(k)
                    # print(j,k)
                else:
                    allsid.append(Service.objects.get(service_id = j).service_id)
                    s.append(Service.objects.get(service_id = j).service_name)
            temp.append(", ".join(s))                                                           #9
            temp.append(Receipt.objects.get(receipt_patient=i.patient_id).receipt_cost)         #10
            temp.append(title)                                                                  #11
            temp.append(allsid)                                                                 #12
            temp.append(", ".join(vacc))                                                        #13
            temp.append(", ".join(cost))                                                        #14
            if i.patient_status == '0':
                patient_c.append(temp)
            elif i.patient_status == '1':
                patient_w.append(temp)

        d_dash = {'log':log, 'tag':tag, 'service':service, 'patient_c':patient_c, 'patient_w':patient_w}
        return render(request, 'DHOPDW/patient_waitlist.html',d_dash)
    return render(request, 'DHOPDW/index.html')
# Create your views here.
