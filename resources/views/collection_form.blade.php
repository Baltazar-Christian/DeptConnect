@extends('layouts.master')
@section('title')
Collection  Form
@endsection

@section('content')

<div class="container" >
    <div class="col-md-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProspectModalLabel">Collection Form</h5>
                <a href="{{ url('home') }}" class="btn  btn-primary float-right">Back</a>
            </div>
            <div class="modal-body">
                <!-- Display prospect details here -->
                <form action="{{ route('collection-save') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="customer_name"> Customer Name</label>
                                <input type="text" placeholder="Customer Name" class="form-control" id="customer_name" name="customer_name" required>
                            </div>
                            <div class="form-group col-md-6" >
                                <label for="purchase_date"> Purchase Date</label>
                                <input type="date" placeholder="Purchase Date" class="form-control" id="purchase_date" name="purchase_date" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="total_amount">  Total Amount</label>
                                <input type="number" placeholder="Total Amount" class="form-control" id="total_amount" name="total_amount" required>
                            </div>
                            <div class="form-group col-md-6" >
                                <label for="efd_number"> EFD Number</label>
                                <input type="text" placeholder="EFD Number"  class="form-control" id="efd_number" name="efd_number" required>
                            </div>
                        </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                        <label for="installment_plan">Installment  (Per Month)</label>
                        <input type="number" class="form-control" placeholder="Installment Per Month" id="installment_plan" name="installment_plan" required>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="guarantor_name">Guarantor Name</label>
                        <input type="text" class="form-control" placeholder="Guarantor Name" id="guarantor_name" name="guarantor_name" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                        <label for="guarantor_phone">Guarantor Phone</label>
                        <input type="text" class="form-control" placeholder="Guarantor Phone" id="guarantor_phone" name="guarantor_phone" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="office_location">Office Location</label>
                        <input type="text" class="form-control" placeholder="Office Location" id="office_location" name="office_location" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="office_location">Home Location</label>
                        <input type="text" class="form-control" placeholder="Home Location" id="home_location" name="home_location" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="plot_number">Plot Number</label>
                        <input type="text" class="form-control" placeholder="Plot Number" id="plot_number" name="plot_number" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="office_location">Name (Second Kin)</label>
                        <input type="text" class="form-control" placeholder="Second Kin Name" id="kin_name" name="kin_name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="office_location">Phone (Second Kin)</label>
                        <input type="text" class="form-control" placeholder="Second Kin Phone" id="kin_phone" name="kin_phone" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="office_location">HR Name</label>
                        <input type="text" class="form-control" placeholder="HR Name" id="hr_name" name="hr_name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="office_location">HR Phone</label>
                        <input type="text" class="form-control" placeholder="HR Phone" id="hr_phone" name="hr_phone" required>
                    </div>
                  </div>




                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="branch_name"> Branch Name</label>
                                <small><b> *For Bank Customers</b></small>
                                <input type="text" placeholder="Branch Name" class="form-control" id="branch_name" name="branch_name" required>
                            </div>
                            <div class="form-group col-md-6" >
                                <label for="company_name"> Company Name</label>
                                <input type="text" placeholder="Company Name" class="form-control" id="company_name" name="company_name" required>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <h5> <i class="fa fa-list"></i> Products</h5>
                        <button type="button" class="btn btn-primary " id="add-product-item">Add Another Product</button>
<hr>
                    </div>

                    <div id="product-items">
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <label for="products[]" class="form-label">Product</label>

                                <select name="products[]" class="form-control product-select">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="prices[]" class="form-label">Price</label>

                                <input type="number" name="prices[]" class="form-control product-price" placeholder="Price" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="btn" class="form-label">Action</label>
                                <br>
                                <button type="button" id="btn" class="btn btn-danger remove-product-item"><i class="fas fa-minus-circle"></i></button>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Clo   se</button> --}}
                        <button type="submit" class="btn btn-primary">Save Collection</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var productItemsWrapper = $('#product-items');
        var maxProductItems = 5; // Adjust as needed

        $('#add-product-item').click(function() {
            if (productItemsWrapper.children().length < maxProductItems) {
                var newProductItem = productItemsWrapper.children().first().clone();
                newProductItem.find('select').val('');
                newProductItem.find('input[type="number"]').val('');
                productItemsWrapper.append(newProductItem);
            } else {
                alert('Maximum ' + maxProductItems + ' products allowed.');
            }
        });

        productItemsWrapper.on('click', '.remove-product-item', function() {
            $(this).closest('.form-group.row').remove();
        });
    });
    </script>

@endsection
