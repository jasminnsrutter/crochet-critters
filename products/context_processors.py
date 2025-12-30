from .cart import Cart

def cart(request):
    # Return the cart from the session so it's available everywhere
    cart = Cart(request)
    return {
        'cart': cart,
        'cart_items_count': len(cart),
        'cart_total_price': cart.get_total_price()
    }