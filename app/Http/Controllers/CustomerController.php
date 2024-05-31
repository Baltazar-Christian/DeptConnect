<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  // Get all customers
  public function index()
  {
      $customers = Customer::latest()->get();
      return response()->json($customers);
  }

  // Store a new customer
  public function store(Request $request)
  {
      $validatedData = $request->validate([
          'name' => 'required|max:255',
          'email' => 'required|email|unique:customers,email',
          'phone' => 'required|numeric',
          'address' => 'required'
      ]);

      $customer = Customer::create($validatedData);
      return response()->json($customer, 201);
  }

  // Show a single customer
  public function show(Customer $customer)
  {
      return response()->json($customer);
  }

  // Update an existing customer
  public function update(Request $request, Customer $customer)
  {
      $validatedData = $request->validate([
          'name' => 'sometimes|required|max:255',
          'email' => 'sometimes|required|email|unique:customers,email,' . $customer->id,
          'phone' => 'sometimes|required|numeric',
          'address' => 'sometimes|required'
      ]);

      $customer->update($validatedData);
      return response()->json($customer);
  }

  // Delete a customer
  public function destroy(Customer $customer)
  {
      $customer->delete();
      return response()->json(null, 204);
  }
}
