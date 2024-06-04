<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $data['customers']=Customer::latest()->get();
        $data['products']=Product::latest()->get();
        return view('collection_form',$data);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'efd_number' => 'required',
            'installment_plan' => 'required|numeric',
            'guarantor_name' => 'required',
            'guarantor_phone' => 'required',
            'office_location' => 'required',
            'home_location' => 'required',
            'plot_number' => 'required',
            'kin_name' => 'required',
            'kin_phone' => 'required',
            'hr_name' => 'required',
            'hr_phone' => 'required',
            'branch_name' => 'nullable',
            'company_name' => 'required',
        ]);

        $collection = Collection::create($validatedData);

        return redirect()->route('collections.index')->with('success', 'Collection created successfully!');
    }

}
