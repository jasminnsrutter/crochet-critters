@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Request a Custom Crochet Order</h1>

<form action="/custom-orders" method="POST">
    @csrf

    <label class="block mb-2 font-semibold">Details of your request:</label>
    <textarea name="details" rows="5" class="border w-full p-2 mb-4"></textarea>

    <label class="block mb-2 font-semibold">Estimated Budget:</label>
    <input type="number" name="total_price" class="border w-full p-2 mb-4">

    <label class="block mb-2 font-semibold">Your User ID (temporary):</label>
    <input type="number" name="user_id" class="border w-full p-2 mb-4">

    <button type="submit" 
            class="px-4 py-2 bg-green-600 text-white rounded">
        Submit Request
    </button>
</form>
@endsection
