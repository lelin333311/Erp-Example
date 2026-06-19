<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ERP Software') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="erp-body">
    <aside class="erp-sidebar">
        <div class="erp-logo">ERP</div>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('hr.employees.index') }}">HR</a>
            <a href="{{ route('inventory.products.index') }}">Inventory</a>
            <a href="{{ route('procurement.suppliers.index') }}">Procurement</a>
            <a href="{{ route('sales.orders.index') }}">Sales</a>
            <a href="{{ route('crm.customers.index') }}">CRM</a>
            <a href="{{ route('accounting.invoices.index') }}">Accounting</a>
            <a href="{{ route('reports.index') }}">Reports</a>
        </nav>
    </aside>

    <main class="erp-main">
        <header class="erp-topbar">
            <h1>@yield('title', 'Dashboard')</h1>
            <div class="erp-user">Admin</div>
        </header>

        @if (session('success'))
            <div class="erp-alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>

