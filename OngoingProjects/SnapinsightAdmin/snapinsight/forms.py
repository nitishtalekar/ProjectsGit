from django import forms

class OverviewForm(forms.Form):
    some_point = forms.CharField(required=False)
    principle = forms.CharField(required=False)
    description = forms.CharField()
