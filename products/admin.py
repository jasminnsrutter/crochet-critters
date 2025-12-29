from django.contrib import admin
from .models import Critter, Review

# Register your models here.
@admin.register(Critter)
class CritterAdmin(admin.ModelAdmin):
    # makes admin list look like a spreadsheet
    list_display = ('name', 'price', 'created_at')
    search_fields = ('name',)
    list_filter = ('created_at',)

@admin.register(Review)
class ReviewAdmin(admin.ModelAdmin):
    list_display = ('user', 'critter', 'rating', 'created_at')