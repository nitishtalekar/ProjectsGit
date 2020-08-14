from django.db import models

class Room(models.Model):
    id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=500)
    password = models.CharField(max_length=500)
# Create your models here.
