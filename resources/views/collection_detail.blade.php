@extends('layouts.master')

@section('title')
View Collection
@endsection

@section('content')

<div class="mb-3">
    <h5>Collection Details</h5>
    <a href="{{ url('home') }}" class="btn  btn-primary ">Back</a>

</div>
<div class="card">

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-sm-6">
              <ul class="list-group">
                <li class="list-group-item">Customer Name: {{ $collection->customer_name }}</li>
                <li class="list-group-item">Total Amount: {{ $collection->total_amount }}</li>
                <li class="list-group-item">EFD Number: {{ $collection->efd_number }}</li>
                <li class="list-group-item">Installment Plan: {{ $collection->installment_plan }}</li>
                <li class="list-group-item">Guarantor Name: {{ $collection->guarantor_name }}</li>
                <li class="list-group-item">Guarantor Phone: {{ $collection->guarantor_phone }}</li>
                <li class="list-group-item">Office Location: {{ $collection->office_location }}</li>
                <li class="list-group-item">Home Location: {{ $collection->home_location }}</li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="list-group">
                 <li class="list-group-item">Purchase Date: {{ $collection->purchase_date }}</li>
                <li class="list-group-item">Second Kin Name: {{ $collection->kin_name }}</li>
                <li class="list-group-item">Second Kin Phone: {{ $collection->kin_phone }}</li>
                <li class="list-group-item">HR Name: {{ $collection->hr_name }}</li>
                <li class="list-group-item">HR Phone: {{ $collection->hr_phone }}</li>
                <li class="list-group-item">Branch Name: {{ $collection->branch_name }}</li>
                <li class="list-group-item">Company Name: {{ $collection->company_name }}</li>
                <li class="list-group-item">Plot Number: {{ $collection->plot_number }}</li>
              </ul>
            </div>
          </div>

        <h5> <i class="fa fa-list text-primary"></i> Products</h5>
        <hr>
        @if ($products->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>  <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No products associated with this collection.</p>
        @endif

        {{-- <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-primary">Edit</a> --}}
    </div>
</div>

@endsection
