<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    public function index(): View
    {
        return view('accounting.expenses.index', [
            'expenses' => Expense::latest()->paginate(15),
        ]);
    }
}

