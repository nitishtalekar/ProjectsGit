from django.contrib import admin
from django.urls import path
from . import views

urlpatterns = [
    path('', views.index),
    path('dashboard/', views.dashboard),
    path('patient_add/', views.padd),
    path('patient_bill/', views.pbill),
    path('patient_waitlist/', views.pwaitlist),
    path('patient_search/', views.psearch),
    path('add_user/', views.user),
    path('print_bill/', views.printbill),
    path('add_service/', views.service),
    path('test/', views.test)
]