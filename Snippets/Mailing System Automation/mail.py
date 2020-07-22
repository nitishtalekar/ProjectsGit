from selenium import webdriver
from time import sleep
from datetime import datetime


driver = None
driver = webdriver.Chrome('C:/Users/Admin/Downloads/chromedriver')


# chrome_options = webdriver.ChromeOptions()
# chrome_options.add_argument("--incognito")
# chrome_options.add_argument('--disable-web-security')
# chrome_options.add_argument('--user-data-dir')
# chrome_options.add_argument('--allow-running-insecure-content')
# args: ['--disable-web-security', '--user-data-dir', '--allow-running-insecure-content' ]

# driver = webdriver.Chrome('C:/Users/Admin/Downloads/chromedriver', chrome_options=chrome_options)
driver.get('https://google.com')


SENDER = 'RGIT FEEDBACK'
GMAIL_USER = "wanodesarvesh@gmail.com"
GMAIL_PASSWORD = "password@1234"

f = open("entries.txt", "r")
lines = f.readlines()
l1 = [i.split(")")[1][1:-1] for i in lines]
mail_list = [[i.split(" - ")[0],i.split(" - ")[1]] for i in l1]


def access_gmail():
    try:
        driver.get('http://gmail.com')
        # driver.get('https://mail.google.com/mail/u/0/?tab=rm&ogbl&pli=1#inbox')
        sleep(5)
        input("hi")
        now = datetime.now().time()
        compose1 = driver.find_elements_by_css_selector('.T-I.T-I-KE.L3')
        compose = compose1[0]
        sleep(5)


        for i in mail_list:

            compose.click()
            sleep(3)

            to = driver.find_element_by_name('to')
            # print("to", to)
            if to:
                to.send_keys(i[0])
                # print("TO DONE")
            sleep(3)

            subject = driver.find_element_by_name('subjectbox')
            # print("subject", subject)
            if subject:
                subject.send_keys("RGIT FEEDBACK 2020")

            sleep(3)

            body = "Dear Student,\nKindly access the following link to fill the feedback for your course.\n\nLink: \n"
            body = body + i[1] + "\n"
            body = body + "\n\nWe request you to be sincere in the feedback.\n\nPlease click on the END button after filling in the entire form without fail.\n\nThank You.\n\nRegards, \nFeedback Team,\nRGIT CodeCell."

            content1 = driver.find_elements_by_css_selector('.Am.Al.editable.LW-avf.tS-tW')
            # print("content", content1)
            content = content1[0]
            if content:
                content.send_keys(body)

            sleep(3)

            sch1 = driver.find_elements_by_css_selector('.T-I.J-J5-Ji.hG.T-I-atl.L3')
            # print(send_btn1)
            sch = sch1[0]
            sch.click()

            sleep(1)

            ssch = driver.find_element_by_id('sbddm')
            # print(send_btn1)
            # ssch = ssch1[0]
            ssch.click()
            sleep(1)

            time1 = driver.find_elements_by_css_selector('.Az.AM')
            # print(send_btn1)
            timed = time1[0]
            timed.click()
            sleep(1)

            sett1 = driver.find_elements_by_css_selector('.hu.ks')
            # print(send_btn1)
            sett = sett1[0]
            if sett:
                sett.send_keys("5:25 PM")
            sleep(1)

            ss = driver.find_element_by_name('datetimepicker_dialog_confirm')
            ss.click()

            sleep(2)
            sett1 = driver.find_elements_by_css_selector('.hu.ks')
            # print(send_btn1)
            sett = sett1[0]
            if sett:
                sett.send_keys("6:25 PM")
            sleep(1)

            ss = driver.find_element_by_name('datetimepicker_dialog_confirm')
            ss.click()



            # send_btn1 = driver.find_elements_by_css_selector('.T-I.J-J5-Ji.aoO.v7.T-I-atl.L3')
            # # print(send_btn1)
            # send_btn = send_btn1[0]
            # send_btn.click()

            sleep(5)

            print(i[0])
            print()

        then = datetime.now().time()
        print("Total Time: ", then-now)

    except Exception as ex:
        print(str(ex))
    finally:
        return True


def login_google():
    is_logged_in = False
    google_login = 'https://accounts.google.com/Login#identifier'

    try:
        driver.get(google_login)
        sleep(5)
        html = driver.page_source.strip()

        # email box
        user_name = driver.find_element_by_id('identifierId')
        if user_name:
            user_name.send_keys(GMAIL_USER)

        next = driver.find_element_by_id('identifierNext')
        if next:
            next.click()

        # give em rest
        # sleep(20)


        # now enter passwd
        user_pass = driver.find_element_by_name('password')
        if user_pass:
            user_pass.send_keys(GMAIL_PASSWORD)

        # rest again
        sleep(3)

        sign_in = driver.find_element_by_id('passwordNext')
        if sign_in:
            sign_in.click()

        # rest again
        sleep(3)
        is_logged_in = True

    except Exception as ex:
        print(str(ex))
        is_logged_in = False
    finally:
        return is_logged_in

def login_stack():
    is_logged_in = False
    google_login = 'https://stackoverflow.com/users/login'

    try:
        driver.get(google_login)
        sleep(5)
        html = driver.page_source.strip()

        # gmail login
        gmail1 = driver.find_elements_by_css_selector('.grid--cell.s-btn.s-btn__icon.s-btn__google.bar-md.ba.bc-black-3')
        print(gmail1)
        gmail = gmail1[0]
        if gmail:
            gmail.click()

        user_name = driver.find_element_by_id('identifierId')
        if user_name:
            user_name.send_keys(GMAIL_USER)

        next = driver.find_element_by_id('identifierNext')
        if next:
            next.click()

        # give em rest
        # sleep(10)
        input("asdfghjkl")

        # now enter passwd
        user_pass = driver.find_element_by_name('password')
        if user_pass:
            user_pass.send_keys(GMAIL_PASSWORD)

        # rest again
        sleep(3)

        sign_in = driver.find_element_by_id('passwordNext')
        if sign_in:
            sign_in.click()

        # rest again
        sleep(3)
        is_logged_in = True

    except Exception as ex:
        print(str(ex))
        is_logged_in = False
    finally:
        return is_logged_in


if __name__ == '__main__':
    r_log = login_stack()
    if r_log:
        print('Yay')
        access_gmail()
    else:
        print('Boo!!!')
    # access_gmail()
    # if driver is not None:
    #     driver.quit()

    print('Done')
