# Generated by Django 2.2.6 on 2020-05-06 19:48

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('DHOPD', '0007_receipt'),
    ]

    operations = [
        migrations.AlterField(
            model_name='receipt',
            name='receipt_time',
            field=models.DateTimeField(auto_now_add=True),
        ),
    ]