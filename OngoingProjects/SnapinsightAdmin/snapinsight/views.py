from django.shortcuts import render
from .forms import *
from .models import *


def index(request):
    return render(request, 'snapinsight/index.html')

def overview(request):
    if request.method == "POST":
        sp = request.POST.getlist('some_point')
        d = request.POST.get('description')
        p = request.POST.getlist('principle')
        q = request.POST.get('quote')
        v = request.POST.get('vision')
        m = request.POST.get('mission')
        g = request.POST.get('goals')
        m = request.POST.getlist('marketing')
        sp = list(filter(lambda a: a != "", sp))
        p = list(filter(lambda a: a != "", p))
        m = list(filter(lambda a: a != "",m))
        print(sp, p, m)
        Overview.objects.filter(name = "company").update(some_point="^".join(sp), description=d, principle="^".join(p), quote=q, vision=v, mission=m, goals=g, keyword="^".join(m))

    overview = [Overview.objects.get(name = "company")]
    overview_data = []
    for i in overview:
        overview_data.append(i.description)                     #0
        overview_data.append(i.some_point.split("^"))           #1
        overview_data.append(i.principle.split("^"))            #2
        overview_data.append(i.quote)                           #3
        overview_data.append(i.vision)                          #4
        overview_data.append(i.mission)                         #5
        overview_data.append(i.goals)                           #6
        overview_data.append(i.keyword.split("^"))              #7

    return render(request, 'snapinsight/overview.html', {'overview':overview_data})

def solutions(request):
    if request.method == "POST":
        description = request.POST.get('description')
        principle = request.POST.getlist('principle')
        principle = list(filter(lambda a: a != "", principle))
        Solution_desc.objects.all().delete()
        Solution_desc.objects.create(description=description, principle="^".join(principle))
        sol = Solutions.objects.all().count()
        Solutions.objects.all().delete()
        # sol_name = request.POST.get('sol_name')
        # sol_description = request.POST.get('sol_description')
        # sol_some_point = request.POST.getlist('sol_some_point')
        # sol_what = request.POST.get('sol_what')
        # sol_why = request.POST.get('sol_why')
        # sol_how = request.POST.get('sol_how')
        # sol_keyword = request.POST.get('sol_keyword')
        for i in range(sol+1):
            sol_name = "sol_name" + str(i)
            sol_description = "sol_description" + str(i)
            sol_some_point = "sol_some_point" + str(i)
            sol_what = "sol_what" + str(i)
            sol_why = "sol_why" + str(i)
            sol_how = "sol_how" + str(i)
            sol_keyword = "sol_keyword" + str(i)
            if request.POST.get(sol_name) == "":
                continue
            s_name = request.POST.get(sol_name)
            s_description = request.POST.get(sol_description)
            s_some_point = request.POST.getlist(sol_some_point)
            s_some_point = list(filter(lambda a: a != "", s_some_point))
            s_what = request.POST.get(sol_what)
            s_why = request.POST.get(sol_why)
            s_how = request.POST.get(sol_how)
            s_keyword = request.POST.getlist(sol_keyword)
            s_keyword = list(filter(lambda a: a != "", s_keyword))
            # print(request.POST.get(sol_name), request.POST.get(sol_description), request.POST.getlist(sol_some_point), request.POST.get(sol_what), request.POST.get(sol_why), request.POST.get(sol_how), request.POST.getlist(sol_keyword))
            # print(s_some_point, s_keyword)
            Solutions.objects.create(name=s_name, description=s_description, some_point="^".join(s_some_point), what=s_what, why=s_why, how=s_how, keyword="^".join(s_keyword))
        # print(description, principle, sol_name, sol_description, sol_some_point, sol_what, sol_why, sol_how, sol_keyword)


    sol_desc = Solution_desc.objects.all()
    sol = Solutions.objects.all()
    desc = []
    for i in sol_desc:
        desc.append(i.description)
        desc.append(i.principle.split("^"))

    solution = []
    for i in sol:
        temp = []
        temp.append(i.description)                      #0
        temp.append(i.some_point.split("^"))            #1
        temp.append(i.what)                             #2
        temp.append(i.why)                              #3
        temp.append(i.how)                              #4
        temp.append(i.keyword.split("^"))               #5
        temp.append(i.name)                             #6
        solution.append(temp)

    return render(request, 'snapinsight/solutions.html', {'desc':desc, 'solution':solution})

def games(request):
    if request.method == "POST":
        description = request.POST.get('description')
        principle = request.POST.getlist('principle')
        principle = list(filter(lambda a: a != "", principle))
        Game_desc.objects.all().delete()
        Game_desc.objects.create(description=description, principle="^".join(principle))
        sol = Games.objects.all().count()
        Games.objects.all().delete()
        print(sol)
        for i in range(sol+1):
            print(i)
            game_name = "game_name" + str(i)
            game_description = "game_description" + str(i)
            game_some_point = "game_some_point" + str(i)
            game_what = "game_what" + str(i)
            game_why = "game_why" + str(i)
            game_how = "game_how" + str(i)
            game_keyword = "game_keyword" + str(i)
            # print(game_name, request.POST.get(game_name), request.POST.get(game_description))
            if request.POST.get(game_name) == "":
                continue
            g_name = request.POST.get(game_name)
            g_description = request.POST.get(game_description)
            g_some_point = request.POST.getlist(game_some_point)
            g_some_point = list(filter(lambda a: a != "", g_some_point))
            g_what = request.POST.get(game_what)
            g_why = request.POST.get(game_why)
            g_how = request.POST.get(game_how)
            g_keyword = request.POST.getlist(game_keyword)
            g_keyword = list(filter(lambda a: a != "", g_keyword))
            print("before")
            Games.objects.create(name=g_name, description=g_description, some_point="^".join(g_some_point), what=g_what, why=g_why, how=g_how, keyword="^".join(g_keyword))
            print("hua")

    game_desc = Game_desc.objects.all()
    game_all = Games.objects.all()
    desc = []
    for i in game_desc:
        desc.append(i.description)
        desc.append(i.principle.split("^"))

    game = []
    for i in game_all:
        temp = []
        temp.append(i.description)                      #0
        temp.append(i.some_point.split("^"))            #1
        temp.append(i.what)                             #2
        temp.append(i.why)                              #3
        temp.append(i.how)                              #4
        temp.append(i.keyword.split("^"))               #5
        temp.append(i.name)                             #6
        game.append(temp)
    return render(request, 'snapinsight/games.html', {'desc':desc, 'game':game})

def services(request):
    if request.method == "POST":
        sol = Services.objects.all().count()
        Services.objects.all().delete()
        for i in range(sol+1):
            print(i)
            s_name = "name" + str(i)
            s_description = "description" + str(i)
            s_some_point = "some_point" + str(i)
            s_cost = "cost" + str(i)
            s_plan = "plan" + str(i)
            s_feature = "feature" + str(i)
            s_keyword = "keyword" + str(i)

            if request.POST.get(s_name) == "":
                continue

            service_name = request.POST.get(s_name)
            service_description = request.POST.get(s_description)
            service_some_point = request.POST.getlist(s_some_point)
            service_some_point = list(filter(lambda a: a != "", service_some_point))
            service_cost = request.POST.getlist(s_cost)
            service_cost = list(filter(lambda a: a != "", service_cost))
            service_plan = request.POST.getlist(s_plan)
            service_plan = list(filter(lambda a: a != "", service_plan))
            service_feature = request.POST.getlist(s_feature)
            service_feature = list(filter(lambda a: a != "", service_feature))
            service_keyword = request.POST.getlist(s_keyword)
            service_keyword = list(filter(lambda a: a != "", service_keyword))
            Services.objects.create(name=service_name, description=service_description, some_point="^".join(service_some_point), cost="^".join(service_cost), plan="^".join(service_plan), feature="^".join(service_feature), keyword="^".join(service_keyword))

    service = Services.objects.all()
    services = []
    for i in service:
        temp = []
        temp.append(i.name)                             #0
        temp.append(i.description)                      #1
        temp.append(i.some_point.split("^"))            #2
        temp.append([[x,y] for x,y in zip(i.cost.split("^"), i.plan.split("^"))])                  #3
        temp.append(i.feature.split("^"))               #4
        temp.append(i.keyword.split("^"))               #5
        services.append(temp)
    # print(services[0][3])
    return render(request, 'snapinsight/services.html', {'services':services})

def legal(request):
    if request.method == "POST":
        guideline = request.POST.get('guideline')
        privacy = request.POST.getlist('privacy')
        term = request.POST.getlist('term')
        Legal.objects.all().delete()
        Legal.objects.create(guideline=guideline, privacy=privacy, term=term)
    legal = Legal.objects.all()
    return render(request, 'snapinsight/legal.html', {'legal':legal[0]})

def ideas(request):
    return render(request, 'snapinsight/ideas.html')


def moodish_overview(request):
    if request.method == "POST":
        description = request.POST.get('description')
        version = request.POST.get('version')
        features = request.POST.get('features')
        start_date = request.POST.get('start_date')
        end_date = request.POST.get('end_date')
        Service_Overview.objects.filter(name="Moodish").update(description=description, version=version, features=features, start_date=start_date, end_date=end_date)
        # print(description, version, features, start_date, end_date)
        faq_count = Service_FAQ.objects.filter(name="Moodish").count()
        Service_FAQ.objects.filter(name="Moodish").delete()
        for i in range(faq_count + 1):
            ques = "question" + str(i)
            ans = "answer" + str(i)
            print(i)

            if i == 0:
                if len(request.POST.getlist(ques)) == 0:
                    continue
                question = request.POST.getlist(ques)
                answer = request.POST.getlist(ans)
                for i in range(len(question)):
                    if question[i] == "":
                        continue
                    # print(question[i])
                    # print(answer[i])
                    Service_FAQ.objects.create(name="Moodish", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="Moodish", question=question, answer=answer)
            # print(question, answer)


    overview = Service_Overview.objects.filter(name="Moodish")
    faq = Service_FAQ.objects.filter(name="Moodish")
    documents = Service_Document.objects.filter(name="Moodish")
    return render(request, 'snapinsight/moodish/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def moodish_projects(request):
    return render(request, 'snapinsight/moodish/projects.html')

def moodish_resources(request):
    return render(request, 'snapinsight/moodish/resources.html')

def moodish_roadmap(request):
    if request.method == "POST":
        step_count = Service_Roadmap.objects.filter(name="Moodish", tag="0").count()
        Service_Roadmap.objects.filter(name="Moodish").delete()
        for i in range(step_count):
            s = "step" + str(i+1)
            d = "date" + str(i+1)
            if request.POST.get(s) == "":
                continue
            step = request.POST.get(s)
            date = request.POST.get(d)
            # print(step, date)
            Service_Roadmap.objects.create(name="Moodish", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            # print(new_step[i], new_date[i])
            Service_Roadmap.objects.create(name="Moodish", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
            # print(final_date, final_step)
            Service_Roadmap.objects.create(name="Moodish", step=final_step, date=final_date, tag="1")
    roadmap = Service_Roadmap.objects.filter(name="Moodish", tag="0")
    try:
        final = Service_Roadmap.objects.get(name="Moodish", tag="1")
    except:
        final=[]
    name = roadmap[0].name
    return render(request, 'snapinsight/moodish/roadmap.html', {"roadmap":roadmap,"name":name, "final":final})

def moodish_tasks(request):
    return render(request, 'snapinsight/moodish/tasks.html')


def runner_overview(request):
    if request.method == "POST":
        description = request.POST.get('description')
        version = request.POST.get('version')
        features = request.POST.get('features')
        start_date = request.POST.get('start_date')
        end_date = request.POST.get('end_date')
        Service_Overview.objects.filter(name="Runner").update(description=description, version=version, features=features, start_date=start_date, end_date=end_date)
        # print(description, version, features, start_date, end_date)
        faq_count = Service_FAQ.objects.filter(name="Runner").count()
        Service_FAQ.objects.filter(name="Runner").delete()
        for i in range(faq_count + 1):
            ques = "question" + str(i)
            ans = "answer" + str(i)
            print(i)

            if i == 0:
                if len(request.POST.getlist(ques)) == 0:
                    continue
                question = request.POST.getlist(ques)
                answer = request.POST.getlist(ans)
                for i in range(len(question)):
                    if question[i] == "":
                        continue
                    # print(question[i])
                    # print(answer[i])
                    Service_FAQ.objects.create(name="Runner", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="Runner", question=question, answer=answer)
            # print(question, answer)


    overview = Service_Overview.objects.filter(name="Runner")
    faq = Service_FAQ.objects.filter(name="Runner")
    documents = Service_Document.objects.filter(name="Runner")
    return render(request, 'snapinsight/runner/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def runner_projects(request):
    return render(request, 'snapinsight/runner/projects.html')

def runner_resources(request):
    return render(request, 'snapinsight/runner/resources.html')

def runner_roadmap(request):
    if request.method == "POST":
        step_count = Service_Roadmap.objects.filter(name="Runner", tag="0").count()
        Service_Roadmap.objects.filter(name="Runner").delete()
        for i in range(step_count):
            s = "step" + str(i+1)
            d = "date" + str(i+1)
            if request.POST.get(s) == "":
                continue
            step = request.POST.get(s)
            date = request.POST.get(d)
            # print(step, date)
            Service_Roadmap.objects.create(name="Runner", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            # print(new_step[i], new_date[i])
            Service_Roadmap.objects.create(name="Runner", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
            # print(final_date, final_step)
            Service_Roadmap.objects.create(name="Runner", step=final_step, date=final_date, tag="1")
    roadmap = Service_Roadmap.objects.filter(name="Runner", tag="0")
    try:
        final = Service_Roadmap.objects.get(name="Runner", tag="1")
    except:
        final=[]
    try:
        name = roadmap[0].name
    except:
        name = "Runner"
    return render(request, 'snapinsight/runner/roadmap.html', {"roadmap":roadmap,"name":name, "final":final})

def runner_tasks(request):
    return render(request, 'snapinsight/runner/tasks.html')


def ml_overview(request):
    return render(request, 'snapinsight/ml/overview.html')

def ml_projects(request):
    return render(request, 'snapinsight/ml/projects.html')

def ml_resources(request):
    return render(request, 'snapinsight/ml/resources.html')

def ml_roadmap(request):
    return render(request, 'snapinsight/ml/roadmap.html')

def ml_tasks(request):
    return render(request, 'snapinsight/ml/tasks.html')


def marketing_overview(request):
    if request.method == "POST":
        description = request.POST.get('description')
        # version = request.POST.get('version')
        # features = request.POST.get('features')
        # start_date = request.POST.get('start_date')
        # end_date = request.POST.get('end_date')
        Service_Overview.objects.filter(name="Marketing").update(description=description, version="", features="", start_date="", end_date="")
        # print(description, version, features, start_date, end_date)
        faq_count = Service_FAQ.objects.filter(name="Marketing").count()
        Service_FAQ.objects.filter(name="Marketing").delete()
        for i in range(faq_count + 1):
            ques = "question" + str(i)
            ans = "answer" + str(i)
            print(i)

            if i == 0:
                if len(request.POST.getlist(ques)) == 0:
                    continue
                question = request.POST.getlist(ques)
                answer = request.POST.getlist(ans)
                for i in range(len(question)):
                    if question[i] == "":
                        continue
                    # print(question[i])
                    # print(answer[i])
                    Service_FAQ.objects.create(name="Marketing", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="Marketing", question=question, answer=answer)
            # print(question, answer)


    overview = Service_Overview.objects.filter(name="Marketing")
    faq = Service_FAQ.objects.filter(name="Marketing")
    documents = Service_Document.objects.filter(name="Marketing")
    return render(request, 'snapinsight/marketing/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def marketing_seo(request):
    return render(request, 'snapinsight/marketing/seo.html')

def marketing_resources(request):
    return render(request, 'snapinsight/marketing/resources.html')

def marketing_resources(request):
    return render(request, 'snapinsight/marketing/resources.html')

def marketing_roadmap(request):
    if request.method == "POST":
        step_count = Service_Roadmap.objects.filter(name="Marketing", tag="0").count()
        Service_Roadmap.objects.filter(name="Marketing").delete()
        for i in range(step_count):
            s = "step" + str(i+1)
            d = "date" + str(i+1)
            if request.POST.get(s) == "":
                continue
            step = request.POST.get(s)
            date = request.POST.get(d)
            # print(step, date)
            Service_Roadmap.objects.create(name="Marketing", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            # print(new_step[i], new_date[i])
            Service_Roadmap.objects.create(name="Marketing", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
            # print(final_date, final_step)
            Service_Roadmap.objects.create(name="Marketing", step=final_step, date=final_date, tag="1")
    roadmap = Service_Roadmap.objects.filter(name="Marketing", tag="0")
    try:
        final = Service_Roadmap.objects.get(name="Marketing", tag="1")
    except:
        final=[]
    try:
        name = roadmap[0].name
    except:
        name = "Marketing"
    return render(request, 'snapinsight/marketing/roadmap.html', {"roadmap":roadmap,"name":name, "final":final})

def marketing_social_design_templates(request):
    if request.method == "POST":
        pdt_count = Marketing_PTD.objects.all().count()
        Marketing_PTD.objects.all().delete()
        for i in range(pdt_count + 1):
            n = "name" + str(i)
            d = "description" + str(i)
            l = "link" + str(i)
            # print(i)
            if i == 0:
                if len(request.POST.getlist(n)) == 0:
                    continue
                name = request.POST.getlist(n)
                description = request.POST.getlist(d)
                link = request.POST.getlist(l)
                for i in range(len(name)):
                    if name[i] == "":
                        continue
                    Marketing_PTD.objects.create(name=name[i], description=description[i], link =link[i])
                continue
            name = request.POST.get(n)
            description = request.POST.get(d)
            link = request.POST.get(l)
            if name == "":
                continue
            Marketing_PTD.objects.create(name=name, description=description, link =link)

    pdt = Marketing_PTD.objects.all()
    return render(request, 'snapinsight/marketing/social-design-templates.html', {'pdt':pdt})

def marketing_social_moodish(request):
    s = Marketing_Social.objects.filter(name="Moodish")
    social = []
    for i in s:
        social.append(i.name)                   #0
        social.append(i.description)            #1
        social.append(i.content.split("^"))     #2

    return render(request, 'snapinsight/marketing/social-moodish.html', {'social':social})

def marketing_social_snapinsight(request):
    s = Marketing_Social.objects.filter(name="Snapinsight")
    social = []
    for i in s:
        social.append(i.name)                   #0
        social.append(i.description)            #1
        social.append(i.content.split("^"))     #2
    return render(request, 'snapinsight/marketing/social-snapinsight.html', {'social':social})

def marketing_email_homepage(request):
    return render(request, 'snapinsight/marketing/email-homepage.html')

def marketing_email_list(request):
    return render(request, 'snapinsight/marketing/email-list.html')


def hr_overview(request):
    return render(request, 'snapinsight/hr/overview.html')

def hr_portals(request):
    return render(request, 'snapinsight/hr/portals.html')

def hr_resources(request):
    return render(request, 'snapinsight/hr/resources.html')

def hr_roadmap(request):
    return render(request, 'snapinsight/hr/roadmap.html')

def hr_tasks(request):
    return render(request, 'snapinsight/hr/tasks.html')

def hr_jd(request):
    return render(request, 'snapinsight/hr/jd.html')


def contentwriter_overview(request):
    return render(request, 'snapinsight/contentwriter/overview.html')

def contentwriter_articles(request):
    return render(request, 'snapinsight/contentwriter/article.html')

def contentwriter_resources(request):
    return render(request, 'snapinsight/contentwriter/resources.html')

def contentwriter_postdesign(request):
    return render(request, 'snapinsight/contentwriter/postdesign.html')

def contentwriter_content_strategy(request):
    return render(request, 'snapinsight/contentwriter/tasks.html')


def team_overview(request):
    return render(request, 'snapinsight/team/overview.html')

# Create your views here.
