import kivy
import kivymd

from kivymd.app import MDApp
from kivy.lang import Builder

from kivy.app import App
from kivy.uix.button import Label
from kivy.uix.gridlayout import GridLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.textinput import TextInput
from kivy.uix.widget import Widget
from kivy.properties import ObjectProperty
 

class Interface(Widget):  
    name = ObjectProperty(None)
    lname = ObjectProperty(None)
    email = ObjectProperty(None)
    inputs = ObjectProperty(None)
    
    def submit(self):
        print("Name: ", self.name.text)
        print("Last Name: ", self.lname.text)
        print("Email: ", self.email.text)
        self.inputs.text = "Your IP: " + self.name.text + " - " + self.lname.text + " - " + self.email.text
        self.name.text = ""
        self.lname.text = ""
        self.email.text = ""
        
    
class CalculatorApp(MDApp):    
    def build(self):
        return Interface()


if __name__ == "__main__":
    CalculatorApp().run()
        