<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bulk Product Import</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5 bg-light">

    <div class="container">
        <h2 class="mb-4"><center>Bulk Product Import</center></h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="file" class="form-label">Upload CSV/Excel File:</label>
                <input type="file" name="csv" id="file" class="form-control" required>
                <div class="form-text">Allowed formats: .csv, .xlsx</div>
            </div>

            <button type="submit" class="btn btn-primary">Start Import</button>
            <a href="{{ asset('storage/products_sample_import.csv') }}" class="btn btn-secondary" onclick="alert('CSV downloaded successfully!')">Download Sample CSV</a>
        </form>
         <a href="{{ route('admin.admin_dashboard') }}"><h2>Dashboard</h2></a>
    </div>

</body>
</html>
