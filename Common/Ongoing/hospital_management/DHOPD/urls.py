from django.contrib import admin
from django.urls import path
from . import views

urlpatterns = [
    path('', views.index),
    path('male/', views.male),
    path('female/', views.female),
    path('room/', views.room),
    path('add_user/', views.user)
]
