from django import forms

class LoginForm(forms.Form):
    uname = forms.CharField()
    rname = forms.CharField()
    password = forms.CharField()

class GameForm(forms.Form):
    type = forms.CharField()
    room = forms.CharField()
