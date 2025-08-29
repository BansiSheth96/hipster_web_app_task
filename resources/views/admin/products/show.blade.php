<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $product->product_name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Category:</strong> {{ $product->category }}</p>
            <p><strong>Price:</strong> ₹{{ number_format($product->price, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>

            @if($product->image)
                <div class="mb-3">
                    <strong>Image:</strong><br>
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="img-thumbnail" 
                         width="250">
                </div>
            @endif

            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

</body>
</html>
