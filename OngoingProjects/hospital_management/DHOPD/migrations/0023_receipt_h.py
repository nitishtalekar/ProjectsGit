# Generated by Django 2.2.6 on 2020-06-04 11:08

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('DHOPD', '0022_patient_h'),
    ]

    operations = [
        migrations.CreateModel(
            name='Receipt_h',
            fields=[
                ('receipt_id', models.AutoField(max_length=200, primary_key=True, serialize=False)),
                ('receipt_patient', models.CharField(max_length=200)),
                ('receipt_cost', models.CharField(max_length=200)),
                ('receipt_name', models.CharField(max_length=200)),
                ('receipt_time', models.TimeField(auto_now=True)),
                ('receipt_status', models.CharField(default='0', max_length=10)),
            ],
        ),
    ]
