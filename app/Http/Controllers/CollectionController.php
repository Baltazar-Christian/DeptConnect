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
        $collections = Collection::all();
        return view('collections', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collection_form');
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

    public function show(Collection $collection) // Retrieving collection by ID
    {
        return view('collection_detail', compact('collection'));
    }


    public function destroy($id) // Retrieving collection by ID
    {
        $collection=Collection::where('id',$id)->first();
        $collection->delete();
        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully!');
    }
}
