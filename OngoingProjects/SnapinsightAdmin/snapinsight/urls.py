from django.urls import path
from . import views

urlpatterns = [
    path('',views.index),
    path('overview/',views.overview),
    path('solutions/',views.solutions),
    path('games/',views.games),
    path('services/',views.services),
    path('legal/',views.legal),
    path('ideas/',views.ideas),
    path('moodish/overview/',views.moodish_overview),
    path('moodish/projects/',views.moodish_projects),
    path('moodish/resources/',views.moodish_resources),
    path('moodish/roadmap/',views.moodish_roadmap),
    path('moodish/tasks/',views.moodish_tasks),
]
