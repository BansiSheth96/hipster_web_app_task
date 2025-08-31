<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1><center>Products List</center></h1>

    @if(session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.admin_dashboard') }}"><h2>Dashboard</h2></a>

    <a href="{{ route('admin.products.create') }}"><b><h3>Create New Product</h3></b></a><br>

    <table border="10" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                     <td> 
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" width="150">
                        @endif
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}">
                            <button>View</button>
                        </a>

                        <a href="{{ route('admin.products.edit', $product->id) }}">
                            <button>Edit</button>
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center mt-3">
         {{ $products->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>
