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

    overview = Overview.objects.get(name = "company")
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
    return render(request, 'snapinsight/games.html')

def services(request):
    return render(request, 'snapinsight/services.html')

def legal(request):
    return render(request, 'snapinsight/legal.html')

def ideas(request):
    return render(request, 'snapinsight/ideas.html')


def moodish_overview(request):
    return render(request, 'snapinsight/moodish/overview.html')

def moodish_projects(request):
    return render(request, 'snapinsight/moodish/projects.html')

def moodish_resources(request):
    return render(request, 'snapinsight/moodish/resources.html')

def moodish_roadmap(request):
    return render(request, 'snapinsight/moodish/roadmap.html')

def moodish_tasks(request):
    return render(request, 'snapinsight/moodish/tasks.html')


def runner_overview(request):
    return render(request, 'snapinsight/runner/overview.html')

def runner_projects(request):
    return render(request, 'snapinsight/runner/projects.html')

def runner_resources(request):
    return render(request, 'snapinsight/runner/resources.html')

def runner_roadmap(request):
    return render(request, 'snapinsight/runner/roadmap.html')

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
    return render(request, 'snapinsight/marketing/overview.html')

def marketing_seo(request):
    return render(request, 'snapinsight/marketing/seo.html')

def marketing_resources(request):
    return render(request, 'snapinsight/marketing/resources.html')

def marketing_resources(request):
    return render(request, 'snapinsight/marketing/resources.html')

def marketing_roadmap(request):
    return render(request, 'snapinsight/marketing/roadmap.html')

def marketing_social_design_templates(request):
    return render(request, 'snapinsight/marketing/social-design-templates.html')

def marketing_social_moodish(request):
    return render(request, 'snapinsight/marketing/social-moodish.html')

def marketing_social_snapinsight(request):
    return render(request, 'snapinsight/marketing/social-snapinsight.html')

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
