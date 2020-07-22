import kivy
import kivymd

from kivymd.app import MDApp
from kivymd.theming import ThemeManager
from kivy.lang import Builder

from kivy.app import App
from kivy.properties import ObjectProperty
from kivy.uix.screenmanager import ScreenManager, Screen

def lcalc(s):
    sum = 0
    if len(s) == 1:
        return s
    elif len(s) == 0:
        return ""
    sum = str(int(s[0]) + int(s[-1])) + str(lcalc(s[1:-1]))
    return sum

def score(s,calcs):
    while len(s) > 2:
        s = str(lcalc(s))
        calcs = calcs + s + "\n"
    # calcs = calcs + s + "\n"
    return s , calcs

def lstring(s,calcs):
    y = list(s)
    res = []
    num = ""
    [res.append(x) for x in y if x not in res]
    for i in res:
        num = num + str(y.count(i))
    calcs = calcs + num + "\n"
    return score(num,calcs)

name = ""
class HomeScreen(Screen):
    name1 = ObjectProperty(None)
    name2 = ObjectProperty(None)
    label1 = ObjectProperty(None)
    label2 = ObjectProperty(None)
    choice = ObjectProperty(None)
    def submit(self,c1,c2):
        n1 = self.name1.text
        n2 = self.name2.text
        ch = ""
        calcs = ""
        global name
        if c1 == True:
            ch = "Loves"
            name = self.name1.text + "loves" + self.name2.text
            calcs = n1 + "  " + ch + "  " + n2 + "\n"
            calcs = calcs + name + "\n"
            name , calcs = lstring("".join(name.split(" ")).lower(),calcs)
        elif c2 == True:
            ch = "Friends"
            name = self.name1.text + "friends" + self.name2.text
            calcs = n1 + " " + ch + " " + n2 + "\n"
            calcs = calcs + name + "\n"
            name , calcs = lstring("".join(name.split(" ")).lower(),calcs)
        else:
            name = "ERROR"
            
        if self.name1.text == "":
            print("NONE1")
            name = "NONE1"
        elif self.name2.text == "":
            print("NONE2")
            name = "NONE2"
            
        if name=="ERROR":
            self.label1.text = "Love\n(Choose)"
            self.label2.text = "Friendship\n(Choose)"
        elif name == "NONE1":
            self.name1.hint_text = "Please Enter Name"
        elif name == "NONE2":
            self.name2.hint_text = "Please Enter Name"
        else:
            self.label1.text = "Love"
            self.label2.text = "Friendship"
            self.name1.hint_text = "Name of First Person"
            self.name2.hint_text = "Name of Second Person"
            self.manager.get_screen('ans').disp.text = name + "%"
            self.manager.get_screen('ans').names.text = n1 + "\n" + ch + "\n" + n2
            self.manager.get_screen('calc').display.text = calcs
            self.manager.current = 'ans'
            # print(name)
        
        

class AnsScreen(Screen):
    disp = ObjectProperty(None)
    names = ObjectProperty(None)


class CalcScreen(Screen):
    display = ObjectProperty(None)
    pass

class Manager(ScreenManager):
    pass

# kv = Builder.load_file("lovecalc.kv")

class LoveCalcApp(MDApp):
    # theme_cls = ThemeManager()
    def build(self):
        return


if __name__ == "__main__":
    LoveCalcApp().run()
