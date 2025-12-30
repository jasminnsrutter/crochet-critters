from django.db.models import Avg
from django.shortcuts import render, get_object_or_404, redirect
from .models import Critter, Review
from .cart import Cart


# handles homepage list
def critter_list(request):
    critters = Critter.objects.all()
    return render(request, 'products/critter_list.html', {'critters': critters})

# handles individual page for one critter
def critter_detail(request, critter_id):
    # looks for critter with the ID from the URL or shows a 404 error if not found
    critter = get_object_or_404(Critter, id=critter_id)
    
    # Calculate the average rating
    average_data = critter.reviews.aggregate(Avg('rating'))
    # If there are no reviews, average_rating will be None, so we use '0' as a fallback
    average_rating = average_data['rating__avg'] or 0
    
    # Count total reviews
    review_count = critter.reviews.count()

    context = {
        'critter': critter,
        'average_rating': round(average_rating, 1),
        'review_count': review_count,
    }
    return render(request, 'products/critter_detail.html', context)

# handles about page
def about(request):
    return render(request, 'info/about.html')

def add_review(request, critter_id):
    if request.method == "POST":
        critter = get_object_or_404(Critter, id=critter_id)
        # Simple extraction (for production, use a Django Form class!)
        rating = request.POST.get('rating')
        comment = request.POST.get('comment')
        
        Review.objects.create(
            critter=critter,
            user=request.user,
            rating=rating,
            comment=comment
        )
    return redirect('critter_detail', critter_id=critter_id)

def care_guide(request):
    return render(request, 'info/care_guide.html')

def shipping(request):
    return render(request, 'info/shipping.html')

def custom_order(request):
    return render(request, 'products/custom_order.html')

def cart_summary(request):
    # This creates the cart object and pulls data from the session
    cart = Cart(request)
    return render(request, 'products/cart.html', {'cart': cart})

def cart_add(request, critter_id):
    cart = Cart(request)
    # Get the critter from the database
    critter = get_object_or_404(Critter, id=critter_id)
    
    # Use 'product' as the keyword argument to match the Cart class
    cart.add(product=critter)
    
    # It is usually better to redirect back to where the user was
    # so they can keep shopping, but 'cart_summary' works too!
    return redirect('cart_summary')

def cart_delete(request):
    cart = Cart(request)
    if request.method == 'POST':
        # Get the ID from the hidden input field in your cart.html
        product_id = str(request.POST.get('product_id'))
        
        if product_id in cart.cart:
            del cart.cart[product_id]
            cart.save()
            
    return redirect('cart_summary')