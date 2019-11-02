from django import forms

li = ['Red','Yellow','Green','Blue']
s = [(i,i) for i in li]

class Btnform(forms.Form):
    check = forms.CharField(widget = forms.HiddenInput(),required=False)
    
class Rollform(forms.Form):
    check2 = forms.CharField(widget = forms.HiddenInput(),required=False)
    
class Loginform(forms.Form):
    team1 = forms.CharField(required=False,max_length=20)
    color1 = forms.ChoiceField(choices=s[0:]+s[:0])
    team2 = forms.CharField(required=False,max_length=20)
    color2 = forms.ChoiceField(choices=s[1:]+s[:1])
    team3 = forms.CharField(required=False,max_length=20)
    color3 = forms.ChoiceField(choices=s[2:]+s[:2])
    team4 = forms.CharField(required=False,max_length=20)
    color4 = forms.ChoiceField(choices=s[3:]+s[:3])
    