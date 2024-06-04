@extends('layouts.master')

@section('title')
Collections List
@endsection

@section('content')
<h1>Collections</h1>

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Purchase Date</th>
            <th>Total Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collections as $collection)
        <tr>
            <td>{{ $collection->customer_name }}</td>
            <td>{{ $collection->purchase_date }}</td>
            <td>{{ $collection->total_amount }}</td>
            <td>
                <a href="{{ route('collections.show', $collection->id) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" style="display: inline-line">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection


