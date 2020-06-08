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


def precedence(op):

    if op == '+' or op == '-':
        return 1
    if op == 'x' or op == '/' or op == '%':
        return 2
    return 0

# Function to perform arithmetic
# operations.
def applyOp(a, b, op):

    if op == '+': return a + b
    if op == '-': return a - b
    if op == 'x': return a * b
    if op == '/': return a / b
    if op == '%': return a % b

# Function that returns value of
# expression after evaluation.
def evaluate(tokens):

    # stack to store integer values.
    values = []

    # stack to store operators.
    ops = []
    i = 0

    while i < len(tokens):

        # Current token is a whitespace,
        # skip it.
        if tokens[i] == ' ':
            i += 1
            continue
        if tokens[i] == '#':
            t = tokens[i+1]
            i += 3
            val_str = ""
            while (i < len(tokens) and (tokens[i].isdigit() or tokens[i] == "." or tokens[i] == "-")):
                val_str = val_str + tokens[i]

                # val = (val * 10) + int(tokens[i])
                i += 1

            val = float(val_str)
            if t == "-":
                values.append(-val)
            elif t == "+":
                values.append(val)
            i += 1
            continue

        # Current token is an opening
        # brace, push it to 'ops'
        elif tokens[i] == '(':
            ops.append(tokens[i])

        # Current token is a number, push
        # it to stack for numbers.
        elif tokens[i].isdigit() or tokens[i] == ".":
            val = 0

            # There may be more than one
            # digits in the number.
            val_str = ""
            while (i < len(tokens) and (tokens[i].isdigit() or tokens[i] == ".")):
                val_str = val_str + tokens[i]

                # val = (val * 10) + int(tokens[i])
                i += 1

            val = float(val_str)
            values.append(val)

        # Closing brace encountered,
        # solve entire brace.
        elif tokens[i] == ')':

            while len(ops) != 0 and ops[-1] != '(':

                val2 = values.pop()
                val1 = values.pop()
                op = ops.pop()

                values.append(applyOp(val1, val2, op))

            # pop opening brace.
            ops.pop()

        # Current token is an operator.
        else:

            # While top of 'ops' has same or
            # greater precedence to current
            # token, which is an operator.
            # Apply operator on top of 'ops'
            # to top two elements in values stack.
            while (len(ops) != 0 and precedence(ops[-1]) >= precedence(tokens[i])):

                val2 = values.pop()
                val1 = values.pop()
                op = ops.pop()

                values.append(applyOp(val1, val2, op))

            # Push current token to 'ops'.
            if i+3 < len(tokens) and (tokens[i+3] == '-' or tokens[i+3] == '+'):
                ops.append(tokens[i])
                t = tokens[i+3]
                i += 5
                val_str = ""
                while (i < len(tokens) and (tokens[i].isdigit() or tokens[i] == "." or tokens[i] == "-")):
                    val_str = val_str + tokens[i]

                    # val = (val * 10) + int(tokens[i])
                    i += 1

                val = float(val_str)
                if t == "-":
                    values.append(-val)
                elif t == "+":
                    values.append(val)
                i += 1
                continue
            ops.append(tokens[i])

        i += 1

    # Entire expression has been parsed
    # at this point, apply remaining ops
    # to remaining values.
    while len(ops) != 0:

        val2 = values.pop()
        val1 = values.pop()
        op = ops.pop()

        values.append(applyOp(val1, val2, op))

    # Top of 'values' contains result,
    # return it.
    return values[-1]






class Interface(Widget):
    num = ObjectProperty(None)
    display = ObjectProperty(None)

    def submit(self, text):

        if text == "BACK":
            if self.display.text == "ERROR":
                self.display.text = "0"
            else:
                if self.display.text != "":
                    if self.display.text[-1] != " ":
                        self.display.text = self.display.text[:-1]
                    else:
                        self.display.text = self.display.text[:-3]
                else:
                    self.display.text = "0"
        else:

            if self.display.text == "0":
                self.display.text = ""

            if text == "=":
                if self.display.text == "":
                    self.display.text = "0"
                if self.display.text != "":
                    try:
                        t = self.display.text
                        if t.isdigit():
                            self.display.text = t
                        else:
                            if t[1] == "-" or t[1] == "+":
                                t = "".join(["#"] + list(t)[1:])
                            ans = evaluate(t)
                            if ans.is_integer():
                                ans = int(ans)
                            if float(ans) < 0:
                                ans = " - " + str((-1)*ans)
                            self.display.text = str(ans)
                    except:
                        self.display.text = "ERROR"
                text = ""


            if self.display.text != "ERROR":
                self.display.text = self.display.text + text

            if text == "CLEAR":
                self.display.text = "0"






class CalculatorApp(MDApp):
    def build(self):
        return Interface()


if __name__ == "__main__":
    CalculatorApp().run()

