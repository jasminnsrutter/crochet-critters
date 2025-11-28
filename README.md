A Laravel-powered product showcase for crocheted plushies, built with Filament, Puck page builder, and custom user history tracking.

This project functions like a simple ecommerce catalog (no payments). Users can browse crocheted animals, view product details, and explore custom Puck-powered pages. Admins can manage products, categories, and page content through a Filament-based dashboard.

---

## 🚀 Tech Stack

**Backend:**  
- Laravel 11  
- PHP 8.2+  
- MySQL / MariaDB  

**Admin Panel:**  
- FilamentPHP  

**Page Builder:**  
- Puck  

**Frontend:**  
- Blade + Tailwind CSS  

**Other:**  
- Custom middleware for user browsing history  

---

## 📁 Project Structure

```

app/
Http/Controllers/ProductController.php
Http/Middleware/LogProductView.php
Models/Product.php
Models/Category.php
Models/ProductImage.php
Models/UserHistory.php

database/
migrations/
seeders/
CategorySeeder.php
ProductSeeder.php
ProductImageSeeder.php

resources/views/products/
index.blade.php
show.blade.php

routes/web.php

filament/Resources/
ProductResource.php
CategoryResource.php
ProductImageResource.php

puck/
(custom page blocks)

````

---

## 🛠️ Installation

```bash
git clone https://github.com/your-username/crochet-critters.git
cd crochet-critters
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
````

Update `.env` with your database credentials.

---

## 🗄️ Migrations & Seeders

```bash
php artisan migrate --seed
```

Seeders include:

* demo categories
* sample crocheted animals
* product image samples

---

## 🔧 Development Server

```bash
php artisan serve
```

---

## 📜 License

This project is open-source under the **MIT License**.
