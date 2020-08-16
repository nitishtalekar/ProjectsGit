from django.db import models

class Board(models.Model):
    id = models.CharField(primary_key=True, max_length=500)
    name = models.CharField(max_length=500)
    color = models.CharField(max_length=500)
    buy = models.CharField(max_length=500)
    # rent = CharField(max_length=500)
    # rent1 = CharField(max_length=500)
    # rent2 = CharField(max_length=500)
    # rent3 = CharField(max_length=500)
    # sell = CharField(max_length=500)
# Create your models here.
