# Generated by Django 2.2.6 on 2020-06-08 17:18

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('DHOPD', '0025_patient_h_patient_rdate'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='patient_h',
            name='patient_rdate',
        ),
    ]