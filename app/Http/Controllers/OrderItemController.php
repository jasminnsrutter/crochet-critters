<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\CustomOrder;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $items = OrderItem::with('product', 'customOrder')->get();
        return view('order_items.index', compact('items'));
    }

    public function create()
    {
        $products = Product::all();
        $orders = CustomOrder::all();
        return view('order_items.create', compact('products', 'orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_order_id' => 'required|exists:custom_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderItem::create($validated);
        return redirect()->route('order_items.index')->with('success', 'Order item created!');
    }

    public function show(OrderItem $orderItem)
    {
        return view('order_items.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem)
    {
        $products = Product::all();
        $orders = CustomOrder::all();
        return view('order_items.edit', compact('orderItem', 'products', 'orders'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'custom_order_id' => 'required|exists:custom_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderItem->update($validated);
        return redirect()->route('order_items.index')->with('success', 'Order item updated!');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('order_items.index')->with('success', 'Order item deleted!');
    }
}
