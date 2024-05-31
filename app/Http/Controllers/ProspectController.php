<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Prospect;
use App\Models\ProspectItem;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index()
    {
        $prospects = Prospect::with(['items', 'installments'])->get();
        return response()->json($prospects);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array',
            'payment_amount' => 'required|numeric',
            'installment_plan' => 'required|int',
            'credit_form_url' => 'nullable|url',
            'prospect_type' => 'required|string',
            'paid_amount' => 'nullable|numeric',
            'status' => 'required|string',
            'payment_deadline' => 'required|date',
        ]);

        $prospect = Prospect::create($validated);

        // Handle the multiple products
        foreach ($validated['products'] as $productId) {
            $product = Product::find($productId);
            if (!$product) {
                return response()->json(['message' => 'Product not found', 'product_id' => $productId], 404);
            }

            // Assume quantity is 1 for now; adjust as needed if your form sends quantity data
            $price = $product->price;
            $totalPayment = $price; // Modify this calculation as needed

            ProspectItem::create([
                'prospect_id' => $prospect->id,
                'product_id' => $productId,
                'price' => $price,
                'total_payment' => $totalPayment
            ]);
        }

        return response()->json(['message' => 'Prospect saved successfully', 'prospect' => $prospect], 201);
    }

    public function update(Request $request, Prospect $prospect)
    {
        $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'payment_amount' => 'required|numeric',
            'installment_plan' => 'required|integer',
            'credit_form_url' => 'nullable|url',
            'prospect_type' => 'required|in:presentation,cash,credit',
            'paid_amount' => 'required|numeric',
            'status' => 'required|in:presentation,unpaid,full paid,partially paid',
            'payment_deadline' => 'required|date',
        ]);

        $prospect->update($request->all());
        return response()->json($prospect);
    }

    public function destroy(Prospect $prospect)
    {
        $prospect->delete();
        return response()->json(null, 204);
    }
}
