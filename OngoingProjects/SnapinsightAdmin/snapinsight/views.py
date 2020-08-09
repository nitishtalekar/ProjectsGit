from django.shortcuts import render
from .forms import *
from .models import *
from django.core.files.storage import FileSystemStorage
from os import listdir


def index(request):
    return render(request, 'snapinsight/index.html')

def profile(request):
    return render(request, 'snapinsight/profile.html')

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
            Solutions.objects.create(name=s_name, description=s_description, some_point="^".join(s_some_point), what=s_what, why=s_why, how=s_how, keyword="^".join(s_keyword))


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


    overview = Service_Overview.objects.filter(name="Moodish")
    faq = Service_FAQ.objects.filter(name="Moodish")
    documents = Service_Document.objects.filter(name="Moodish")
    return render(request, 'snapinsight/moodish/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def moodish_projects(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            # print(id)
            file = Service_Document.objects.get(id=id).doc_link
            name = file.split("/")[-1]
            # print(name)
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            dir = listdir(path)
            [fs.delete(i) for i in dir if i == name]
            Service_Document.objects.filter(id=id).delete()
            doc = Service_Document.objects.filter(name="Moodish")
            return render(request, 'snapinsight/moodish/projects.html', {'doc':doc})
        main_doc = request.FILES.getlist("main_doc")
        code_doc = request.FILES.getlist("code_doc")
        full_doc = request.FILES.getlist("full_doc")
        design_doc = request.FILES.getlist("design_doc")
        requirement_doc = request.FILES.getlist("requirement_doc")

        fs = FileSystemStorage(location='snapinsight/media/Moodish/Main Documents/')
        for i in main_doc:
            og_name = i.name
            link = "snapinsight/media/Moodish/Main Documents/" + i.name
            Service_Document.objects.create(name="Moodish", doc_name=og_name.split(".")[0], doc_link=link, tag="Main Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Moodish/Code Documents/')
        for i in code_doc:
            og_name = i.name
            link = "snapinsight/media/Moodish/Code Documents/" + i.name
            Service_Document.objects.create(name="Moodish", doc_name=og_name.split(".")[0], doc_link=link, tag="Code Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Moodish/Design Documents/')
        for i in full_doc:
            og_name = i.name
            link = "snapinsight/media/Moodish/Design Documents/" + i.name
            Service_Document.objects.create(name="Moodish", doc_name=og_name.split(".")[0], doc_link=link, tag="Design Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Moodish/Full Design Documents/')
        for i in design_doc:
            og_name = i.name
            link = "snapinsight/media/Moodish/Full Design Documents/" + i.name
            Service_Document.objects.create(name="Moodish", doc_name=og_name.split(".")[0], doc_link=link, tag="Full Design Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Moodish/Requirement Documents/')
        for i in requirement_doc:
            og_name = i.name
            link = "snapinsight/media/Moodish/Requirement Documents/" + i.name
            Service_Document.objects.create(name="Moodish", doc_name=og_name.split(".")[0], doc_link=link, tag="Requirement Documents")
            filename = fs.save(og_name, i)
    doc = Service_Document.objects.filter(name="Moodish")
    return render(request, 'snapinsight/moodish/projects.html', {'doc':doc})

def moodish_resources(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            file = Resources.objects.get(id=id).file
            name = file.split("/")[-1]
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            if file != "":
                dir = listdir(path)
                [fs.delete(i) for i in dir if i == name]
            Resources.objects.get(id=id).delete()
            resource = Resources.objects.filter(name="Moodish")
            return render(request, 'snapinsight/moodish/resources.html', {'resource':resource})
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        res = request.FILES.getlist("resource_doc")
        print(res)
        fs = FileSystemStorage(location='snapinsight/media/Moodish/Resources/')
        k = 0
        for i in range(len(description)):
            print(i)
            if description[i] == "":
                continue
            if len(res) !=0 :
                og_name = res[k].name
                fs.save(og_name, res[k])
                Resources.objects.create(name="Moodish", description=description[i], link=link[i], file='snapinsight/media/Moodish/Resources/'+og_name, file_name=og_name.split(".")[0])
            else:
                Resources.objects.create(name="Moodish", description=description[i], link=link[i], file="", file_name="")
            k+=1

    resource = Resources.objects.filter(name="Moodish")
    return render(request, 'snapinsight/moodish/resources.html', {'resource':resource})

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
            Service_Roadmap.objects.create(name="Moodish", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
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
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            # print(id)
            file = Service_Document.objects.get(id=id).doc_link
            name = file.split("/")[-1]
            # print(name)
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            dir = listdir(path)
            [fs.delete(i) for i in dir if i == name]
            Service_Document.objects.filter(id=id).delete()
            doc = Service_Document.objects.filter(name="Runner")
            return render(request, 'snapinsight/runner/projects.html', {'doc':doc})
        main_doc = request.FILES.getlist("main_doc")
        code_doc = request.FILES.getlist("code_doc")
        full_doc = request.FILES.getlist("full_doc")
        design_doc = request.FILES.getlist("design_doc")
        requirement_doc = request.FILES.getlist("requirement_doc")

        fs = FileSystemStorage(location='snapinsight/media/Runner/Main Documents/')
        for i in main_doc:
            og_name = i.name
            link = "snapinsight/media/Runner/Main Documents/" + i.name
            Service_Document.objects.create(name="Runner", doc_name=og_name.split(".")[0], doc_link=link, tag="Main Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Runner/Code Documents/')
        for i in code_doc:
            og_name = i.name
            link = "snapinsight/media/Runner/Code Documents/" + i.name
            Service_Document.objects.create(name="Runner", doc_name=og_name.split(".")[0], doc_link=link, tag="Code Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Runner/Design Documents/')
        for i in full_doc:
            og_name = i.name
            link = "snapinsight/media/Runner/Design Documents/" + i.name
            Service_Document.objects.create(name="Runner", doc_name=og_name.split(".")[0], doc_link=link, tag="Design Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Runner/Full Design Documents/')
        for i in design_doc:
            og_name = i.name
            link = "snapinsight/media/Runner/Full Design Documents/" + i.name
            Service_Document.objects.create(name="Runner", doc_name=og_name.split(".")[0], doc_link=link, tag="Full Design Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/Runner/Requirement Documents/')
        for i in requirement_doc:
            og_name = i.name
            link = "snapinsight/media/Runner/Requirement Documents/" + i.name
            Service_Document.objects.create(name="Runner", doc_name=og_name.split(".")[0], doc_link=link, tag="Requirement Documents")
            filename = fs.save(og_name, i)
    doc = Service_Document.objects.filter(name="Runner")
    return render(request, 'snapinsight/runner/projects.html', {'doc':doc})

def runner_resources(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            file = Resources.objects.get(id=id).file
            name = file.split("/")[-1]
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            if file != "":
                dir = listdir(path)
                [fs.delete(i) for i in dir if i == name]
            Resources.objects.get(id=id).delete()
            resource = Resources.objects.filter(name="Runner")
            return render(request, 'snapinsight/runner/resources.html', {'resource':resource})
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        res = request.FILES.getlist("resource_doc")
        print(res)
        fs = FileSystemStorage(location='snapinsight/media/Runner/Resources/')
        k = 0
        for i in range(len(description)):
            print(i)
            if description[i] == "":
                continue
            if len(res) !=0 :
                og_name = res[k].name
                fs.save(og_name, res[k])
                Resources.objects.create(name="Runner", description=description[i], link=link[i], file='snapinsight/media/Runner/Resources/'+og_name, file_name=og_name.split(".")[0])
            else:
                Resources.objects.create(name="Runner", description=description[i], link=link[i], file="", file_name="")
            k+=1

    resource = Resources.objects.filter(name="Runner")
    return render(request, 'snapinsight/runner/resources.html', {'resource':resource})

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
            Service_Roadmap.objects.create(name="Runner", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            Service_Roadmap.objects.create(name="Runner", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
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
    if request.method == "POST":
        description = request.POST.get('description')
        version = request.POST.get('version')
        features = request.POST.get('features')
        start_date = request.POST.get('start_date')
        end_date = request.POST.get('end_date')
        Service_Overview.objects.filter(name="ML").update(description=description, version=version, features=features, start_date=start_date, end_date=end_date)
        faq_count = Service_FAQ.objects.filter(name="ML").count()
        Service_FAQ.objects.filter(name="ML").delete()
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
                    Service_FAQ.objects.create(name="ML", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="ML", question=question, answer=answer)


    overview = Service_Overview.objects.filter(name="ML")
    faq = Service_FAQ.objects.filter(name="ML")
    documents = Service_Document.objects.filter(name="ML")
    return render(request, 'snapinsight/ml/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def ml_projects(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            # print(id)
            file = Service_Document.objects.get(id=id).doc_link
            name = file.split("/")[-1]
            # print(name)
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            dir = listdir(path)
            [fs.delete(i) for i in dir if i == name]
            Service_Document.objects.filter(id=id).delete()
            doc = Service_Document.objects.filter(name="ML")
            return render(request, 'snapinsight/ml/projects.html', {'doc':doc})
        main_doc = request.FILES.getlist("main_doc")
        code_doc = request.FILES.getlist("code_doc")
        full_doc = request.FILES.getlist("full_doc")
        design_doc = request.FILES.getlist("design_doc")
        requirement_doc = request.FILES.getlist("requirement_doc")

        fs = FileSystemStorage(location='snapinsight/media/ML/Main Documents/')
        for i in main_doc:
            og_name = i.name
            link = "snapinsight/media/ML/Main Documents/" + i.name
            Service_Document.objects.create(name="ML", doc_name=og_name.split(".")[0], doc_link=link, tag="Main Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/ML/Code Documents/')
        for i in code_doc:
            og_name = i.name
            link = "snapinsight/media/ML/Code Documents/" + i.name
            Service_Document.objects.create(name="ML", doc_name=og_name.split(".")[0], doc_link=link, tag="Code Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/ML/Design Documents/')
        for i in full_doc:
            og_name = i.name
            link = "snapinsight/media/ML/Design Documents/" + i.name
            Service_Document.objects.create(name="ML", doc_name=og_name.split(".")[0], doc_link=link, tag="Design Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/ML/Full Design Documents/')
        for i in design_doc:
            og_name = i.name
            link = "snapinsight/media/ML/Full Design Documents/" + i.name
            Service_Document.objects.create(name="ML", doc_name=og_name.split(".")[0], doc_link=link, tag="Full Design Documents")
            filename = fs.save(og_name, i)

        fs = FileSystemStorage(location='snapinsight/media/ML/Requirement Documents/')
        for i in requirement_doc:
            og_name = i.name
            link = "snapinsight/media/ML/Requirement Documents/" + i.name
            Service_Document.objects.create(name="ML", doc_name=og_name.split(".")[0], doc_link=link, tag="Requirement Documents")
            filename = fs.save(og_name, i)
    doc = Service_Document.objects.filter(name="ML")
    return render(request, 'snapinsight/ml/projects.html', {'doc':doc})

def ml_resources(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            file = Resources.objects.get(id=id).file
            name = file.split("/")[-1]
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            if file != "":
                dir = listdir(path)
                [fs.delete(i) for i in dir if i == name]
            Resources.objects.get(id=id).delete()
            resource = Resources.objects.filter(name="ML")
            return render(request, 'snapinsight/ml/resources.html', {'resource':resource})
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        res = request.FILES.getlist("resource_doc")
        print(res)
        fs = FileSystemStorage(location='snapinsight/media/ML/Resources/')
        k = 0
        for i in range(len(description)):
            print(i)
            if description[i] == "":
                continue
            if len(res) !=0 :
                og_name = res[k].name
                fs.save(og_name, res[k])
                Resources.objects.create(name="ML", description=description[i], link=link[i], file='snapinsight/media/ML/Resources/'+og_name, file_name=og_name.split(".")[0])
            else:
                Resources.objects.create(name="ML", description=description[i], link=link[i], file="", file_name="")
            k+=1

    resource = Resources.objects.filter(name="ML")
    return render(request, 'snapinsight/ml/resources.html', {'resource':resource})

def ml_roadmap(request):
    if request.method == "POST":
        step_count = Service_Roadmap.objects.filter(name="ML", tag="0").count()
        Service_Roadmap.objects.filter(name="ML").delete()
        for i in range(step_count):
            s = "step" + str(i+1)
            d = "date" + str(i+1)
            if request.POST.get(s) == "":
                continue
            step = request.POST.get(s)
            date = request.POST.get(d)
            Service_Roadmap.objects.create(name="ML", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            Service_Roadmap.objects.create(name="ML", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
            # print(final_date, final_step)
            Service_Roadmap.objects.create(name="ML", step=final_step, date=final_date, tag="1")
    roadmap = Service_Roadmap.objects.filter(name="ML", tag="0")
    try:
        final = Service_Roadmap.objects.get(name="ML", tag="1")
    except:
        final=[]
    try:
        name = roadmap[0].name
    except:
        name = "ML"
    return render(request, 'snapinsight/ml/roadmap.html', {"roadmap":roadmap,"name":name, "final":final})

def ml_tasks(request):
    return render(request, 'snapinsight/ml/tasks.html')


def marketing_overview(request):
    if request.method == "POST":
        description = request.POST.get('description')
        Service_Overview.objects.filter(name="Marketing").update(description=description, version="", features="", start_date="", end_date="")
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
                    Service_FAQ.objects.create(name="Marketing", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="Marketing", question=question, answer=answer)


    overview = Service_Overview.objects.filter(name="Marketing")
    faq = Service_FAQ.objects.filter(name="Marketing")
    documents = Service_Document.objects.filter(name="Marketing")
    return render(request, 'snapinsight/marketing/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def marketing_seo(request):
    if request.method == "POST":
        k = SEO_Keyword.objects.all()
        for i in k:
            key = request.POST.getlist(i.name)
            key = list(filter(lambda a: a != "", key))
            SEO_Keyword.objects.filter(name=i.name).update(keyword="^".join(key))
        question = request.POST.getlist("question")
        answer = request.POST.getlist("answer")
        Service_FAQ.objects.filter(name="SEO").delete()
        for i in range(len(question)):
            if question[i] == "":
                continue
            Service_FAQ.objects.create(name="SEO", question=question[i], answer=answer[i])
    k = SEO_Keyword.objects.all()
    faq = Service_FAQ.objects.filter(name="SEO")
    keyword = []
    for i in k:
        temp = []
        temp.append(i.name)
        temp.append(i.keyword.split("^"))
        keyword.append(temp)
    return render(request, 'snapinsight/marketing/seo.html', {'keyword':keyword, 'faq':faq})

def marketing_resources(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            file = Resources.objects.get(id=id).file
            name = file.split("/")[-1]
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            if file != "":
                dir = listdir(path)
                [fs.delete(i) for i in dir if i == name]
            Resources.objects.get(id=id).delete()
            resource = Resources.objects.filter(name="Marketing")
            return render(request, 'snapinsight/marketing/resources.html', {'resource':resource})
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        res = request.FILES.getlist("resource_doc")
        print(res)
        fs = FileSystemStorage(location='snapinsight/media/Marketing/Resources/')
        k = 0
        for i in range(len(description)):
            print(i)
            if description[i] == "":
                continue
            if len(res) !=0 :
                og_name = res[k].name
                fs.save(og_name, res[k])
                Resources.objects.create(name="Marketing", description=description[i], link=link[i], file='snapinsight/media/Marketing/Resources/'+og_name, file_name=og_name.split(".")[0])
            else:
                Resources.objects.create(name="Marketing", description=description[i], link=link[i], file="", file_name="")
            k+=1

    resource = Resources.objects.filter(name="Marketing")
    return render(request, 'snapinsight/marketing/resources.html', {'resource':resource})

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
            Service_Roadmap.objects.create(name="Marketing", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            Service_Roadmap.objects.create(name="Marketing", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
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
    if request.method == "POST":
        description = request.POST.get("description")
        content = request.POST.getlist("content")
        content = list(filter(lambda a: a != "", content))
        Marketing_Social.objects.filter(name="Moodish").update(description=description, content="^".join(content))
    s = Marketing_Social.objects.filter(name="Moodish")
    social = []
    for i in s:
        social.append(i.name)                   #0
        social.append(i.description)            #1
        social.append(i.content.split("^"))     #2

    return render(request, 'snapinsight/marketing/social-moodish.html', {'social':social})

def marketing_social_snapinsight(request):
    if request.method == "POST":
        description = request.POST.get("description")
        content = request.POST.getlist("content")
        content = list(filter(lambda a: a != "", content))
        Marketing_Social.objects.filter(name="Snapinsight").update(description=description, content="^".join(content))
    s = Marketing_Social.objects.filter(name="Snapinsight")
    social = []
    for i in s:
        social.append(i.name)                   #0
        social.append(i.description)            #1
        social.append(i.content.split("^"))     #2
    return render(request, 'snapinsight/marketing/social-snapinsight.html', {'social':social})

def marketing_email_homepage(request):
    if request.method == "POST":
        about = request.POST.getlist("about")
        when = request.POST.getlist("when")
        Email_Detail.objects.all().delete()
        for i in range(len(about)):
            if about[i] == "":
                continue
            Email_Detail.objects.create(about=about[i], when=when[i])

    detail = Email_Detail.objects.all()
    return render(request, 'snapinsight/marketing/email-homepage.html', {'detail':detail})

def marketing_email_list(request):
    if request.method == "POST":
        name = request.POST.getlist("name")
        dob = request.POST.getlist("dob")
        mobile = request.POST.getlist("mobile")
        email = request.POST.getlist("email")
        category = request.POST.getlist("category")
        Email.objects.all().delete()
        for i in range(len(name)):
            if name[i] == "":
                continue
            Email.objects.create(name=name[i], dob=dob[i], mobile=mobile[i], email=email[i], category=category[i])
    email = Email.objects.all()
    return render(request, 'snapinsight/marketing/email-list.html', {'email':email})


def hr_overview(request):
    if request.method == "POST":
        description = request.POST.get('description')
        Service_Overview.objects.filter(name="HR").update(description=description, version="", features="", start_date="", end_date="")
        faq_count = Service_FAQ.objects.filter(name="HR").count()
        Service_FAQ.objects.filter(name="HR").delete()
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
                    Service_FAQ.objects.create(name="HR", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="HR", question=question, answer=answer)


    overview = Service_Overview.objects.filter(name="HR")
    faq = Service_FAQ.objects.filter(name="HR")
    documents = Service_Document.objects.filter(name="HR")
    return render(request, 'snapinsight/hr/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def hr_portals(request):
    if request.method == "POST":
        card = request.POST.getlist("card")
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        Job_Portal.objects.all().delete()
        for i in range(len(card)):
            if card[i] == "":
                continue
            Job_Portal.objects.create(card=card[i], description=description[i], link=link[i])
    cards = Job_Portal.objects.all()
    return render(request, 'snapinsight/hr/portals.html', {"cards":cards})

def hr_resources(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            file = Resources.objects.get(id=id).file
            name = file.split("/")[-1]
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            if file != "":
                dir = listdir(path)
                [fs.delete(i) for i in dir if i == name]
            Resources.objects.get(id=id).delete()
            resource = Resources.objects.filter(name="HR")
            return render(request, 'snapinsight/hr/resources.html', {'resource':resource})
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        res = request.FILES.getlist("resource_doc")
        print(res)
        fs = FileSystemStorage(location='snapinsight/media/HR/Resources/')
        k = 0
        for i in range(len(description)):
            print(i)
            if description[i] == "":
                continue
            if len(res) !=0 :
                og_name = res[k].name
                fs.save(og_name, res[k])
                Resources.objects.create(name="HR", description=description[i], link=link[i], file='snapinsight/media/HR/Resources/'+og_name, file_name=og_name.split(".")[0])
            else:
                Resources.objects.create(name="HR", description=description[i], link=link[i], file="", file_name="")
            k+=1

    resource = Resources.objects.filter(name="HR")
    return render(request, 'snapinsight/hr/resources.html', {'resource':resource})

def hr_roadmap(request):
    if request.method == "POST":
        step_count = Service_Roadmap.objects.filter(name="HR", tag="0").count()
        Service_Roadmap.objects.filter(name="HR").delete()
        for i in range(step_count):
            s = "step" + str(i+1)
            d = "date" + str(i+1)
            if request.POST.get(s) == "":
                continue
            step = request.POST.get(s)
            date = request.POST.get(d)
            Service_Roadmap.objects.create(name="HR", step=step, date=date, tag="0")
        new_step = request.POST.getlist("step-1")
        new_date = request.POST.getlist("date-1")
        for i in range(len(new_step)):
            if new_step[i] == "":
                continue
            Service_Roadmap.objects.create(name="HR", step=new_step[i], date=new_date[i], tag="0")
        final_step = request.POST.get("final_step")
        final_date = request.POST.get("final_date")
        if final_step != "":
            Service_Roadmap.objects.create(name="HR", step=final_step, date=final_date, tag="1")
    roadmap = Service_Roadmap.objects.filter(name="HR", tag="0")
    try:
        final = Service_Roadmap.objects.get(name="HR", tag="1")
    except:
        final=[]
    try:
        name = roadmap[0].name
    except:
        name = "HR"
    return render(request, 'snapinsight/hr/roadmap.html', {"roadmap":roadmap,"name":name, "final":final})

def hr_tasks(request):
    return render(request, 'snapinsight/hr/tasks.html')

def hr_jd(request):
    if request.method == "POST":
        position = request.POST.getlist("position")
        description = request.POST.getlist("description")
        responsible = request.POST.getlist("responsible")
        skills = request.POST.getlist("skills")
        benefits = request.POST.getlist("benefits")
        Job_Description.objects.all().delete()
        for i in range(len(position)):
            print(i)
            if position[i] == "":
                continue
            Job_Description.objects.create(position=position[i], description=description[i], responsible=responsible[i], skills=skills[i], benefits=benefits[i])
    jd = Job_Description.objects.all()
    return render(request, 'snapinsight/hr/jd.html', {'jd':jd})


def contentwriter_overview(request):
    if request.method == "POST":
        description = request.POST.get('description')
        Service_Overview.objects.filter(name="Content Writer").update(description=description, version="", features="", start_date="", end_date="")
        faq_count = Service_FAQ.objects.filter(name="Content Writer").count()
        Service_FAQ.objects.filter(name="Content Writer").delete()
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
                    Service_FAQ.objects.create(name="Content Writer", question=question[i], answer=answer[i])
                continue
            if request.POST.get(ques) == "":
                continue
            question = request.POST.get(ques)
            answer = request.POST.get(ans)
            Service_FAQ.objects.create(name="Content Writer", question=question, answer=answer)


    overview = Service_Overview.objects.filter(name="Content Writer")
    faq = Service_FAQ.objects.filter(name="Content Writer")
    documents = Service_Document.objects.filter(name="Content Writer")
    return render(request, 'snapinsight/contentwriter/overview.html', {'overview':overview[0], 'faq':faq, 'documents':documents})

def contentwriter_articles(request):
    return render(request, 'snapinsight/contentwriter/article.html')

def contentwriter_resources(request):
    if request.method == "POST":
        if request.POST.get("delete") != "add":
            id = request.POST.get("delete")
            file = Resources.objects.get(id=id).file
            name = file.split("/")[-1]
            path = "/".join(file.split("/")[:-1])
            fs = FileSystemStorage(location=path)
            if file != "":
                dir = listdir(path)
                [fs.delete(i) for i in dir if i == name]
            Resources.objects.get(id=id).delete()
            resource = Resources.objects.filter(name="Content")
            return render(request, 'snapinsight/contentwriter/resources.html', {'resource':resource})
        description = request.POST.getlist("description")
        link = request.POST.getlist("link")
        res = request.FILES.getlist("resource_doc")
        print(res)
        fs = FileSystemStorage(location='snapinsight/media/Content/Resources/')
        k = 0
        for i in range(len(description)):
            print(i)
            if description[i] == "":
                continue
            if len(res) !=0 :
                og_name = res[k].name
                fs.save(og_name, res[k])
                Resources.objects.create(name="Content", description=description[i], link=link[i], file='snapinsight/media/Content/Resources/'+og_name, file_name=og_name.split(".")[0])
            else:
                Resources.objects.create(name="Content", description=description[i], link=link[i], file="", file_name="")
            k+=1

    resource = Resources.objects.filter(name="Content")
    return render(request, 'snapinsight/contentwriter/resources.html', {'resource':resource})

def contentwriter_postdesign(request):
    if request.method == "POST":
        pdt_count = Contentwriter_PTD.objects.all().count()
        Contentwriter_PTD.objects.all().delete()
        for i in range(pdt_count + 1):
            n = "name" + str(i)
            d = "description" + str(i)
            l = "link" + str(i)
            if i == 0:
                if len(request.POST.getlist(n)) == 0:
                    continue
                name = request.POST.getlist(n)
                description = request.POST.getlist(d)
                link = request.POST.getlist(l)
                for i in range(len(name)):
                    if name[i] == "":
                        continue
                    Contentwriter_PTD.objects.create(name=name[i], description=description[i], link =link[i])
                continue
            name = request.POST.get(n)
            description = request.POST.get(d)
            link = request.POST.get(l)
            if name == "":
                continue
            Contentwriter_PTD.objects.create(name=name, description=description, link =link)

    pdt = Contentwriter_PTD.objects.all()
    return render(request, 'snapinsight/contentwriter/postdesign.html', {'pdt':pdt})

def contentwriter_content_strategy(request):
    return render(request, 'snapinsight/contentwriter/tasks.html')


def team_overview(request):
    if request.method == "POST":
        name = request.POST.getlist("name")
        name = list(filter(lambda a: a != "", name))
        description = request.POST.getlist("description")
        description = list(filter(lambda a: a != "", description))
        department = request.POST.getlist("department")
        department = list(filter(lambda a: a != "", department))
        position = request.POST.getlist("position")
        position = list(filter(lambda a: a != "", position))
        email = request.POST.getlist("email")
        email = list(filter(lambda a: a != "", email))
        talent = request.POST.getlist("talent")
        talent = list(filter(lambda a: a != "", talent))
        Team.objects.all().delete()
        for i in range(len(name)):
            Team.objects.create(name=name[i], description=description[i], department=department[i], positon=position[i], email=email[i], talent=talent[i])

    team = Team.objects.all()
    return render(request, 'snapinsight/team/overview.html', {'team':team})

# Create your views here.
