from django.db import models

# Create your models here.
class Users(models.Model):
    user_id = models.AutoField(primary_key=True)
    user_name = models.CharField(max_length = 200)
    password = models.CharField(max_length = 200)
    fname = models.CharField(max_length = 200)
    lname = models.CharField(max_length = 200)
    pno = models.CharField(max_length = 15)
    priority = models.CharField(max_length = 2)
    auth = models.CharField(max_length = 2)
