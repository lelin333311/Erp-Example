<?php

use App\Http\Controllers\Accounting\ExpenseController;
use App\Http\Controllers\Accounting\InvoiceController;
use App\Http\Controllers\Crm\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Hr\DepartmentController;
use App\Http\Controllers\Hr\EmployeeController;
use App\Http\Controllers\Inventory\ProductController;
use App\Http\Controllers\Inventory\WarehouseController;
use App\Http\Controllers\Procurement\PurchaseOrderController;
use App\Http\Controllers\Procurement\SupplierController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\Sales\OrderController;
use App\Http\Controllers\Settings\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');

Route::prefix('hr')->name('hr.')->group(function () {
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
});

Route::prefix('inventory')->name('inventory.')->group(function () {
    Route::resource('warehouses', WarehouseController::class);
    Route::resource('products', ProductController::class);
});

Route::prefix('procurement')->name('procurement.')->group(function () {
    Route::resource('suppliers', SupplierController::class);
    Route::resource('purchase-orders', PurchaseOrderController::class);
});

Route::prefix('sales')->name('sales.')->group(function () {
    Route::resource('orders', OrderController::class);
});

Route::prefix('crm')->name('crm.')->group(function () {
    Route::resource('customers', CustomerController::class);
});

Route::prefix('accounting')->name('accounting.')->group(function () {
    Route::resource('invoices', InvoiceController::class);
    Route::resource('expenses', ExpenseController::class);
});

Route::get('reports', ReportController::class)->name('reports.index');
Route::resource('settings/company', CompanyController::class)->only(['index', 'update']);

