from __future__ import division, print_function
# coding=utf-8
import sys
import os
import glob

# Flask utils
from flask import Flask, redirect, url_for, request, render_template
from werkzeug.utils import secure_filename
from gevent.pywsgi import WSGIServer

import requests
from PIL import Image
import io

app = Flask(__name__)

print('Server Started. Check http://127.0.0.1:5000/')

def load_chapters(link_val):
    manga_link = link_val
    manga_site = requests.get(manga_link).text
    data = manga_site.split('\n')
    chp_data = []
    for i in data:
        if '<a  class="chapter-link"' in i:
            chps = {}
            href = i.split("href=")
            title = i.split("title=")
            chps["num"] = title[1].split(" ")[-1][:-2]
            chps["link"] = href[1].split(" ")[0][1:-1]
            chp_data.append(chps)
    print("Done")
    return chp_data


@app.route('/', methods=['GET'])
def index():   
    names = ['Bleach','Jujutsu Kaisen','Dr. Stone','Seven Deadly Sins','World Trigger','My Hero Academia','Fairy Tail','Demon Slayer','Solo Leveling','One Piece']
    covers = ['BleachCover','JJKCover','DrStoneCover','7DSCover','WTCover','MHACover','FTCover','DemonSCover','SLCover','OPCover']
    links = ['https://mangafast.net/read/bleach/','https://mangafast.net/read/jujutsu-kaisen-eng1/','https://mangafast.net/read/dr-stone-eng2/','https://mangafast.net/read/nanatsu-no-taizai-eng/','https://mangafast.net/read/world-trigger-eng/','https://mangafast.net/read/boku-no-hero-academia/','https://mangafast.net/read/fairy-tail/','https://mangafast.net/read/kimetsu-no-yaiba/','https://mangafast.net/read/solo-leveling-eng2/','https://mangafast.net/read/one-piece-english/']
    data = [{"name":names[i],"cover":"Covers/"+covers[i]+".png","link":links[i]} for i in range(len(names))]
    return render_template('index.html',mode="select",data=data)

@app.route('/mangaselect', methods=['GET', 'POST'])
def selected():
    if request.method == 'POST':
        link_val = request.form['manga-value']
        name = request.form['manga-name']
        cover = request.form['manga-cover']
        chp_data = load_chapters(link_val)
        return render_template('index.html',mode="chapter",chapters=chp_data,link=link_val,name=name,cover=cover,download="false")
    return redirect("/")
        
@app.route('/chapterselect', methods=['GET', 'POST'])
def chpselect():
    if request.method == 'POST':
        manga_link = request.form['manga-link-val']
        name = request.form['manga-name-val']
        cover_page = request.form['manga-cover-val']
        chapter_link = request.form['chapter-value']
        chp_nos = request.form['chapter-numbers'].split(",")[::-1]
        print(chp_nos)
        missing = 0
        chp_links = chapter_link.split(",")[::-1]
        image_links = []
        number = []
        for chp in chp_links:
            chapter_site = requests.get(chp).text
            chapter = chapter_site.split(' ')
            check_len = len(image_links)
            checklinks = []
            for i in chapter:
                if "jpg" in i and "src" in i and "page" in i:
                    image_links.append(i[5:-1])
            if check_len == len(image_links):
                for i in chapter:
                    if "jpg" in i and "src" in i:
                        checklinks.append(i)
                # print(checklinks)
                similar = checklinks[0].split("/")
                # print("sim")
                # print(similar)
                # print("sim")
                for cl in checklinks:
                    # print(cl.split("/")[:-1])
                    if similar[:-1] == cl.split("/")[:-1]:
                        image_links.append(cl[5:-1])
            print(str(len(image_links)) + " links found")
        page_list = []
        for page in range(len(image_links)):
            image_data = requests.get(image_links[page]).content
            try:
                image = Image.open(io.BytesIO(image_data))
            except:
                print(image_links[page])
                print("1 page missing")
                missing = missing + 1
                # return redirect("/")
            page_list.append(image)
            print(str(page+1) + " / " + str(len(image_links)))
        chp_str = "(" + chp_nos[0] + " - " + chp_nos[-1] + ")"
        pdf_name = "CC-" + name + "-" + chp_str + ".pdf"
        cover = Image.open("cover.jpg")
        pdf_filename = "static/pdf/CC-manga.pdf"
        cover.save(pdf_filename, "PDF" ,resolution=100.0, save_all=True, append_images=page_list)
        # os.remove(pdf_filename)
        print(missing , " pages missing")
        print("Done!")
        chp_data = load_chapters(manga_link)
        return render_template('index.html',mode="chapter",chapters=chp_data,pdf="pdf/CC-manga.pdf",pdf_name=pdf_name,link=manga_link,name=name,cover=cover_page,download="true")
    return redirect("/")

if __name__ == '__main__':
    # app.run(port=5002, debug=True)

    # Serve the app with gevent
    http_server = WSGIServer(('0.0.0.0',5000),app)
    http_server.serve_forever()
