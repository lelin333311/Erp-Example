<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\SalesOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('sales.orders.index', [
            'orders' => SalesOrder::with('customer')->latest()->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('sales.orders.create', [
            'customers' => Customer::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        SalesOrder::create($request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'order_number' => ['required', 'string', 'max:80', 'unique:sales_orders'],
            'order_date' => ['required', 'date'],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'tax' => ['nullable', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:draft,confirmed,delivered,cancelled'],
        ]));

        return redirect()->route('sales.orders.index')->with('success', 'Sales order created.');
    }
}