<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Product;
use App\Models\SalesOrder;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'totalEmployees' => Employee::count(),
            'totalCustomers' => Customer::count(),
            'totalProducts' => Product::count(),
            'recentOrders' => SalesOrder::latest()->limit(8)->get(),
        ]);
    }
}

