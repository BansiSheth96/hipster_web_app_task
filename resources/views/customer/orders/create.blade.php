<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Place Order: {{ $product->product_name }}</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mb-4">
        <!-- Product Image -->
        <div class="col-md-4">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->product_name }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x300?text=No+Image" alt="No Image" class="img-fluid rounded">
            @endif
        </div>

        <!-- Product Details -->
        <div class="col-md-8">
            <p><strong>Category:</strong> {{ $product->category ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description' }}</p>
            <p><strong>Price:</strong> ₹{{ number_format($product->price, 2) }}</p>
            <p><strong>Stock:</strong> 
                @if($product->stock > 0)
                    <span class="text-success">{{ $product->stock }} available</span>
                @else
                    <span class="text-danger">Out of stock</span>
                @endif
            </p>
        </div>
    </div>

    @if($product->stock > 0)
        <form method="POST" action="{{ route('customer.orders.store') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="mb-3">
                <label>Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="1" required>
            </div>

            <button type="submit" class="btn btn-success">Place Order</button>
        </form>
    @else
        <p class="text-danger">This product is currently out of stock.</p>
    @endif
    <a href="{{ route('customer.products.index') }}" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
