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

    path('runner/overview/',views.runner_overview),
    path('runner/projects/',views.runner_projects),
    path('runner/resources/',views.runner_resources),
    path('runner/roadmap/',views.runner_roadmap),
    path('runner/tasks/',views.runner_tasks),

    path('marketing/overview/',views.marketing_overview),
    path('marketing/seo/',views.marketing_seo),
    path('marketing/resources/',views.marketing_resources),
    path('marketing/roadmap/',views.marketing_roadmap),
    path('marketing/social_design_templates/',views.marketing_social_design_templates),
    path('marketing/social_moodish/',views.marketing_social_moodish),
    path('marketing/social_snapinsight/',views.marketing_social_snapinsight),
    path('marketing/email_homepage/',views.marketing_email_homepage),
    path('marketing/email_list/',views.marketing_email_list),
]
