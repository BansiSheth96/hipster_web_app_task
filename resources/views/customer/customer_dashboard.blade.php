<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="#">Customer Dashboard</a>
        <div class="ms-auto">
            <form method="POST" action="{{ route('customer.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card shadow-lg p-4">
            <h2>Welcome, <span class="text-primary">{{ Auth::guard('customer')->user()->c_name }}</span></h2>
            <p class="mt-3">Welocome to dashboard. You can view products, orders..</p>
        </div>
        <a href="{{ route('customer.products.index') }}"><h2>Browse Products</h2></a>
        <a href="{{ route('customer.orders.index') }}"><h2>Your Order Details</h2></a>
    </div>
</body>
</html>
