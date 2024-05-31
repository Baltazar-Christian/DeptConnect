<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
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

        $prospect = Prospect::create($request->all());
        return response()->json($prospect, 201);
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
