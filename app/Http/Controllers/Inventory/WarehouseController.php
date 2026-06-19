<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\View\View;

class WarehouseController extends Controller
{
    public function index(): View
    {
        return view('inventory.warehouses.index', [
            'warehouses' => Warehouse::latest()->paginate(15),
        ]);
    }
}

