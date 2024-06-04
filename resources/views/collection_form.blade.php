@extends('layouts.master')
@section('title')
Collection  Form
@endsection

@section('content')

<div class="modal1" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProspectModalLabel">Prospect Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display prospect details here -->
                <div class="form-group">
                    <label for="show_customer_name">Customer Name:</label>
                    <p id="show_customer_name"></p>
                </div>
                <div class="form-group">
                    <label for="show_products">Products:</label>
                    <p id="show_products"></p>
                </div>
                <div class="form-group">
                    <label for="show_payment_amount">Payment Amount:</label>
                    <p id="show_payment_amount"></p>
                </div>
                <div class="form-group">
                    <label for="show_installment_plan">Installment Plan:</label>
                    <p id="show_installment_plan"></p>
                </div>
                <div class="form-group">
                    <label for="show_credit_form_url">Credit Form URL:</label>
                    <p id="show_credit_form_url"></p>
                </div>
                <div class="form-group">
                    <label for="show_prospect_type">Prospect Type:</label>
                    <p id="show_prospect_type"></p>
                </div>
                <div class="form-group">
                    <label for="show_paid_amount">Paid Amount:</label>
                    <p id="show_paid_amount"></p>
                </div>
                <div class="form-group">
                    <label for="show_status">Status:</label>
                    <p id="show_status"></p>
                </div>
                <div class="form-group">
                    <label for="show_payment_deadline">Payment Deadline:</label>
                    <p id="show_payment_deadline"></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
