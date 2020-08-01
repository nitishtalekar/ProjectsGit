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
    name = models.CharField(max_length=500, default="")

class Solution_desc(models.Model):
    description = models.CharField(max_length=500)
    principle = models.CharField(max_length=500)

class Solutions(models.Model):
    description = models.CharField(max_length=500)
    some_point = models.CharField(max_length=500)
    what = models.CharField(max_length=500)
    why = models.CharField(max_length=500)
    how = models.CharField(max_length=500)
    keyword = models.CharField(max_length=500)
    name = models.CharField(max_length=500, default="")

class Game_desc(models.Model):
    description = models.CharField(max_length=500)
    principle = models.CharField(max_length=500)

class Games(models.Model):
    description = models.CharField(max_length=500)
    some_point = models.CharField(max_length=500)
    what = models.CharField(max_length=500)
    why = models.CharField(max_length=500)
    how = models.CharField(max_length=500)
    keyword = models.CharField(max_length=500)
    name = models.CharField(max_length=500, default="")

class Legal(models.Model):
    guideline = models.CharField(max_length=500)
    privacy = models.CharField(max_length=500)
    term = models.CharField(max_length=500)

# Create your models here.
