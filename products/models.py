from django.db import models
from django.db.models import Avg
from django.contrib.auth.models import User

# Create your models here.

class Critter(models.Model):
    name = models.CharField(max_length=200)
    description = models.TextField()
    price = models.DecimalField(max_digits=6, decimal_places=2)
    image = models.ImageField(upload_to='critters/')
    created_at = models.DateTimeField(auto_now_add=True)

    def average_rating(self):
        result = self.reviews.aggregate(Avg('rating'))
        return result['rating__avg'] or 0.0
    
    def __str__(self):
        return self.name
    
class Review(models.Model):
    critter = models.ForeignKey(Critter, on_delete=models.CASCADE, related_name='reviews')
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    rating = models.IntegerField(default=5)
    comment = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True)
