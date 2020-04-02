
# from janome.tokenizer import Tokenizer

# from janome import Tokenizer
# 
# t = Tokenizer()
# 
# for token in t.tokenize(u'すもももももももものうち'):
#     print(str(token).decode('utf8'))


# 'お寿司が食べたい。'
# 
# お      接頭詞,名詞接続,*,*,*,*,お,オ,オ
# 寿司    名詞,一般,*,*,*,*,寿司,スシ,スシ
# が      助詞,格助詞,一般,*,*,*,が,ガ,ガ
# 食べ    動詞,自立,*,*,一段,連用形,食べる,タベ,タベ
# たい    助動詞,*,*,*,特殊・タイ,基本形,たい,タイ,タイ
# 。      記号,句点,*,*,*,*,。,。,。


from kuromojipy.kuromoji_server import KuromojiServer

# with KuromojiServer() as kuro_server:
#     kuromoji = kuro_server.kuromoji
#     tokenizer = kuromoji.Tokenizer.builder().build()
#     tokens = tokenizer.tokenize(u'お寿司が食べたい。')
#     for token in tokens:
#         print(token.getSurfaceForm() + '\t' + token.getAllFeatures())

def jap_clean(text):
    a = []
    with KuromojiServer() as kuro_server:
        kuromoji = kuro_server.kuromoji
        tokenizer = kuromoji.Tokenizer.builder().build()
        tokens = tokenizer.tokenize(text)
        for token in tokens:
            x = token.getSurfaceForm()+token.getAllFeatures()[0]
            a.append(x)
    return " ".join(a);
            
print(jap_clean('彼は新しい仕事できっと成功するだろう。'))

print(jap_clean('彼は新しい仕事できっと成功するだろう。'))