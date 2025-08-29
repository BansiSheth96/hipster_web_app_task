<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);

        // Check if stock is available
        if ($product->stock <= 0) {
            return redirect()->route('customer.products.index')
                             ->with('error', 'Sorry, this product is out of stock.');
        }

        return view('customer.orders.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

         // Check stock
        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', "Only {$product->stock} items are available in stock.");
        }

        $totalPrice = $product->price * $request->quantity;

        Order::create([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        // Update stock
        $product->decrement('stock', $request->quantity);

        return redirect()->route('customer.orders.index')
                         ->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->id())
                        ->with('product')
                        ->paginate(10);
        return view('customer.orders.index', compact('orders'));
    }
}
