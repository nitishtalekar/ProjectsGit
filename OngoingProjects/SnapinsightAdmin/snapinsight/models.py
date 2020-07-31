from django.db import models

class Overview(models.Model):
    description = models.CharField(max_length=500)
    some_point = models.CharField(max_length=500)
    principle = models.CharField(max_length=500)
    quote = models.CharField(max_length=500)
    vision = models.CharField(max_length=500)
    mission = models.CharField(max_length=500)
    goals = models.CharField(max_length=500)
    keyword = models.CharField(max_length=500)

# Create your models here.
