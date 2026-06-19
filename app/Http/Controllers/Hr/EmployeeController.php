<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('hr.employees.index', [
            'employees' => Employee::with('department')->latest()->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('hr.employees.create', [
            'departments' => Department::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Employee::create($request->validate([
            'department_id' => ['required', 'exists:departments,id'],
            'employee_code' => ['required', 'string', 'max:50', 'unique:employees'],
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:120', 'unique:employees'],
            'phone' => ['nullable', 'string', 'max:40'],
            'designation' => ['nullable', 'string', 'max:120'],
            'joining_date' => ['nullable', 'date'],
            'salary' => ['nullable', 'numeric', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]));

        return redirect()->route('hr.employees.index')->with('success', 'Employee created.');
    }
}

