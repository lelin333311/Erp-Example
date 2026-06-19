<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('crm.customers.index', [
            'customers' => Customer::latest()->paginate(15),
        ]);
    }
}

