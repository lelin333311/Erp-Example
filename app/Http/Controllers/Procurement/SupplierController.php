<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(): View
    {
        return view('procurement.suppliers.index', [
            'suppliers' => Supplier::latest()->paginate(15),
        ]);
    }
}

