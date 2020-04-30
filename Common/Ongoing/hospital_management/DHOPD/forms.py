from django import forms

AUTHORITY= [
    ('female', 'Child'),
    ('male', 'Doctor'),
    ('room', 'Room'),
    ]


class LoginForm(forms.Form):
    user_name = forms.CharField()
    password = forms.CharField(widget = forms.PasswordInput)


class AddUserForm(forms.Form):
    user_name = forms.CharField()
    first_name = forms.CharField()
    last_name = forms.CharField()
    phon_no = forms.CharField()
    authority = forms.CharField(widget=forms.CheckboxSelectMultiple(choices=AUTHORITY), required = True)
