<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use Illuminate\View\View;

class PurchaseOrderController extends Controller
{
    public function index(): View
    {
        return view('procurement.purchase-orders.index', [
            'orders' => PurchaseOrder::with('supplier')->latest()->paginate(15),
        ]);
    }
}

