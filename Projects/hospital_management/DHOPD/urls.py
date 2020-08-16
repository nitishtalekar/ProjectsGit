from django.contrib import admin
from django.urls import path
from . import views

urlpatterns = [
    path('', views.index),
    path('dashboard/', views.dashboard),
    path('patient_add/', views.padd),
    path('patient_add_h/', views.paddh),
    path('patient_bill/', views.pbill),
    path('patient_bill_h/', views.pbillh),
    path('patient_waitlist/', views.pwaitlist),
    path('patient_waitlist_h/', views.pwaitlisth),
    path('patient_search/', views.psearch),
    path('patient_search_h/', views.psearchh),
    path('logout/', views.logout),
    path('add_user/', views.user),
    path('print_bill/', views.printbill),
    path('add_service/', views.service),
    path('add_room/', views.room),
    path('report/', views.report),
    path('test/', views.test)
]
