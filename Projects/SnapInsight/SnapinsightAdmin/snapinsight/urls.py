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
    path('profile/',views.profile),

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
    
    path('ml/overview/',views.ml_overview),
    path('ml/projects/',views.ml_projects),
    path('ml/resources/',views.ml_resources),
    path('ml/roadmap/',views.ml_roadmap),
    path('ml/tasks/',views.ml_tasks),

    path('marketing/overview/',views.marketing_overview),
    path('marketing/seo/',views.marketing_seo),
    path('marketing/resources/',views.marketing_resources),
    path('marketing/roadmap/',views.marketing_roadmap),
    path('marketing/social_design_templates/',views.marketing_social_design_templates),
    path('marketing/social_moodish/',views.marketing_social_moodish),
    path('marketing/social_snapinsight/',views.marketing_social_snapinsight),
    path('marketing/email_homepage/',views.marketing_email_homepage),
    path('marketing/email_list/',views.marketing_email_list),

    path('hr/overview/',views.hr_overview),
    path('hr/portals/',views.hr_portals),
    path('hr/resources/',views.hr_resources),
    path('hr/roadmap/',views.hr_roadmap),
    path('hr/tasks/',views.hr_tasks),
    path('hr/jd/',views.hr_jd),

    path('contentwriter/overview/',views.contentwriter_overview),
    path('contentwriter/articles/',views.contentwriter_articles),
    path('contentwriter/resources/',views.contentwriter_resources),
    path('contentwriter/postdesign/',views.contentwriter_postdesign),
    path('contentwriter/content_strategy/',views.contentwriter_content_strategy),

    path('team/overview/',views.team_overview),
]
