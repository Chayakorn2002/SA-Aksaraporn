@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Order Total</th>
                    <th>Order Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('m/d/Y') }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
