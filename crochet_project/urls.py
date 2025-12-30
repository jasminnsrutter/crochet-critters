"""
URL configuration for crochet_project project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/6.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib.auth import views as auth_views # Import this
from django.contrib import admin
from django.urls import path
from products import views #import views here
from django.conf import settings 
from django.conf.urls.static import static

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.critter_list, name='home'),
    path('critter/<int:critter_id>/', views.critter_detail, name='critter_detail'),
    path('about/', views.about, name='about'),
    path('critter/<int:critter_id>/review/', views.add_review, name='add_review'),
    path('care-guide/', views.care_guide, name='care_guide'),
    path('shipping/', views.shipping, name='shipping'),
    path('custom-order/', views.custom_order, name='custom_order'),
    path('cart/', views.cart_summary, name='cart_summary'), 
    path('cart/add/<int:critter_id>/', views.cart_add, name='cart_add'),
    path('cart/delete/', views.cart_delete, name='cart_delete'),
    path('login/', auth_views.LoginView.as_view(template_name='products/login.html'), name='login'),
    path('logout/', auth_views.LogoutView.as_view(), name='logout'),
] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
