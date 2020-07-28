from django.shortcuts import render

def index(request):
    return render(request, 'snapinsight/index.html')

def overview(request):
    return render(request, 'snapinsight/overview.html')

def solutions(request):
    return render(request, 'snapinsight/solutions.html')

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

def runner_resources(request):
    return render(request, 'snapinsight/runner/resources.html')

def runner_roadmap(request):
    return render(request, 'snapinsight/runner/roadmap.html')

def runner_tasks(request):
    return render(request, 'snapinsight/runner/tasks.html')


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
    return render(request, 'snapinsight/marketing/email_list.html')
# Create your views here.
