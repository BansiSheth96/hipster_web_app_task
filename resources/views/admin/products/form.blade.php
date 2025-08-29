<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($product) ? 'Edit Product' : 'Create Product' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <div class="card shadow p-3">
        <h2 class="mb-4 text-center">
            {{ isset($product) ? 'Edit Product' : 'Create Product' }}
        </h2>

        <form 
            method="POST" 
            action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" 
            enctype="multipart/form-data"
        >
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" 
                       name="product_name" 
                       value="{{ old('product_name', $product->product_name ?? '') }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" 
                       step="0.01" 
                       name="price" 
                       value="{{ old('price', $product->price ?? '') }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" 
                       name="category" 
                       value="{{ old('category', $product->category ?? '') }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" 
                       name="stock" 
                       value="{{ old('stock', $product->stock ?? '') }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if(isset($product) && $product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         alt="Product Image" 
                         class="img-thumbnail mt-2" width="120">
                @endif
            </div>

            <button type="submit" class="btn btn-success w-100">
                {{ isset($product) ? 'Update' : 'Create' }}
            </button><br>
              <a href="{{ route('admin.products.index') }}" class="btn btn-secondary w-100">Back</a>
        </form>
    </div>
</div>

</body>
</html>
