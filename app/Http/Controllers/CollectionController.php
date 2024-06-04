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

        $collection = Collection::create($validatedData); $collection = Collection::create($validatedData);

        $productIds = $request->input('products');
        $prices = $request->input('prices');

        // Loop through product IDs and prices
        for ($i = 0; $i < count($productIds); $i++) {
            $collection->collectionItems()->create([
                'product_id' => $productIds[$i],
                'price' => $prices[$i],
            ]);
        }

        $collection = Collection::create($validatedData);

        $productIds = $request->input('products');
        $prices = $request->input('prices');

        // Loop through product IDs and prices
        for ($i = 0; $i < count($productIds); $i++) {
            $collection->collectionItems()->create([
                'product_id' => $productIds[$i],
                'price' => $prices[$i],
            ]);
        }


        return redirect()->route('home')->with('success', 'Collection created successfully!');
    }

    public function show( $id) // Retrieving collection by ID
    {
        $collection=Collection::where('id',$id)->first();

        return view('collection_detail', compact('collection'));
    }


    public function destroy($id) // Retrieving collection by ID
    {
        $collection=Collection::where('id',$id)->first();
        $collection->delete();
        return redirect()->route('home')->with('success', 'Collection deleted successfully!');
    }
}
