# Generated by Django 2.2.6 on 2020-05-23 10:59

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('pictionary', '0006_cards'),
    ]

    operations = [
        migrations.DeleteModel(
            name='Cards',
        ),
    ]