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
# Create your views here.
