<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Browse Products</h2>

    <a href="{{ route('customer.customer_dashboard') }}"><h2>Dashboard</h2></a>

    <!-- Search -->
    <form method="GET" action="{{ route('customer.products.index') }}" class="mb-3 d-flex">
        <input type="text" 
               name="search" 
               value="{{ request('search') }}" 
               placeholder="Search products..." 
               class="form-control me-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Products Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->product_name }}" 
                                     width="80" height="80" 
                                     class="img-thumbnail">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description}}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if(Auth::guard('customer')->check())
                                @if($product->stock > 0)
                                    <a href="{{ route('customer.orders.create', $product->id) }}" class="btn btn-success btn-sm">Place Order</a>
                                @else
                                    <span class="text-danger">Out of Stock</span>
                                @endif
                            @else
                                <a href="{{ route('customer.customer_login') }}" class="btn btn-primary btn-sm">Login to Order</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
</body>
</html>
