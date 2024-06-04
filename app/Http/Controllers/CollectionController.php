<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{


    public function index()
    {
        $collections = Collection::latest()->get();
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

        $collection = Collection::create($validatedData);

        $productIds = array_filter($request->input('products'), function ($productId) use ($collection) {
            return Product::find($productId) !== null; // Check if product ID exists
        });

        $prices = array_slice($request->input('prices'), 0, count($productIds)); // Adjust price array based on filtered IDs


        // Loop through product IDs and pricesuse App\Models\Product;
        for ($i = 0; $i < count($productIds); $i++) {
            $collectionItem=new CollectionItem();
            $collectionItem->collection_id=$collection->id;
            $collectionItem->product_id=$productIds[$i];
            $collectionItem->price=$prices[$i];
            $collectionItem->save();
        }

        return redirect()->route('home')->with('success', 'Collection created successfully!');
    }

    public function show( $id) // Retrieving collection by ID
    {
        $collection=Collection::where('id',$id)->first();
        $products=CollectionItem::where('collection_id',$id)->get();

        return view('collection_detail', compact('collection','products'));
    }


    public function destroy($id) // Retrieving collection by ID
    {
        $collection=Collection::where('id',$id)->first();
        $collection->delete();
        return redirect()->route('home')->with('success', 'Collection deleted successfully!');
    }
}
