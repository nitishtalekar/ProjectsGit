# Generated by Django 3.0.8 on 2020-09-08 13:33

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('chat', '0014_random'),
    ]

    operations = [
        migrations.AddField(
            model_name='game',
            name='random',
            field=models.CharField(default='', max_length=500),
        ),
    ]