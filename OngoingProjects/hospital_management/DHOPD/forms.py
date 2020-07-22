from django import forms

class TestForm(forms.Form):
    username = forms.CharField()
    password = forms.CharField(widget = forms.PasswordInput)

class LoginForm(forms.Form):
    user_name = forms.CharField()
    password = forms.CharField(widget = forms.PasswordInput)


class AddUserForm(forms.Form):
    user_name = forms.CharField()
    first_name = forms.CharField()
    last_name = forms.CharField()
    phon_no = forms.CharField()
    p_add = forms.CharField(required = False)
    authority = forms.CharField(widget=forms.CheckboxSelectMultiple(), required = True)

class AddPatientForm(forms.Form):
    title = forms.CharField()
    f_name = forms.CharField()
    m_name = forms.CharField()
    l_name = forms.CharField()
    addr = forms.CharField()
    town = forms.CharField()
    number = forms.CharField()
    service = forms.CharField(widget=forms.CheckboxSelectMultiple())
    vacc = forms.CharField(required=False)
    cost = forms.CharField(required=False)
    pid = forms.CharField(required=False)

class WVForm(forms.Form):
    status = forms.CharField()

class SearchForm(forms.Form):
    fromd = forms.CharField(required=False)
    tod = forms.CharField(required=False)
    pid = forms.CharField(required=False)
    tag = forms.CharField(required=False)

class ServiceForm(forms.Form):
    sid = forms.CharField(required=False)
    s_name = forms.CharField()
    s_cost = forms.CharField()
    s_tag = forms.CharField(required=False)

class RoomForm(forms.Form):
    rid = forms.CharField(required=False)
    r_name = forms.CharField()
    r_cost = forms.CharField()
    r_bed = forms.CharField()

class AddPatientHForm(forms.Form):
    title = forms.CharField()
    f_name = forms.CharField()
    m_name = forms.CharField()
    l_name = forms.CharField()
    addr = forms.CharField()
    town = forms.CharField()
    number = forms.CharField()
    gender = forms.CharField()
    age = forms.CharField()
    imp = forms.CharField()
    room = forms.CharField()
    pid = forms.CharField(required=False)

class ReceiptForm(forms.Form):
    name = forms.CharField()
    cost = forms.CharField()
    receipt = forms.CharField()
