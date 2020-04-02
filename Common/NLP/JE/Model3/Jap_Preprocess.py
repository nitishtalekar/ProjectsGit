import string
import re
from pickle import dump
from unicodedata import normalize
from numpy import array
import tinysegmenter
from kuromojipy.kuromoji_server import KuromojiServer
    

# load doc into memory
def load_doc(filename):
# open the file as read only
    file = open(filename, mode='rt', encoding='utf-8')
    # read all text
    text = file.read()
    # close the file
    file.close()
    return text

# split a loaded document into sentences
def to_pairs(doc):
    lines = doc.strip().split('\n')
    pairs = [line.split('\t') for line in  lines]
    return pairs
    
def jap_clean(text,kuro_server):
    a = []
    kuromoji = kuro_server.kuromoji
    tokenizer = kuromoji.Tokenizer.builder().build()
    tokens = tokenizer.tokenize(text)
    for token in tokens:
        x = token.getSurfaceForm()+"--"+token.getAllFeatures()[0]
        a.append(x)
    # print(a)
    return " ".join(a);
    

# clean a list of lines
def clean_pairs(lines):
    ii = 0
    cleaned = list()
    # prepare regex for char filtering
    re_print = re.compile('[^%s]' % re.escape(string.printable))
    # prepare translation table for removing punctuation
    table = str.maketrans('', '', string.punctuation)
    for pair in lines:
        print(ii)
        clean_pair = list()
        for i in range(2):
            if i == 0:
                line = pair[0]
                # normalize unicode characters
                line = normalize('NFD', line).encode('ascii', 'ignore')
                line = line.decode('UTF-8')
                # tokenize on white space
                line = line.split()           
                # convert to lowercase
                line = [word.lower() for word in line]
                # remove punctuation from each token
                line = [word.translate(table) for word in line]
                # remove non-printable chars form each token
                line = [re_print.sub('', w) for w in line]
                # remove tokens with numbers in them
                line = [word for word in line if word.isalpha()]
                # store as string
                clean_pair.append(' '.join(line))
            else:
                line = pair[1]
                l = list(line)[:-1]
                line1 = "".join(l)
                with KuromojiServer() as kuro_server:
                    m = jap_clean(line1,kuro_server)            
                    clean_pair.append(m)
        cleaned.append(clean_pair)
        ii = ii+1
        
    return array(cleaned)
 
# save a list of clean sentences to file
# def save_clean_data(sentences, filename):
# 	dump(sentences, open(filename, 'wb'))
# 	print('Saved: %s' % filename)
    
def save_txt(sentences):
    with open('jpn_tok.txt', 'a+', encoding="utf8") as f:
        for item in sentences:
            f.write("%s\n" % item)
 
# load dataset
filename = 'jpn.txt'
doc = load_doc(filename)
# split into english-german pairs
pairs = to_pairs(doc)
# print('HELLOO')
# print(pairs[0])
pairs = pairs[:2000]
# print(pairs)
# print(pairs)
# clean sentences
clean_pairs = clean_pairs(pairs)
print(type(clean_pairs))
# print("BYEEE")
# print(clean_pairs)
# save clean pairs to file
# save_clean_data(clean_pairs, 'english-japanese_kuro.pkl')
save_txt(clean_pairs)
# spot check
for i in range(10):
	print('[%s] => [%s]' % (clean_pairs[i,0], clean_pairs[i,1]))
    # print(clean_pairs[i])

