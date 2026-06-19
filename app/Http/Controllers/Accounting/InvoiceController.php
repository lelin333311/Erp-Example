<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View
    {
        return view('accounting.invoices.index', [
            'invoices' => Invoice::latest()->paginate(15),
        ]);
    }
}

