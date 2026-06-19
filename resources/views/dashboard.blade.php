@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="erp-grid">
        <article class="erp-card">
            <span>Total Employees</span>
            <strong>{{ $totalEmployees }}</strong>
        </article>
        <article class="erp-card">
            <span>Total Customers</span>
            <strong>{{ $totalCustomers }}</strong>
        </article>
        <article class="erp-card">
            <span>Total Products</span>
            <strong>{{ $totalProducts }}</strong>
        </article>
        <article class="erp-card">
            <span>Recent Orders</span>
            <strong>{{ $recentOrders->count() }}</strong>
        </article>
    </section>

    <section class="erp-panel">
        <h2>Recent Sales Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentOrders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ number_format($order->total, 2) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

