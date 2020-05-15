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
