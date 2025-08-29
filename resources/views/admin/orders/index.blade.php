<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>All Customer Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.admin_dashboard') }}"><h2>Dashboard</h2></a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->c_name ?? 'N/A' }}</td>
                    <td>
                        @if($order->product->image)
                            <img src="{{ asset('storage/'.$order->product->image) }}" width="60" alt="{{ $order->product->product_name }}">
                        @else
                            <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image">
                        @endif
                    </td>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->product->description ?? 'N/A' }}</td>
                    <td>{{ $order->product->category ?? 'N/A' }}</td>
                    <td>{{ number_format($order->product->price) }}</td>
                    <td>{{ $order->product->stock }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->total_price) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex">
                            @csrf
                            <select name="status" class="form-select form-select-sm me-2">
                                <option value="pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $orders->links() }}
    </div>
</div>
</body>
</html>
