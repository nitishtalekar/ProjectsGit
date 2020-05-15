from django.db import models
import datetime

# Create your models here.
class Users(models.Model):
    user_id = models.AutoField(primary_key=True, max_length = 200)
    user_name = models.CharField(max_length = 200)
    password = models.CharField(max_length = 200)
    fname = models.CharField(max_length = 200)
    lname = models.CharField(max_length = 200)
    pno = models.CharField(max_length = 15)
    priority = models.CharField(max_length = 2)
    auth = models.CharField(max_length = 2)

class Service(models.Model):
    service_id = models.AutoField(primary_key=True, max_length=200)
    service_name = models.CharField(max_length=200)
    service_cost = models.CharField(max_length=200)

class Patient(models.Model):
    patient_id = models.AutoField(primary_key=True, max_length=200)
    patient_fname = models.CharField(max_length=200)
    patient_mname = models.CharField(max_length=200)
    patient_lname = models.CharField(max_length=200)
    patient_title = models.CharField(max_length=20)
    patient_address = models.CharField(max_length=500)
    patient_town = models.CharField(max_length=200)
    patient_phone = models.CharField(max_length=15)
    patient_services = models.CharField(max_length=500)
    patient_status = models.CharField(max_length=2)
    patient_cost = models.CharField(max_length=100)
    patient_date = models.DateField(default=datetime.date.today)
    patient_time = models.TimeField(auto_now_add=True)
    patient_comment = models.CharField(max_length=200)

class Receipt(models.Model):
    receipt_id = models.AutoField(primary_key=True, max_length=200)
    receipt_patient = models.CharField(max_length=200)
    receipt_cost = models.CharField(max_length=200)
    receipt_time = models.TimeField(auto_now=True)
    receipt_status = models.CharField(default="-1", max_length=10)

class Vaccine(models.Model):
    vaccine_id = models.AutoField(primary_key=True, max_length=200)
    vaccine_name = models.CharField(max_length=200)
