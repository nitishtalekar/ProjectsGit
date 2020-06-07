

def lc(s):
    sum = 0
    print(s)
    if len(s) == 1:
        return s
    elif len(s) == 0:
        return ""
    print(s[0],s[-1])
    sum = str(int(s[0]) + int(s[-1])) + str(lc(s[1:-1]))
    print(sum)
    return sum


s = input("Enter string of no: ")
while len(s) > 2:
    s = str(lc(s))
    print(s)
print(s)
