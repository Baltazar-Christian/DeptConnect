@extends('layouts.master')

@section('title')
View Collection
@endsection

@section('content')
<h1>Collection Details</h1>

<div class="card">
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">Customer Name: {{ $collection->customer_name }}</li>
            <li class="list-group-item">Purchase Date: {{ $collection->purchase_date }}</li>
            <li class="list-group-item">Total Amount: {{ $collection->total_amount }}</li>
            <li class="list-group-item">EFD Number: {{ $collection->efd_number }}</li>
            <li class="list-group-item">Installment Plan: {{ $collection->installment_plan }}</li>
            <li class="list-group-item">Guarantor Name: {{ $collection->guarantor_name }}</li>
            <li class="list-group-item">Guarantor Phone: {{ $collection->guarantor_phone }}</li>
            <li class="list-group-item">Office Location: {{ $collection->office_location }}</li>
            <li class="list-group-item">Home Location: {{ $collection->home_location }}</li>
            <li class="list-group-item">Plot Number: {{ $collection->plot_number }}</li>
            <li class="list-group-item">Second Kin Name: {{ $collection->kin_name }}</li>
            <li class="list-group-item">Second Kin Phone: {{ $collection->kin_phone }}</li>
            <li class="list-group-item">HR Name: {{ $collection->hr_name }}</li>
            <li class="list-group-item">HR Phone: {{ $collection->hr_phone }}</li>


           <li class="list-group-item">Branch Name: {{ $collection->branch_name }}</li>
            <li class="list-group-item">Company Name: {{ $collection->company_name }}</li>
        </ul>
        <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-primary">Edit</a>
    </div>
</div>

@endsection
