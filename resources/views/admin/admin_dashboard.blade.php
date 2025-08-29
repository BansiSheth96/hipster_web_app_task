<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="ms-auto">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card shadow-lg p-4">
            <h2>Welcome, <span class="text-primary">{{ Auth::guard('admin')->user()->name }}</span></h2>
            <p class="mt-3">This is your admin dashboard. You can manage users, customers, or anything you want here.</p>
        </div>

        <a href="{{ route('admin.products.index') }}"><h2>Manage Products</h2></a>
    </div>

</body>
</html>
