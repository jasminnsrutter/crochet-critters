from decimal import Decimal

class Cart:
    def __init__(self, request):
        """Initialize the cart."""
        self.session = request.session
        cart = self.session.get('cart')
        if not cart:
            # Save an empty cart in the session
            cart = self.session['cart'] = {}
        self.cart = cart

    def add(self, product, quantity=1, override_quantity=False):
        """Add a product to the cart or update its quantity."""
        product_id = str(product.id)
        if product_id not in self.cart:
            self.cart[product_id] = {
                'quantity': 0,
                'price': str(product.price),
                'name': product.name,
                'image': product.image.url if product.image else ''
            }
        
        if override_quantity:
            self.cart[product_id]['quantity'] = quantity
        else:
            self.cart[product_id]['quantity'] += quantity
        self.save()

    def save(self):
        # Mark the session as "modified" to make sure it gets saved
        self.session.modified = True

    def __iter__(self):
        """Loop through the items in the cart."""
        for item in self.cart.values():
            item['total_price'] = Decimal(item['price']) * item['quantity']
            yield item

    def __len__(self):
        """Count all items in the cart."""
        return sum(item['quantity'] for item in self.cart.values())

    def get_total_price(self):
        return sum(Decimal(item['price']) * item['quantity'] for item in self.cart.values())