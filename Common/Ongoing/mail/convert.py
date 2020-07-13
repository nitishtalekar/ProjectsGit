import csv

f = open("entries.txt", "r")
lines = f.readlines()
l1 = [i.split(")")[1][1:-1] for i in lines]
l2 = [[i.split(" - ")[0],i.split(" - ")[1]] for i in l1]

with open("lists.csv", "w", newline="") as f:
    writer = csv.writer(f)
    writer.writerows(l2)
