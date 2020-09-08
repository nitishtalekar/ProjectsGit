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
    roll = models.CharField(max_length=500, default="0")
    color = models.CharField(max_length=500, default="")
    card = models.CharField(max_length=500, default="")
    cost = models.CharField(max_length=500, default="")
    amount = models.CharField(max_length=500, default="1000")
    worth = models.CharField(max_length=500, default="1000")
    build = models.CharField(max_length=500, default="")
    start = models.CharField(max_length=500, default="200")
    jail = models.CharField(max_length=500, default="0")
    random = models.CharField(max_length=500, default="")

class Board(models.Model):
    id = models.CharField(primary_key=True, max_length=500)
    name = models.CharField(max_length=500)
    color = models.CharField(max_length=500)
    buy = models.CharField(max_length=500)
    rent = models.CharField(max_length=500)
    sell = models.CharField(max_length=500)
    tag = models.CharField(max_length=500)
    build1 = models.CharField(max_length=500, default="")
    build2 = models.CharField(max_length=500, default="")
    build3 = models.CharField(max_length=500, default="")

class Random(models.Model):
    id = models.CharField(primary_key=True, max_length=500)
    reason = models.CharField(max_length=500)
    quants = models.CharField(max_length=500)
    tag = models.CharField(max_length=500)

# Create your models here.
