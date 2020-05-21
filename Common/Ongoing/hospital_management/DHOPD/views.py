from django.shortcuts import render
from django.http import HttpResponse,HttpResponseRedirect
from DHOPD.forms import *
from .models import *
import re
from datetime import datetime
from num2words import num2words



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
        patient_detail.append(temp)

    return patient_detail


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
                    Patient.objects.create(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt.objects.create(receipt_patient=obj.patient_id, receipt_cost=tcost)
                elif tag == 'Child':
                    Patient_c.objects.create(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="0", patient_cost=cost)
                    obj= Patient_c.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt_c.objects.create(receipt_patient=obj.patient_id, receipt_cost=tcost)
                d = {'service':serviceall,'log':log,'sl':serviceall.count(),'tag':tag}
                return render(request, 'DHOPDW/patient_add.html', d)
        else:
            AddPatient = AddPatientForm()
        return render(request, 'DHOPDW/patient_add.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def pbill(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        pid = request.GET['pid']
        tag = request.GET['auth']
        if tag == 'Doctor':
            patient = patient_info([Patient.objects.get(patient_id = pid)])
            stat = Receipt.objects.get(receipt_patient=pid).receipt_status
        elif tag == 'Child':
            patient = patient_info([Patient_c.objects.get(patient_id = pid)])
            stat = Receipt_c.objects.get(receipt_patient=pid).receipt_status
        serviceall = Service.objects.all()
        d_dash = {'log':log,'tag':request.GET['auth'],'service':serviceall, 'patient':patient, 'pid':pid}
        if stat == '0':
            if tag == 'Doctor':
                patient = patient_info([Patient.objects.get(patient_id=pid)])
            elif tag == 'Child':
                patient = patient_info([Patient_c.objects.get(patient_id=pid)])
            number = float(patient[0][9])
            words = num2words(number)
            return render(request, 'DHOPDW/print_bill.html',{'patient':patient,'log':log,'words':words})
        if request.method == "POST":
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
                cost = ";".join(cost)
                service = service + s
                service = ";".join(service)
                if tag == 'Doctor':
                    Patient.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="1", patient_cost=cost)
                    obj= Patient.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt.objects.filter(receipt_patient=obj.patient_id).update(receipt_cost=tcost)
                    Receipt.objects.filter(receipt_patient=obj.patient_id).update(receipt_status='0')
                elif tag == 'Child':
                    Patient_c.objects.filter(patient_id=pid).update(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name, patient_title=title, patient_address=addr, patient_town=town, patient_phone=number, patient_services=service, patient_status="1", patient_cost=cost)
                    obj= Patient_c.objects.filter(patient_fname=f_name, patient_mname=m_name, patient_lname=l_name).order_by('patient_id').reverse()[0]
                    Receipt_c.objects.filter(receipt_patient=obj.patient_id).update(receipt_cost=tcost)
                    Receipt_c.objects.filter(receipt_patient=obj.patient_id).update(receipt_status='0')

                if tag == 'Doctor':
                    patient = patient_info([Patient.objects.get(patient_id=pid)])
                elif tag == 'Child':
                    patient = patient_info([Patient_c.objects.get(patient_id=pid)])
                number = float(patient[0][9])
                words = num2words(number)
                return render(request, 'DHOPDW/print_bill.html',{'patient':patient,'log':log,'words':words})
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
            temp.append(Receipt.objects.get(receipt_patient=i.patient_id).receipt_cost)         #9
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
                    return render(request, 'DHOPDW/print_bill.html', {'patient':patient,'log':log,'words':words})

        else:
            search = SearchForm()
        d_dash = {'log':log,'tag':tag,'patient':patient, 'fromd':fromd, 'tod':tod, 'fd':fd}
        return render(request, 'DHOPDW/patient_search.html',d_dash)

    return render(request, 'DHOPDW/index.html')

def printbill(request):
    if 'log' in request.session:
        return render(request, 'DHOPDW/print_bill.html')

def service(request):
    if 'log' in request.session:
        log = Users.objects.get(user_id = request.session['log'])
        service = request.GET['service']
        if service == 'Doctor':
            services = Service.objects.all()
        d_dash = {'log':log, 'service':service, 'services':services}
        if request.method == "POST":
            ser = ServiceForm(request.POST)
            if ser.is_valid():
                s_name = ser.cleaned_data['s_name']
                s_cost = ser.cleaned_data['s_cost']
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

        else:
            ser = ServiceForm()
        return render(request, 'DHOPDW/add_service.html',d_dash)
# Create your views here.
