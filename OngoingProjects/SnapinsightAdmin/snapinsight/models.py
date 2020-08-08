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

class Services(models.Model):
    name = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    some_point = models.CharField(max_length=500)
    cost = models.CharField(max_length=500)
    plan = models.CharField(max_length=500)
    feature = models.CharField(max_length=500)
    keyword = models.CharField(max_length=500)

class Service_Overview(models.Model):
    name = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    version = models.CharField(max_length=500)
    features = models.CharField(max_length=500)
    start_date = models.CharField(max_length=500)
    end_date = models.CharField(max_length=500)

class Service_FAQ(models.Model):
    id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=500)
    question = models.CharField(max_length=500)
    answer = models.CharField(max_length=500)

class Service_Document(models.Model):
    id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=500)
    doc_name = models.CharField(max_length=500)
    doc_link = models.CharField(max_length=500)
    tag = models.CharField(max_length=500, default="")

class Service_Roadmap(models.Model):
    name = models.CharField(max_length=500)
    step = models.CharField(max_length=500)
    date = models.CharField(max_length=500, default="")
    tag = models.CharField(max_length=500, default="0")

class Marketing_PTD(models.Model):
    name = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    link = models.CharField(max_length=500)

class Marketing_Social(models.Model):
    name = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    content = models.CharField(max_length=500)

class Team(models.Model):
    name = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    department = models.CharField(max_length=500)
    positon = models.CharField(max_length=500)
    email = models.CharField(max_length=500)
    talent = models.CharField(max_length=500)

class Email_Detail(models.Model):
    about = models.CharField(max_length=500)
    when = models.CharField(max_length=500)

class Email(models.Model):
    name = models.CharField(max_length=500)
    dob = models.CharField(max_length=500)
    mobile = models.CharField(max_length=500)
    email = models.CharField(max_length=500)
    category = models.CharField(max_length=500)

class SEO_Keyword(models.Model):
    name = models.CharField(max_length=500)
    keyword = models.CharField(max_length=500)

class Job_Description(models.Model):
    position = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    responsible = models.CharField(max_length=500)
    skills = models.CharField(max_length=500)
    benefits = models.CharField(max_length=500)

class Job_Portal(models.Model):
    card = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    link = models.CharField(max_length=500)

class Contentwriter_PTD(models.Model):
    name = models.CharField(max_length=500)
    description = models.CharField(max_length=500)
    link = models.CharField(max_length=500)

class Resources(models.Model):
    id = models.AutoField(primary_key=True)
    description = models.CharField(max_length=500)
    link = models.CharField(max_length=500, default="")
    file = models.CharField(max_length=500, default="")
    name = models.CharField(max_length=500, default="")
    file_name = models.CharField(max_length=500, default="")

# Create your models here.
