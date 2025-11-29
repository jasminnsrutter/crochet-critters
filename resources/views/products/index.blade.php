@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">All Products</h1>

<div class="grid grid-cols-3 gap-4">
@foreach ($products as $product)
    <div class="border p-4 rounded">
        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>

        @if($product->images->first())
            <img src="{{ asset('storage/' . $product->images->first()->path) }}" 
                 class="w-32 h-32 object-cover mt-2">
        @endif

        <p class="mt-2">${{ number_format($product->price, 2) }}</p>

        <a href="/products/{{ $product->id }}" 
           class="text-blue-600 underline mt-3 inline-block">View Details</a>
    </div>
@endforeach
</div>
@endsection
