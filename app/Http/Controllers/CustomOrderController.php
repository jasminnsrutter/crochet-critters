<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use App\Models\User;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function index()
    {
        $orders = CustomOrder::with('user')->get();
        return view('custom_orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('custom_orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'details' => 'required|string',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        CustomOrder::create($validated);
        return redirect()->route('custom_orders.index')->with('success', 'Order created!');
    }

    public function show(CustomOrder $customOrder)
    {
        return view('custom_orders.show', compact('customOrder'));
    }

    public function edit(CustomOrder $customOrder)
    {
        $users = User::all();
        return view('custom_orders.edit', compact('customOrder', 'users'));
    }

    public function update(Request $request, CustomOrder $customOrder)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'details' => 'required|string',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $customOrder->update($validated);
        return redirect()->route('custom_orders.index')->with('success', 'Order updated!');
    }

    public function destroy(CustomOrder $customOrder)
    {
        $customOrder->delete();
        return redirect()->route('custom_orders.index')->with('success', 'Order deleted!');
    }
}
