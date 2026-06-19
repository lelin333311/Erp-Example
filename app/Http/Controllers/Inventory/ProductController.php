<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('inventory.products.index', [
            'products' => Product::with('warehouse')->latest()->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('inventory.products.create', [
            'warehouses' => Warehouse::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::create($request->validate([
            'warehouse_id' => ['required', 'exists:warehouses,id'],
            'sku' => ['required', 'string', 'max:80', 'unique:products'],
            'name' => ['required', 'string', 'max:160'],
            'category' => ['nullable', 'string', 'max:120'],
            'unit' => ['required', 'string', 'max:40'],
            'purchase_price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['required', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'reorder_level' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]));

        return redirect()->route('inventory.products.index')->with('success', 'Product created.');
    }
}

