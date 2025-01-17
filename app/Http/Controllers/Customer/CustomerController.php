<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        return view('customer', compact('customer'));
    }
    
    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        // Cek apakah user sudah memiliki data customer
        $existingCustomer = Customer::where('user_id', Auth::id())->first();
        
        if ($existingCustomer) {
            return redirect()->route('customer')->with('error', 'You have already submitted your information.');
        }

        return view('customer');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        try {
            Customer::updateOrCreate(
                ['user_id' => Auth::id()],
                $validated
            );

            return redirect()->route('booking');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Something went wrong! Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
