<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where('product_name', 'like', '%' . $request->search . '%')
                   ->orWhere('price', 'like', '%' . $request->search . '%')
                   ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        // Pagination (10 products per page)
        $products = $query->paginate(10)->withQueryString();

        return view('customer.products.index', compact('products'));
    }
}
