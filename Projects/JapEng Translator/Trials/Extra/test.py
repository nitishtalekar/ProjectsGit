import spacy

x = '日本語ですよ'
print(x)
ja = spacy.blank('ja')
print(ja(x))