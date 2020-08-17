from django.db import models

class Room(models.Model):
    id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=500)
    password = models.CharField(max_length=500)
    count = models.CharField(max_length=500, default="0")
    game = models.CharField(max_length=500, default="0")
    tag = models.CharField(max_length=500, default="0")

class User(models.Model):
    id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=500)
    channel_name = models.CharField(max_length=500)
    tag = models.CharField(max_length=500)

class Game(models.Model):
    id = models.AutoField(primary_key=True)
    player = models.CharField(max_length=500)
    player_count = models.CharField(max_length=500)
    turn = models.CharField(max_length=500)
    tag = models.CharField(max_length=500, default="0")
    type = models.CharField(max_length=500, default="2")

class Board(models.Model):
    id = models.CharField(primary_key=True, max_length=500)
    name = models.CharField(max_length=500)
    color = models.CharField(max_length=500)
    buy = models.CharField(max_length=500)
    rent = models.CharField(max_length=500)
    sell = models.CharField(max_length=500)
    tag = models.CharField(max_length=500)
# Create your models here.
