<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>My Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('customer.products.index') }}" class="btn btn-secondary">Back</a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Current Stock</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
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
                    <td>
                        @if($order->product->stock > 0)
                            {{ $order->product->stock }}
                        @else
                            <span class="text-danger">Out of stock</span>
                        @endif
                    </td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->total_price) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No orders placed yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
</body>
</html>
