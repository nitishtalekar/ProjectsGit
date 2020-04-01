from translate import Translator

eng = []
with open('deu.txt','r', encoding="utf8") as f:
    for line in f:
        x = line.split('\t')[0]
        x = x[:-1]
        eng.append(x)

eng = list(dict.fromkeys(eng))
    
jap = []

cnt = 7000

with open('datasetnew.txt', 'a+', encoding="utf8") as f:
    for i in range(cnt,cnt+1000):
        translator= Translator(to_lang="ja")
        translation = translator.translate(eng[i])
        line = eng[i]+"\t"+translation
        # print(i , line)
        jap.append(line)
        f.write("%s\n" % line)
        if(i%50 == 0):
            print(i)
        
print(i)              
print("Translation Finished")