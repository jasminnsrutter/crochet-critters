<!DOCTYPE html>
<html>
<head>
    <title>Crochet Critters</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="p-6">
    <nav class="mb-6">
        <a href="/" class="mr-4 text-blue-600 underline">Home</a>
        <a href="/products" class="mr-4 text-blue-600 underline">Products</a>
        <a href="/categories" class="mr-4 text-blue-600 underline">Categories</a>
        <a href="/custom-orders/create" class="text-blue-600 underline">Custom Order</a>
    </nav>

    @yield('content')
</body>
</html>
