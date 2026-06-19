<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        return view('hr.departments.index', [
            'departments' => Department::latest()->paginate(15),
        ]);
    }
}

