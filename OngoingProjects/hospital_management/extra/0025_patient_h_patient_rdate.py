# Generated by Django 2.2.6 on 2020-06-08 17:18

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('DHOPD', '0024_auto_20200606_1719'),
    ]

    operations = [
        migrations.AddField(
            model_name='patient_h',
            name='patient_rdate',
            field=models.DateField(default=''),
            preserve_default=False,
        ),
    ]