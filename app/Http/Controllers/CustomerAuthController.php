<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function showCustomerLoginForm()
    {
        return view('customer.customer_login');
    }

    public function customerLogin(Request $request)
    {
        if (Auth::guard('customer')->attempt($request->only('c_email', 'password'))) {
            return redirect()->route('customer.customer_dashboard');
        }
        return back()->with('error', 'Invalid credentials');
    }

     public function showCustomerRegisterForm()
    {
        return view('customer.customer_register');
    }

    public function customerRegister(Request $request)
    {
        $request->validate([
            'c_name'     => 'required|string|max:255',
            'c_email'    => 'required|string|email|unique:customers',
            'c_mobile_no'=> 'required|digits:10',
            'password'   => 'required|min:6',
        ]);

        $customer = Customer::create([
            'c_name'     => $request->c_name,
            'c_email'    => $request->c_email,
            'c_mobile_no'=> $request->c_mobile_no,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('customer.customer_dashboard');
    }

    public function showCustomerDashboard()
    {
        return view('customer.customer_dashboard');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.customer_login');
    }
}
