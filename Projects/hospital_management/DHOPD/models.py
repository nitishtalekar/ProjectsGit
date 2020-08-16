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

class Patient_c(models.Model):
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

class Receipt_c(models.Model):
    receipt_id = models.AutoField(primary_key=True, max_length=200)
    receipt_patient = models.CharField(max_length=200)
    receipt_cost = models.CharField(max_length=200)
    receipt_time = models.TimeField(auto_now=True)
    receipt_status = models.CharField(default="-1", max_length=10)

class Vaccine(models.Model):
    vaccine_id = models.AutoField(primary_key=True, max_length=200)
    vaccine_name = models.CharField(max_length=200)

class Service_h(models.Model):
    service_id = models.AutoField(primary_key=True, max_length=200)
    service_name = models.CharField(max_length=200)
    service_cost = models.CharField(max_length=200)
    service_tag = models.CharField(max_length=200)

class Room(models.Model):
    room_id = models.AutoField(primary_key=True, max_length=200)
    room_name = models.CharField(max_length=200)
    room_cost = models.CharField(max_length=200)
    room_bed = models.CharField(max_length=10)
    room_bed_occ = models.CharField(max_length=10, default="0")

class Patient_h(models.Model):
    patient_id = models.AutoField(primary_key=True, max_length=200)
    patient_fname = models.CharField(max_length=200)
    patient_mname = models.CharField(max_length=200)
    patient_lname = models.CharField(max_length=200)
    patient_gender = models.CharField(max_length=20)
    patient_age = models.CharField(max_length=20)
    patient_title = models.CharField(max_length=20)
    patient_address = models.CharField(max_length=500)
    patient_town = models.CharField(max_length=200)
    patient_phone = models.CharField(max_length=15)
    patient_imp = models.CharField(max_length=15)
    patient_services = models.CharField(max_length=500)
    patient_status = models.CharField(max_length=2)
    patient_room = models.CharField(max_length=15)
    patient_cost = models.CharField(max_length=100)
    patient_date = models.DateField(default=datetime.date.today)
    patient_rdate = models.DateField(default=datetime.date.today)
    patient_time = models.TimeField(auto_now_add=True)
    patient_comment = models.CharField(max_length=200)
    patient_discount = models.CharField(max_length=100, default="0")

class Receipt_h(models.Model):
    receipt_id = models.AutoField(primary_key=True, max_length=200)
    receipt_patient = models.CharField(max_length=200)
    receipt_cost = models.CharField(max_length=200)
    receipt_name = models.CharField(max_length=200)
    receipt_time = models.DateTimeField(auto_now=True)
    receipt_status = models.CharField(default="0", max_length=10)
    receipt_type = models.CharField(max_length=200, default="")
    receipt_no = models.CharField(max_length=200, default="")

class Refund_h(models.Model):
    refund_id = models.AutoField(primary_key=True, max_length=200)
    refund_patient = models.CharField(max_length=200)
    refund_cost = models.CharField(max_length=200)
    refund_name = models.CharField(max_length=200)
    refund_time = models.DateTimeField(auto_now=True)
    refund_status = models.CharField(default="0", max_length=10)

class Bill_h(models.Model):
    bill_id = models.AutoField(primary_key=True, max_length=200)
    bill_patient = models.CharField(max_length=200)
    bill_cost = models.CharField(max_length=200)
    bill_receipt = models.CharField(max_length=200)
