# Generated by Django 5.0.2 on 2024-02-25 03:54

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('portfolio', '0002_alter_place_doc'),
    ]

    operations = [
        migrations.AlterField(
            model_name='place',
            name='doc',
            field=models.FileField(blank=True, null=True, upload_to='uploads/%Y/%m/%d/', verbose_name='Файлы'),
        ),
    ]
