


def lcalc(s):
    sum = 0
    if len(s) == 1:
        return s
    elif len(s) == 0:
        return ""
    sum = str(int(s[0]) + int(s[-1])) + str(lcalc(s[1:-1]))
    return sum

def score(s):
    while len(s) > 2:
        s = str(lcalc(s))
    return s

s = input("Enter string of no: ")
# print(score(s))
x = list(s)
res = []
[res.append(x) for x in x if x not in res]
print(res)
