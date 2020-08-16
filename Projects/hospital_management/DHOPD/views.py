from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
from DHOPD.forms import *
from .models import *
import re
from datetime import datetime, date
from num2words import num2words
from django.db.models import Sum
from itertools import cycle



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



def patient_info(patient):
    patient_detail = []
    titles = ['Mr.', 'Ms.', 'Mrs.', 'Baby Girl', 'Baby Boy']
    for i in patient:
        temp = []
        temp.append(i.patient_id)                                                           #0
        temp.append(i.patient_fname)                                                        #1
        temp.append(i.patient_mname)                                                        #2
        temp.append(i.patient_lname)                                                        #3
        title = [0]*5
        title[titles.index(i.patient_title)] = 1
        temp.append(i.patient_title)                                                        #4
        temp.append(i.patient_address)                                                      #5
        temp.append(i.patient_town)                                                         #6
        temp.append(i.patient_phone)                                                        #7
        s = []
        allsid =[]
        cost = []
        vacc = []
        for j,k in zip(i.patient_services.split(';'), i.patient_cost.split(';')):
            if float(j) > 8:
                s.append(Vaccine.objects.get(vaccine_id = j.split('.')[1]).vaccine_name)
                vacc.append(Vaccine.objects.get(vaccine_id = j.split('.')[1]).vaccine_name)
                cost.append(k)
            else:
                allsid.append(Service.objects.get(service_id = j).service_id)
                s.append(Service.objects.get(service_id = j).service_name)
        temp.append(", ".join(s))                                                           #8
        temp.append(Receipt.objects.get(receipt_patient=i.patient_id).receipt_cost)         #9
        temp.append(title)                                                                  #10
        temp.append(allsid)                                                                 #11
        temp.append(", ".join(vacc))                                                        #12
        temp.append(", ".join(cost))                                                        #13
        temp.append(i.patient_date)                                                         #14
        temp.append(Receipt.objects.get(receipt_patient=i.patient_id).receipt_id)           #15
        temp.append(zip(s, i.patient_cost.split(';')))                                      #16
        patient_detail.append(temp)

    return patient_detail

def patient_info_h(patient):
    patient_detail = []
    service = Service_h.objects.all()
    titles = ['Mr.', 'Ms.', 'Mrs.', 'Baby Girl', 'Baby Boy']
    for i in patient:
        temp = []
        temp.append(i.patient_id)                                                           #0
        temp.append(i.patient_fname)                                                        #1
        temp.append(i.patient_mname)                                                        #2
        temp.append(i.patient_lname)                                                        #3
        temp.append(i.patient_title)                                                        #4
        temp.append(i.patient_address)                                                      #5
        temp.append(i.patient_town)                                                         #6
        temp.append(i.patient_phone)                                                        #7
        cost = [0 for j in range(Service_h.objects.all().count())]
        allsid =[int(j.split(".")[0])  for j in i.patient_services.split(";")]
        val = [int(j) for j in i.patient_cost.split(";")]
        temp.append(i.patient_imp)                                                           #8
        temp.append(i.patient_gender)                                                        #9
        temp.append(i.patient_age)                                                          #10
        temp.append(allsid)                                                                 #11
        temp.append(val)                                                                    #12
        try:
            rooms = [Room.objects.get(room_id=j).room_name for j in i.patient_room.split(";")]
        except:
            rooms = [""]
        print(rooms)
        tcost = sum(list(map(int, i.patient_cost.split(";"))))
        acost = Receipt_h.objects.filter(receipt_patient=i.patient_id).aggregate(Sum('receipt_cost')).get('receipt_cost__sum')
        refcost = Refund_h.objects.filter(refund_patient=i.patient_id).aggregate(Sum('refund_cost')).get('refund_cost__sum')
        if acost is None:
            acost = 0
        if refcost is None:
            refcost = 0
        rem = tcost - acost - int(i.patient_discount) + refcost
        if int(rem) < 0 :
            flag = -1
        elif int(rem) > 0 :
            flag = 1
        else:
            flag = 0

        rnos = []
        rid = []
        rcost = []
        for j,k in zip(i.patient_services.split(";"),i.patient_cost.split(";")):
            sd = j.split(".")
            if int(sd[0]) == 1:
                rnos.append(sd[1])
                rid.append(sd[2])
                rcost.append(k)
            # else:
            #     break
        temp.append(tcost)                                                                  #13
        temp.append(i.patient_date)                                                         #14
        temp.append(rem)                                                                    #15
        temp.append(i.patient_address[:10])                                                 #16
        try :
            temp.append([rooms[-1], Room.objects.get(room_name=rooms[-1]).room_id])         #17
        except:
            temp.append(["",""])
        temp.append(acost)                                                                  #18
        nit = [[w,x,y,z,int(z)//int(y)] for w,x,y,z in zip(rooms,rid,rnos,rcost)]
        temp.append(nit)                                              #19
        s = i.patient_services.split(";")
        k = 0
        no = []
        cost = []
        for j in service:
            if k < len(s):
                sd = s[k].split(".")
                if j.service_id == int(sd[0]):
                    no.append(int(sd[1]))
                    cost.append(val[k])
                    while k < len(s) and j.service_id == int(s[k].split(".")[0]):
                        k+=1
                    continue
            no.append(1)
            cost.append(j.service_cost)

        # print(i.patient_id,no,len(no),cost,len(cost),len(service))
        ser = i.patient_services.split(";")
        stat = [1 for i  in ser if i.split(".")[0] == '17']
        # if len(stat) == 1:
        #     for i in service:
        #         if i.service_id == 17:
        #             i.service_cost =
        print(cost)
        temp.append(zip(service, no, cost))                                                        #20
        temp.append(flag)                                                                           #21
        temp.append(i.patient_discount)                                                               #22
        temp.append(refcost)                                                                         #23
        rooms.pop()
        temp.append(rooms)                                                                             #24
        temp.append(i.patient_rdate)                                                                   #25
        patient_detail.append(temp)
    return patient_detail



def patient_dupdate(cdate):
    patient = Patient_h.objects.filter(patient_status='0')
    for i in patient:
        ddate = (cdate - i.patient_date).days
        if ddate > 1:
            # print(i.patient_services, i.patient_cost)
            service = []
            cost = []
            lag = 0
            rooms = i.patient_room.split(";")
            l = int(0)
            for j,k in zip(i.patient_services.split(";"),i.patient_cost.split(";")):
                s = ""
                servicet = Service_h.objects.get(service_id=j.split(".")[0])
                if servicet.service_tag == "D":
                    if servicet.service_id == 1:
                        if rooms[-1] == j.split(".")[2]:
                            ndate = int(ddate) - lag
                            if ndate == 0:
                                ndate = 1
                        else:
                            ndate = j.split(".")[1]
                            lag = lag + int(ndate)
                        s = s + j.split(".")[0] + "." + str(ndate)
                        s = s + "." + rooms[l]
                        l+=1

                        cost.append(str((int(k) // int(j.split(".")[1])) * int(ndate)))
                    else:
                        s = s + j.split(".")[0] + "." + str(ddate)
                        cost.append(str((int(k) // int(j.split(".")[1])) * int(ddate)))
                else:
                    s = s + j
                    cost.append(str(k))
                service.append(str(s))
            Patient_h.objects.filter(patient_id=i.patient_id).update(patient_services=";".join(service),patient_cost=";".join(cost))

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
        users = Users.objects.filter(priority = 'U')
        if request.method == "POST":
            form = AddUserForm(request.POST)
            log = Users.objects.get(user_id = request.session['log'])
            d = {'log':log}
            if form.is_valid():
                u = form.cleaned_data['user_name']
                f = form.cleaned_data['first_name']
                l = form.cleaned_data['last_name']
                p = form.cleaned_data['phon_no']
                a = auth_code(form.cleaned_data['authority'])
                p_add = form.cleaned_data['p_add'].split('.')
                d = {'form':form, 'log':log, 'user':users}
                if p_add[0] == 'delete':
                    Users.objects.filter(user_id=p_add[1]).delete()
                    return render(request, 'DHOPDW/add_user.html', d)

                if p_add[0] == 'update':
                    Users.objects.filter(user_id=p_add[1]).update(user_name=u, fname=f, lname=l, password=p, pno=p, priority='U', auth=a)
                    return render(request, 'DHOPDW/add_user.html', d)



                log1 = Users.objects.filter(user_name = u)
                if log1.count() == 1:
                    error = 'User name already exists....'
                    d = {'form':form,'error':error,'log':log, 'user':users}
                    return render(request, 'DHOPDW/add_user.html', d)
                else:
                    add_user = Users.objects.create(user_name=u, fname=f, lname=l, password=p, pno=p, priority='U', auth=a)
                    return render(request, 'DHOPDW/add_user.html',d)
                return render(request, 'DHOPDW/add_user.html',d)
        else:
            form =AddUserForm()
            log = Users.objects.get(user_id = request.session['log'])
            d = {'form':form,'log':log, 'user':users}
            return render(request, 'DHOPDW/add_user.html', d)

    return render(request, 'DHOPDW/index.html')



def test(request):
    username = "not logged in"
    tag = request.GET['auth']
    l=[['0','1','3'],['!','@','3'],[['0','1','i','ji'],'$','*']]
    if request.method == "POST":
      #Get the posted form
      MyLoginForm = TestForm(request.POST)
      if MyLoginForm.is_valid():
          username = MyLoginForm.cleaned_data['username']
    else:
        MyLoginForm = TestForm()
    return render(request, 'DHOPDW/test.html', {"username" : username, 'l':l, 'log':Users.objects.get(user_id = request.session['log'])})

def padd(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        serviceall = Service.objects.all()
        d_dash = {'log':log,'service':serviceall,'sl':serviceall.count(),'tag':request.GET['auth']}
        tag = request.GET['auth']
        if request.method == "POST":
            AddPatient = AddPatientForm(request.POST)
            if AddPatient.is_valid():
                title = AddPatient.cleaned_data['title']
                f_name = AddPatient.cleaned_data['f_name'].title()
                m_name = AddPatient.cleaned_data['m_name'].title()
                l_name = AddPatient.cleaned_data['l_name'].title()
                addr = AddPatient.cleaned_data['addr'].title()
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
                        if Vaccine.objects.filter(vaccine_name = i.title()).count() == 0:
                            Vaccine.objects.create(vaccine_name=i.title())
                        v = "8." + str(Vaccine.objects.get(vaccine_name = i).vaccine_id)
                        s.append(v)
                    cost = cost + c

                tcost = sum(list(map(float, cost)))

                cost = ";".join(cost)

                service = service + s
                service = ";".join(service)
                if tag == 'Doctor':
                    obj = Patient.objects.create(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    # obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt.objects.create(receipt_patient=obj.patient_id, receipt_cost=tcost)
                elif tag == 'Child':
                    obj = Patient_c.objects.create(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    # obj= Patient_c.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt_c.objects.create(receipt_patient=obj.patient_id, receipt_cost=tcost)
                d = {'service':serviceall,'log':log,'sl':serviceall.count(),'tag':tag}
                return HttpResponseRedirect("/DHOPD/patient_waitlist/?auth="+ tag)
        else:
            AddPatient = AddPatientForm()
        return render(request, 'DHOPDW/patient_add.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def pbill(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        pid = request.GET['pid']
        tag = request.GET['auth']
        status = request.GET['status']
        if tag == 'Doctor':
            patient = patient_info([Patient.objects.get(patient_id = pid)])
            stat = Receipt.objects.get(receipt_patient=pid).receipt_status
        elif tag == 'Child':
            patient = patient_info([Patient_c.objects.get(patient_id = pid)])
            stat = Receipt_c.objects.get(receipt_patient=pid).receipt_status
        serviceall = Service.objects.all()
        d_dash = {'log':log,'tag':request.GET['auth'],'service':serviceall, 'patient':patient, 'pid':pid,'status':status}
        if stat == '0':
            if tag == 'Doctor':
                patient = patient_info([Patient.objects.get(patient_id=pid)])
            elif tag == 'Child':
                patient = patient_info([Patient_c.objects.get(patient_id=pid)])
            number = float(patient[0][9])
            words = num2words(number)
            return render(request, 'DHOPDW/print_bill.html',{'patient':patient,'log':log,'words':words,'tag':tag})

        if request.method == "POST":
            AddPatient = AddPatientForm(request.POST)
            print(AddPatient)
            if AddPatient.is_valid():
                print("yo")
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
                cost = ";".join(cost)
                service = service + s
                service = ";".join(service)
                if tag == 'Doctor':
                    obj = Patient.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="1", patient_cost=cost)
                    # obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt.objects.filter(receipt_patient=pid).update(receipt_cost=tcost)
                    Receipt.objects.filter(receipt_patient=pid).update(receipt_status='0')
                elif tag == 'Child':
                    obj = Patient_c.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="1", patient_cost=cost)
                    # obj= Patient_c.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt_c.objects.filter(receipt_patient=pid).update(receipt_cost=tcost)
                    Receipt_c.objects.filter(receipt_patient=pid).update(receipt_status='0')

                if tag == 'Doctor':
                    patient = patient_info([Patient.objects.get(patient_id=pid)])
                elif tag == 'Child':
                    patient = patient_info([Patient_c.objects.get(patient_id=pid)])
                number = float(patient[0][9])
                words = num2words(number)
                return render(request, 'DHOPDW/print_bill.html',{'patient':patient,'log':log,'words':words, 'tag':tag})
        else:
            AddPatient = AddPatientForm()
        return render(request, 'DHOPDW/patient_bill.html',d_dash)

    return render(request, 'DHOPDW/index.html')


def pwaitlist(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        tag = request.GET['auth']
        if request.method == "POST":
            WV = WVForm(request.POST)
            if WV.is_valid():
                status = WV.cleaned_data['status'].split('.')
                if tag == 'Doctor':
                    Patient.objects.filter(patient_id=status[1]).update(patient_status=status[0])
                elif tag == 'Child':
                    Patient_c.objects.filter(patient_id=status[1]).update(patient_status=status[0])
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
                cost = ";".join(cost)
                service = service + s
                service = ";".join(service)
                if tag == 'Doctor':
                    Patient.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt.objects.filter(receipt_patient=obj.patient_id).update(receipt_cost=tcost)
                elif tag == 'Child':
                    Patient_c.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    obj= Patient_c.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt_c.objects.filter(receipt_patient=obj.patient_id).update(receipt_cost=tcost)
        else:
            WV = WVForm()
            AddPatient = AddPatientForm()
        service = Service.objects.all()
        if tag == 'Doctor':
            patient = Patient.objects.filter(patient_date=datetime.today().strftime('%Y-%m-%d'))
        elif tag == 'Child':
            patient = Patient_c.objects.filter(patient_date=datetime.today().strftime('%Y-%m-%d'))
        Patient_curr = []
        patient_w = []
        titles = ['Mr.', 'Ms.', 'Mrs.', 'Baby Girl', 'Baby Boy']

        for i in patient:
            temp = []
            temp.append(i.patient_id)                                                           #0
            temp.append(i.patient_fname)                                                        #1
            temp.append(i.patient_mname)                                                        #2
            temp.append(i.patient_lname)                                                        #3
            title = [0]*5
            title[titles.index(i.patient_title)] = 1
            temp.append(i.patient_title)                                                        #4
            temp.append(i.patient_address)                                                      #5
            temp.append(i.patient_town)                                                         #6
            temp.append(i.patient_phone)                                                        #7
            s = []
            allsid =[]
            cost = []
            vacc = []
            for j,k in zip(i.patient_services.split(';'), i.patient_cost.split(';')):
                if float(j) > 8:
                    s.append(Vaccine.objects.get(vaccine_id = j.split('.')[1]).vaccine_name)
                    vacc.append(Vaccine.objects.get(vaccine_id = j.split('.')[1]).vaccine_name)
                    cost.append(k)
                else:
                    allsid.append(Service.objects.get(service_id = j).service_id)
                    s.append(Service.objects.get(service_id = j).service_name)
            temp.append(", ".join(s))                                                           #8
            if tag == "Doctor":
                temp.append(Receipt.objects.get(receipt_patient=i.patient_id).receipt_cost)         #9
            elif tag == "Child":
                temp.append(Receipt_c.objects.get(receipt_patient=i.patient_id).receipt_cost)         #9
            temp.append(title)                                                                  #10
            temp.append(allsid)                                                                 #11
            temp.append(", ".join(vacc))                                                        #12
            temp.append(", ".join(cost))                                                        #13
            if i.patient_status == '0':
                Patient_curr.append(temp)
            elif i.patient_status == '1':
                patient_w.append(temp)

        d_dash = {'log':log, 'tag':tag, 'service':service, 'patient_c':Patient_curr, 'patient_w':patient_w}
        return render(request, 'DHOPDW/patient_waitlist.html',d_dash)
    return render(request, 'DHOPDW/index.html')


def psearch(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        tag = request.GET['auth']
        if tag == 'Doctor':
            patient = patient_info(Patient.objects.all())
            fromd = Patient.objects.all()[0].patient_date
        elif tag == 'Child':
            patient = patient_info(Patient_c.objects.all())
            fromd = Patient_c.objects.all()[0].patient_date
        fd = fromd.strftime('%Y-%m-%d')
        tod = datetime.today().strftime('%Y-%m-%d')
        if request.method == "POST":
            search = SearchForm(request.POST)
            if search.is_valid():
                fromd = search.cleaned_data['fromd']
                tod = search.cleaned_data['tod']
                pid = search.cleaned_data['pid']
                if pid == 'date':
                    if tag == 'Doctor':
                        patient = patient_info(Patient.objects.filter(patient_date__range=(fromd, tod)))
                    elif tag == 'child':
                        patient = patient_info(Patient_c.objects.filter(patient_date__range=(fromd, tod)))
                    d_dash = {'log':log,'tag':tag,'patient':patient, 'fromd':fromd, 'tod':tod}
                else:
                    if tag == 'Doctor':
                        patient = patient_info([Patient.objects.get(patient_id=pid)])
                    elif tag == 'Child':
                        patient = patient_info([Patient_c.objects.get(patient_id=pid)])
                    number = float(patient[0][9])
                    words = num2words(number)
                    return render(request, 'DHOPDW/print_bill.html', {'patient':patient,'log':log,'words':words,'tag':tag})

        else:
            search = SearchForm()
        d_dash = {'log':log,'tag':tag,'patient':patient, 'fromd':fromd, 'tod':tod, 'fd':fd}
        return render(request, 'DHOPDW/patient_search.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def printbill(request):
    if 'log' in request.session:
        return render(request, 'DHOPDW/print_bill.html')
    return render(request, 'DHOPDW/index.html')

def service(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        service = request.GET['service']
        if service == 'Doctor':
            services = Service.objects.all()
        elif service == 'Hospital':
            services = Service_h.objects.all()
        d_dash = {'log':log, 'service':service, 'services':services}
        if request.method == "POST":
            ser = ServiceForm(request.POST)
            if ser.is_valid():
                s_name = ser.cleaned_data['s_name']
                s_cost = ser.cleaned_data['s_cost']
                s_tag = ser.cleaned_data['s_tag']
                sid = ser.cleaned_data['sid'].split('.')
                if service == 'Doctor':
                    if sid[0] == 'update':
                        Service.objects.filter(service_id=sid[1]).update(service_name=s_name, service_cost=s_cost)
                        return render(request, 'DHOPDW/add_service.html', d_dash)
                    if sid[0] == 'delete':
                        Service.objects.filter(service_id=sid[1]).delete()
                        return render(request, 'DHOPDW/add_service.html', d_dash)
                    else:
                        Service.objects.create(service_name=s_name, service_cost=s_cost)
                if service == 'Hospital':
                    if sid[0] == 'update':
                        Service_h.objects.filter(service_id=sid[1]).update(service_name=s_name, service_cost=s_cost, service_tag=s_tag)
                        return render(request, 'DHOPDW/add_service_h.html', d_dash)
                    if sid[0] == 'delete':
                        Service_h.objects.filter(service_id=sid[1]).delete()
                        return render(request, 'DHOPDW/add_service_h.html', d_dash)
                    else:
                        Service_h.objects.create(service_name=s_name, service_cost=s_cost, service_tag=s_tag)
        else:
            ser = ServiceForm()
        if service == 'Doctor':
            return render(request, 'DHOPDW/add_service.html',d_dash)
        elif service == 'Hospital':
            return render(request, 'DHOPDW/add_service_h.html', d_dash)
    return render(request, "DHOPDW/index.html")

def room(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        # service = request.GET['service']
        rooms = Room.objects.all()
        d_dash = {'log':log, 'room':rooms}
        if request.method == "POST":
            room = RoomForm(request.POST)
            print("moshi mposhi")
            if room.is_valid():
                r_name = room.cleaned_data['r_name'].title()
                r_cost = room.cleaned_data['r_cost']
                r_bed = room.cleaned_data['r_bed']
                rid = room.cleaned_data['rid'].split('.')
                print(r_name, r_cost, r_bed, rid)
                if rid[0] == 'update':
                    Room.objects.filter(room_id=rid[1]).update(room_name=r_name, room_cost=r_cost, room_bed =r_bed)
                    return render(request, 'DHOPDW/add_room.html', d_dash)
                if rid[0] == 'delete':
                    Room.objects.filter(room_id=rid[1]).delete()
                    return render(request, 'DHOPDW/add_room.html', d_dash)
                else:
                    r = Room.objects.filter(room_name=r_name)
                    if r.count() == 0:
                        Room.objects.create(room_name=r_name, room_cost=r_cost, room_bed =r_bed)
                    else:
                        d_dash = {'log':log, 'room':rooms, 'error':"Room already exists"}
            else:
                room = RoomForm()
        return render(request, 'DHOPDW/add_room.html', d_dash)
    return render(request, "DHOPDW/index.html")

def report(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        tod = datetime.today().strftime('%Y-%m-%d')
        d_dash = {'log':log, 'fromd':tod, 'tod':tod}
        if request.method == "POST":
            rpt = SearchForm(request.POST)
            if rpt.is_valid():
                fromd = rpt.cleaned_data['fromd']
                tod = rpt.cleaned_data['tod']
                tag = rpt.cleaned_data['tag']
                pid = rpt.cleaned_data['pid']
                print("mod")
                print(fromd, tod, tag, pid)
                if tag == 'Doctor':
                    patient = patient_info(Patient.objects.filter(patient_date__range=(fromd, tod)))
                    d_dash = {'log':log,'tag':tag,'patient':patient, 'fromd':fromd, 'tod':tod}
                elif tag == 'Child':
                    patient = patient_info(Patient_c.objects.filter(patient_date__range=(fromd, tod)))
                    d_dash = {'log':log,'tag':tag,'patient':patient, 'fromd':fromd, 'tod':tod}
                elif tag == 'Hospital':
                    patient = patient_info_h(Patient_h.objects.filter(patient_date__range=(fromd, tod),patient_status='2'))
                    bill = []
                    for i in patient:
                        bill.append(Bill_h.objects.get(bill_patient = i[0]))
                    d_dash = {'log':log,'tag':tag,'patient':list(zip(patient,bill)), 'fromd':fromd, 'tod':tod}
                    if pid == 'date':
                        return render(request, 'DHOPDW/report_h.html', d_dash)
                    if tag == 'Hospital':
                        return render(request, 'DHOPDW/print_report_h.html', d_dash)

                if pid == 'Print':
                    return render(request, 'DHOPDW/print_report.html', d_dash)

        else:
            rpt = SearchForm()

        return render(request, 'DHOPDW/report.html', d_dash)
    return render(request, "DHOPDW/index.html")

def paddh(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        room = Room.objects.all()
        d_dash = {'log':log, 'room':room}
        if request.method == "POST":
            roomh = AddPatientHForm(request.POST)
            if roomh.is_valid():
                title = roomh.cleaned_data['title'].title()
                f_name = roomh.cleaned_data['f_name'].title()
                m_name = roomh.cleaned_data['m_name'].title()
                l_name = roomh.cleaned_data['l_name'].title()
                addr = roomh.cleaned_data['addr']
                number = roomh.cleaned_data['number']
                gender = roomh.cleaned_data['gender']
                age = roomh.cleaned_data['age']
                imp = roomh.cleaned_data['imp'].title()
                town = roomh.cleaned_data['town'].title()
                room = roomh.cleaned_data['room']
                rc = Room.objects.get(room_id=room).room_bed_occ
                service = Service_h.objects.filter(service_tag='D')
                sr = []
                cst = []
                for i in service:
                    if i.service_id == 1:
                        cst.append(Room.objects.get(room_id=room).room_cost)
                        sr.append(str(i.service_id) + ".1." + str(room))
                    else:
                        cst.append(i.service_cost)
                        sr.append(str(i.service_id) + ".1")
                print(sr)
                Room.objects.filter(room_id=room).update(room_bed_occ=str(int(rc) + 1))
                Patient_h.objects.create(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_age=age, patient_gender=gender, patient_services=";".join(sr), patient_cost=";".join(cst), patient_address=addr, patient_town=town, patient_phone=number, patient_imp=imp, patient_status="0", patient_room=room)
                return HttpResponseRedirect("/DHOPD/patient_waitlist_h/")

        else:
            roomh = AddPatientHForm()
        return render(request, 'DHOPDW/patient_add_h.html', d_dash)
    else:
        return render(request, 'DHOPDW/index.html')

def pwaitlisth(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        if request.method == "POST":
            WV = WVForm(request.POST)
            RF = ReceiptForm(request.POST)
            roomh = AddPatientHForm(request.POST)
            if WV.is_valid():
                status = WV.cleaned_data['status'].split('.')
                print(status)
                if status[0] == "1":
                    room = Patient_h.objects.get(patient_id=status[1]).patient_room
                    print(room)
                    rc = Room.objects.get(room_id=room).room_bed_occ
                    Room.objects.filter(room_id=room).update(room_bed_occ=str(int(rc) - 1))
                Patient_h.objects.filter(patient_id=status[1]).update(patient_status=status[0], patient_rdate=date.today())
            if RF.is_valid():
                name = RF.cleaned_data['name']
                cost = RF.cleaned_data['cost']
                receipt = RF.cleaned_data['receipt']
                type = RF.cleaned_data['type']
                no = RF.cleaned_data['no']
                print(type, no)
                Receipt_h.objects.create(receipt_name=name, receipt_cost=cost, receipt_patient=receipt, receipt_type=type, receipt_no=no)
                r = Receipt_h.objects.filter(receipt_name=name, receipt_cost=cost, receipt_patient=receipt, receipt_type=type, receipt_no=no).order_by('receipt_id').reverse()[0]
                p = Patient_h.objects.get(patient_id=receipt)
                number = float(cost)
                words = num2words(number)
                return render(request, 'DHOPDW/patient_receipt.html', {'receipt':r, 'patient':p, 'log':log, 'date':datetime.today().strftime('%d-%m-%Y'), 'words':words})
            if roomh.is_valid():
                title = roomh.cleaned_data['title'].title()
                f_name = roomh.cleaned_data['f_name'].title()
                m_name = roomh.cleaned_data['m_name'].title()
                l_name = roomh.cleaned_data['l_name'].title()
                addr = roomh.cleaned_data['addr']
                number = roomh.cleaned_data['number']
                gender = roomh.cleaned_data['gender']
                age = roomh.cleaned_data['age']
                imp = roomh.cleaned_data['imp'].title()
                town = roomh.cleaned_data['town'].title()
                room = roomh.cleaned_data['room']
                service = roomh.cleaned_data['service']
                service = re.findall(r"\'(.+?)\'", service)
                print("service", service)
                pid = roomh.cleaned_data['pid']
                curr_patient = Patient_h.objects.get(patient_id=pid)
                curr_room = curr_patient.patient_room.split(";")
                curr_service = curr_patient.patient_services.split(";")
                # ser = [i.split("_")[0]+"."+i.split("_")[1] for i in service]
                ser = []
                uroom = []
                cost = []
                for i in service:
                    s = i.split("_")
                    if s[0] == "1":
                        uroom.append(s[1])
                if len(uroom) == 0 and str(room) == curr_room[-1]:
                    room = ""
                if room != "" and (len(curr_room) == 0 or curr_room[-1] != str(room)) and (len(uroom) == 0 or uroom[-1] != str(room)):
                    uroom.append(str(room))
                # print(curr_room[-1], uroom, room)
                for i,j in zip(uroom, service):
                    s = j.split("_")
                    u = ""
                    if i == s[1] and s[0] == '1':
                        u = u + s[0] + "." + s[2] + "." + i
                        rcost = Room.objects.get(room_id=i).room_cost
                        cost.append(str(int(rcost) * int(s[2])))
                    else:
                        u = u + "1.1." + i
                        rcost = Room.objects.get(room_id=i).room_cost
                        cost.append(str(int(rcost) * 1))
                    ser.append(u)
                for i in service:
                    s = i.split("_")
                    u = ""
                    if s[0] == "1":
                        continue
                    else:
                        u = u + s[0] + "." + s[1]
                        scost = Service_h.objects.get(service_id=s[0]).service_cost
                        cost.append(str(int(scost) * int(s[1])))
                    ser.append(u)

                # print(service, "\n", pid, "\n", ser, "\n", curr_service, "\n", cost, "\n", curr_patient.patient_cost.split(";"), "\n", uroom)
                # print("cree room", curr_room[-1], "len", len(curr_room), curr_room)
                # print("new", room)
                if room == "" or int(uroom[-1]) != int(room):
                    # rc = int(Room.objects.get(room_id=curr_room[-1]).room_bed_occ)
                    # print("current room", rc)
                    # rc-=1
                    # print("removed", rc)
                    rc = int(Room.objects.get(room_id=curr_room[-1]).room_bed_occ)
                    Room.objects.filter(room_id=curr_room[-1]).update(room_bed_occ=str(int(rc) - 1))
                elif curr_room[-1] == "":
                    rc = int(Room.objects.get(room_id=room).room_bed_occ)
                    Room.objects.filter(room_id=room).update(room_bed_occ=str(int(rc) + 1))
                elif (int(curr_room[-1]) != int(room)):
                    # print("not_equal")
                    # rc = int(Room.objects.get(room_id=curr_room[-1]).room_bed_occ)
                    # print("current room", rc)
                    # rc-=1
                    # print("removed", rc)
                    # rc = int(Room.objects.get(room_id=room).room_bed_occ)
                    # print("new room", rc)
                    # rc+=1
                    # print("add", rc)
                    rc = int(Room.objects.get(room_id=curr_room[-1]).room_bed_occ)
                    Room.objects.filter(room_id=curr_room[-1]).update(room_bed_occ=str(int(rc) - 1))
                    rc = Room.objects.get(room_id=room).room_bed_occ
                    Room.objects.filter(room_id=room).update(room_bed_occ=str(int(rc) + 1))

                Patient_h.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_age=age, patient_gender=gender, patient_services=";".join(ser), patient_cost=";".join(cost), patient_address=addr, patient_town=town, patient_phone=number, patient_imp=imp, patient_room=";".join(uroom))

        else:
            WV = WVForm()
            RF = ReceiptForm()
            roomh = AddPatientHForm()
        cdate = date.today()
        patient_dupdate(cdate)
        patient = Patient_h.objects.filter(patient_status="0")
        patient_curr = patient_info_h(patient)
        patient = Patient_h.objects.filter(patient_status="1")
        patient_w = patient_info_h(patient)
        room = Room.objects.all()
        d_dash = {'log':log, 'patient_c':patient_curr, 'patient_w':patient_w, 'room':room, 'tag':'Room'}
        return render(request, 'DHOPDW/patient_waitlist_h.html',d_dash)
    return render(request, 'DHOPDW/index.html')

def pbillh(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        id = request.GET['id']
        patient = Patient_h.objects.get(patient_id=id)
        if patient.patient_status == '2':
            patient = patient_info_h([patient])
            final_amt = float(patient[0][13]) - float(patient[0][22])
            receipt = Receipt_h.objects.filter(receipt_patient=id)
            for i in receipt:
                i.receipt_time = i.receipt_time.strftime('%Y-%m-%d')
            refund = Refund_h.objects.filter(refund_patient=id)
            for i in refund:
                i.refund_time = i.refund_time.strftime('%Y-%m-%d')
            rid = []
            for i in receipt:
                rid.append(str(i.receipt_id))
            b = Bill_h.objects.get(bill_patient=id)
            d_dash = {'log':log, 'patient':patient, 'pid':id, 'receipt':receipt, 'refund':refund, 'bill':b}
            return render(request, 'DHOPDW/print_bill_h.html', d_dash)

        if request.method == "POST":
            roomh = AddPatientHForm(request.POST)
            RF = ReceiptForm(request.POST)
            PBF = PrintBillForm(request.POST)
            if RF.is_valid():
                name = RF.cleaned_data['name']
                cost = abs(float(RF.cleaned_data['cost']))
                receipt = RF.cleaned_data['receipt'].split(".")
                type = RF.cleaned_data['type']
                no = RF.cleaned_data['no']
                print(type, no)
                # print(receipt)
                number = float(cost)
                words = num2words(number)
                if receipt[0] == "receipt":
                    Receipt_h.objects.create(receipt_name=name, receipt_cost=cost, receipt_patient=receipt[1], receipt_type=type, receipt_no=no)
                    r = Receipt_h.objects.filter(receipt_name=name, receipt_cost=cost, receipt_patient=receipt[1], receipt_type=type, receipt_no=no).order_by('receipt_id').reverse()[0]
                    p = Patient_h.objects.get(patient_id=receipt[1])
                    return render(request, 'DHOPDW/patient_receipt.html', {'receipt':r, 'patient':p, 'log':log, 'date':datetime.today().strftime('%d-%m-%Y'), 'words':words})
                elif receipt[0] == "refund":
                    Refund_h.objects.create(refund_name=name, refund_cost=cost, refund_patient=receipt[1])
                    r = Refund_h.objects.filter(refund_name=name, refund_cost=cost, refund_patient=receipt[1]).order_by('refund_id').reverse()[0]
                    p = Patient_h.objects.get(patient_id=receipt[1])
                    return render(request, 'DHOPDW/patient_refund.html', {'receipt':r, 'patient':p, 'log':log, 'date':datetime.today().strftime('%d-%m-%Y'), 'words':words})
            if PBF.is_valid():
                p = PBF.cleaned_data['p']
                patient = Patient_h.objects.get(patient_id=id)
                patient = patient_info_h([patient])
                final_amt = float(patient[0][13]) - float(patient[0][22])
                receipt = Receipt_h.objects.filter(receipt_patient=id)
                rid = []
                for i in receipt:
                    i.receipt_time = i.receipt_time.strftime('%Y-%m-%d')
                    rid.append(str(i.receipt_id))

                refund = Refund_h.objects.filter(refund_patient=id)
                rfid = []
                for i in refund:
                    i.refund_time = i.refund_time.strftime('%Y-%m-%d')
                    rfid.append(str(i.refund_id))

                rr = [";".join(rid)]
                rr.append(";".join(rfid))
                # print(rr, " / ".join(rr))
                Patient_h.objects.filter(patient_id=id).update(patient_status='2')
                b = Bill_h.objects.create(bill_patient=p, bill_cost=final_amt, bill_receipt=" / ".join(rr))
                d_dash = {'log':log, 'patient':patient, 'pid':id, 'receipt':receipt, 'refund':refund, 'bill':b}
                return render(request, 'DHOPDW/print_bill_h.html', d_dash)
            if roomh.is_valid():
                title = roomh.cleaned_data['title'].title()
                f_name = roomh.cleaned_data['f_name'].title()
                m_name = roomh.cleaned_data['m_name'].title()
                l_name = roomh.cleaned_data['l_name'].title()
                addr = roomh.cleaned_data['addr']
                number = roomh.cleaned_data['number']
                gender = roomh.cleaned_data['gender']
                age = roomh.cleaned_data['age']
                imp = roomh.cleaned_data['imp'].title()
                town = roomh.cleaned_data['town'].title()
                room = roomh.cleaned_data['room']
                disc = roomh.cleaned_data['disc']
                other = roomh.cleaned_data['other']
                print(other)
                service = roomh.cleaned_data['service']
                service = re.findall(r"\'(.+?)\'", service)
                print("service", service)
                pid = id
                print(pid)
                curr_patient = Patient_h.objects.get(patient_id=pid)
                curr_room = curr_patient.patient_room.split(";")
                curr_service = curr_patient.patient_services.split(";")

                ser = []
                uroom = []
                cost = []
                for i in service:
                    s = i.split("_")
                    if s[0] == "1":
                        uroom.append(s[1])
                if len(uroom) == 0 and str(room) == curr_room[-1]:
                    room = ""
                if room != "" and (len(curr_room) == 0 or curr_room[-1] != str(room)) and (len(uroom) == 0 or uroom[-1] != str(room)):
                    uroom.append(str(room))

                print(uroom)
                for i,j in zip(uroom, service):
                    s = j.split("_")
                    u = ""
                    print("hi",s)
                    print(s,j,i)
                    if s[0] == "1" and i == s[1]:
                        u = u + s[0] + "." + s[2] + "." + i
                        rcost = Room.objects.get(room_id=i).room_cost
                        cost.append(str(int(rcost) * int(s[2])))
                    else:
                        u = u + "1.1." + i
                        rcost = Room.objects.get(room_id=i).room_cost
                        cost.append(str(int(rcost) * 1))
                    ser.append(u)
                for i in service:
                    s = i.split("_")
                    u = ""
                    if s[0] == "1":
                        continue
                    else:
                        u = u + s[0] + "." + s[1]
                        if s[0] == "17":
                            scost = other
                        else:
                            scost = Service_h.objects.get(service_id=s[0]).service_cost
                        cost.append(str(int(scost) * int(s[1])))
                    ser.append(u)

                if room == "" or int(uroom[-1]) != int(room):
                    rc = int(Room.objects.get(room_id=curr_room[-1]).room_bed_occ)
                    Room.objects.filter(room_id=curr_room[-1]).update(room_bed_occ=str(int(rc) - 1))
                elif curr_room[-1] == "":
                    rc = int(Room.objects.get(room_id=room).room_bed_occ)
                    Room.objects.filter(room_id=room).update(room_bed_occ=str(int(rc) + 1))
                elif (int(curr_room[-1]) != int(room)):
                    rc = int(Room.objects.get(room_id=curr_room[-1]).room_bed_occ)
                    Room.objects.filter(room_id=curr_room[-1]).update(room_bed_occ=str(int(rc) - 1))
                    rc = Room.objects.get(room_id=room).room_bed_occ
                    Room.objects.filter(room_id=room).update(room_bed_occ=str(int(rc) + 1))

                Patient_h.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_age=age, patient_gender=gender, patient_services=";".join(ser), patient_cost=";".join(cost), patient_address=addr, patient_town=town, patient_phone=number, patient_imp=imp, patient_room=";".join(uroom), patient_discount=disc)

        else:
            roomh = AddPatientHForm()
            RF = ReceiptForm()
            PBF = PrintBillForm()
        room = Room.objects.all()
        id = request.GET['id']
        print(id)
        patient = Patient_h.objects.get(patient_id=id)
        patient = patient_info_h([patient])

        receipt = Receipt_h.objects.filter(receipt_patient=id)
        for i in receipt:
            i.receipt_time = i.receipt_time.strftime('%Y-%m-%d')
        refund = Refund_h.objects.filter(refund_patient=id)
        for i in refund:
            i.refund_time = i.refund_time.strftime('%Y-%m-%d')
        d_dash = {'log':log, 'patient':patient, 'room':room, 'pid':id, 'receipt':receipt, 'refund':refund}
        return render(request, 'DHOPDW/patient_bill_h.html',d_dash)
    return render(request, "DHOPDW/index.html")

def psearchh(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        patient = patient_info_h(Patient_h.objects.filter(patient_status='2'))
        fromd = Patient_h.objects.filter(patient_status='2')[0].patient_date
        fd = fromd.strftime('%Y-%m-%d')
        tod = datetime.today().strftime('%Y-%m-%d')
        bill = []
        for i in patient:
            bill.append(Bill_h.objects.get(bill_patient = i[0]))
        print(patient[0][14]-patient[0][25], type(patient[0][25]))
        if request.method == "POST":
            search = SearchForm(request.POST)
            if search.is_valid():
                fromd = search.cleaned_data['fromd']
                tod = search.cleaned_data['tod']
                pid = search.cleaned_data['pid']
                if pid == 'date':
                    patient = patient_info_h(Patient_h.objects.filter(patient_date__range=(fromd, tod)))
                    d_dash = {'log':log,'tag':tag,'patient':patient, 'fromd':fromd, 'tod':tod}
                else:
                    patient = patient_info_h([Patient_h.objects.get(patient_id=pid)])
                    number = float(patient[0][9])
                    words = num2words(number)
                    return render(request, 'DHOPDW/print_bill.html', {'patient':patient,'log':log,'words':words,'tag':tag})

        else:
            search = SearchForm()
        d_dash = {'log':log, 'patient':zip(patient,bill), 'fromd':fromd, 'tod':tod, 'fd':fd}
        return render(request, 'DHOPDW/patient_search_h.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def logout(request):
    if 'log' in request.session:
        del request.session['log']
    return render(request, 'DHOPDW/index.html')


# Create your views here.
