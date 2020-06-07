import kivy
import kivymd

from kivymd.app import MDApp
from kivymd.theming import ThemeManager
from kivy.lang import Builder

from kivy.app import App
from kivy.uix.button import Label
from kivy.uix.gridlayout import GridLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.textinput import TextInput
from kivy.uix.widget import Widget
from kivy.properties import ObjectProperty
from kivy.uix.screenmanager import ScreenManager, Screen


# class Interface(Widget):
#     name = ObjectProperty(None)
#     lname = ObjectProperty(None)
#     email = ObjectProperty(None)
#     inputs = ObjectProperty(None)
#
#     def submit(self):
#         print("Name: ", self.name.text)
#         print("Last Name: ", self.lname.text)
#         print("Email: ", self.email.text)
#         self.inputs.text = "Your IP: " + self.name.text + " - " + self.lname.text + " - " + self.email.text
#         self.name.text = ""
#         self.lname.text = ""
#         self.email.text = ""

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

def lstring(s):
    y = list(s)
    res = []
    num = ""
    [res.append(x) for x in y if x not in res]
    for i in res:
        num = num + str(y.count(i))

    return score(num)

name = ""
class HomeScreen(Screen):
    name1 = ObjectProperty(None)
    name2 = ObjectProperty(None)
    choice = ObjectProperty(None)
    def submit(self,c):
        global name
        if c == True:
            name = self.name1.text + "loves" + self.name2.text
            name = lstring("".join(name.split(" ")).lower())
        else:
            name = self.name1.text + "friends" + self.name2.text
            name = lstring("".join(name.split(" ")).lower())

        print(name)
        # h = AnsScreen()
        # sub = h.ans
        # sub(name)
        self.manager.get_screen('ans').disp.text = name + "%"

class AnsScreen(Screen):
    disp = ObjectProperty(None)


class CalcScreen(Screen):
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
