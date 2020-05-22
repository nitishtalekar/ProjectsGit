from .models import Cards
import csv
x = 0
with open('pictdata_v2.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        print(row)
        x = x + 1

print(x)
