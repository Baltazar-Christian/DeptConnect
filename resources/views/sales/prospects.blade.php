
<div class=" mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title">
                        <i class="io io-list"></i> Prospects List
                    </div>
                    <button class="btn btn-primary float-right" onclick="showAddModal()">Add New Prospect</button>
                </div>
                <div class="table-responsive-md">
                    <table data-table="true" class="table table-actions table-bordered table-striped table-hover mb-0" id="prospectsTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Payment Amount</th>
                                <th scope="col">Installment Plan</th>
                                <th scope="col">Credit Form URL</th>
                                <th scope="col">Prospect Type</th>
                                <th scope="col">Paid Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Payment Deadline</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="prospectsBody">
                            <!-- Data will be loaded here by jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        #prospectModal .select2-container--default .select2-selection--single,
        #prospectModal .select2-container--default .select2-selection--multiple {
            width: 100%!important; /* Forces the select2 dropdown to take full width of the form-group */
        }
        </style>
   <!-- Prospect Modal -->
<div class="modal fade" id="prospectModal" tabindex="-1" aria-labelledby="prospectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prospectModalLabel">Manage Prospect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="prospectForm">
                <div class="modal-body">
                    <input type="hidden" id="prospect_id" name="prospect_id">
                    {{-- <input type="hidden" id="prospect_id" name="prospect_id"> --}}

                    <div class="row"> <!-- Ensure there is a row wrapper for proper alignment -->
                        <div class="form-group col-md-12" style="width:100% !important;">
                            <label for="prospect_customer_id">Customer</label>
                            <select class="form-control select2" id="prospect_customer_id" name="customer_id" required>
                                <!-- Customer options will be loaded here -->
                            </select>
                        </div>
                        <div class="form-group col-md-12
                        ">
                            <label for="prospect_products">Products</label>
                            <select class="form-control select2" id="prospect_products" name="products[]" multiple="multiple">
                                <!-- Product options will be loaded here -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payment_amount">Payment Amount</label>
                        <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
                    </div>
                    <div class="form-group">
                        <label for="installment_plan">Installment Plan (Number of Payments)</label>
                        <input type="number" class="form-control" id="installment_plan" name="installment_plan" required>
                    </div>
                    <div class="form-group">
                        <label for="credit_form_url">Credit Form URL</label>
                        <input type="url" class="form-control" id="credit_form_url" name="credit_form_url">
                    </div>
                    <div class="form-group">
                        <label for="prospect_type">Prospect Type</label>
                        <select class="form-control" id="prospect_type" name="prospect_type">
                            <option value="presentation">Presentation</option>
                            <option value="cash">Cash</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="paid_amount">Paid Amount</label>
                        <input type="number" class="form-control" id="paid_amount" name="paid_amount">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="presentation">Presentation</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="full paid">Full Paid</option>
                            <option value="partially paid">Partially Paid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_deadline">Payment Deadline</label>
                        <input type="date" class="form-control" id="payment_deadline" name="payment_deadline" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Prospect</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

{{-- <script src=" {{ asset('js/prospectManagement.js') }} "></script> --}}
<script>
    $(document).ready(function() {
        // Initialize Select2 inside the modal
        $('#prospectModal .select2').select2({
            dropdownParent: $('#prospectModal')
        });

        // Fetch initial data when the document is ready
        fetchCustomersForProspects();
        fetchProductsForProspects();
        fetchProspects();

        // Form submission for adding or updating prospects
        $('#prospectForm').submit(function(e) {
            e.preventDefault();
            var formData = gatherFormData();
            var prospectId = $('#prospect_id').val();
            var url = prospectId ? `/prospects/${prospectId}` : '/prospects';
            var method = prospectId ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function(response) {
                    $('#prospectModal').modal('hide');
                    Swal.fire('Success', 'Prospect data saved successfully!', 'success');
                    resetProspectForm();
                    fetchProspects();
                },
                error: function(xhr) {
                    var message = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Failed to save prospect data.';
                    Swal.fire('Error', message, 'error');
                }
            });
        });
    });

    // Reset and prepare the form for a new entry or edit
    function resetProspectForm() {
        $('#prospectForm')[0].reset();
        $('#prospect_customer_id, #prospect_products').val(null).trigger('change');
    }

    function gatherFormData() {
        return {
            customer_id: $('#prospect_customer_id').val(),
            products: $('#prospect_products').val(),
            payment_amount: $('#payment_amount').val(),
            installment_plan: $('#installment_plan').val(),
            credit_form_url: $('#credit_form_url').val(),
            prospect_type: $('#prospect_type').val(),
            paid_amount: $('#paid_amount').val(),
            status: $('#status').val(),
            payment_deadline: $('#payment_deadline').val()
        };
    }

    // Fetching prospects and populating the table
    function fetchProspects() {
        $.ajax({
            url: '/prospects',
            method: 'GET',
            success: function(data) {
                var tableBody = $('#prospectsBody');
                tableBody.empty();
                data.forEach(function(prospect) {
                    var customerName = prospect.customer ? prospect.customer.name : 'No Customer'; // Handle null case

                    tableBody.append(
                        `<tr>
                            <td>${new Date(prospect.created_at).toLocaleDateString()}</td>
                            <td>${customerName}</td>
                            <td>${prospect.payment_amount}</td>
                            <td>${prospect.installment_plan}</td>
                            <td><a href="${prospect.credit_form_url}" target="_blank">View Form</a></td>
                            <td>${prospect.prospect_type}</td>
                            <td>${prospect.paid_amount}</td>
                            <td>${prospect.status}</td>
                            <td>${new Date(prospect.payment_deadline).toLocaleDateString()}</td>
                            <td>
                                <button onclick="editProspect(${prospect.id})"class="btn btn-info btn-sm">Edit</button>
                                <button onclick="deleteProspect(${prospect.id})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>`
                    );
                });
            },
            error: function(error) {
                console.log('Error fetching prospects:', error);
            }
        });
    }

    // Load customer data for the select2 dropdown
    function fetchCustomersForProspects() {
        $.ajax({
            url: '/customers',
            method: 'GET',
            success: function(data) {
                var options = '<option value="">Select a Customer</option>';
                data.forEach(function(customer) {
                    options += `<option value="${customer.id}">${customer.name}</option>`;
                });
                $('#prospect_customer_id').html(options);
            }
        });
    }

    // Load product data for the select2 dropdown
    function fetchProductsForProspects() {
        $.ajax({
            url: '/products',
            method: 'GET',
            success: function(data) {
                var options = '';
                data.forEach(function(product) {
                    options += `<option value="${product.id}">${product.name} - ${product.price}</option>`;
                });
                $('#prospect_products').html(options);
            }
        });
    }

    // Editing a prospect
    window.editProspect = function(id) {
        $.ajax({
            url: `/prospects/${id}`,
            method: 'GET',
            success: function(prospect) {
                $('#prospect_id').val(prospect.id);
                $('#prospect_customer_id').val(prospect.customer_id).trigger('change');
                $('#prospect_products').val(prospect.products.map(product => product.id)).trigger('change');
                $('#payment_amount').val(prospect.payment_amount);
                $('#installment_plan').val(prospect.installment_plan);
                $('#credit_form_url').val(prospect.credit_form_url);
                $('#prospect_type').val(prospect.prospect_type);
                $('#paid_amount').val(prospect.paid_amount);
                $('#status').val(prospect.status);
                $('#payment_deadline').val(prospect.payment_deadline);
                $('#prospectModalLabel').text('Edit Prospect');
                $('#prospectModal').modal('show');
            },
            error: function() {
                Swal.fire('Error', 'Failed to fetch prospect data.', 'error');
            }
        });
    };

    // Deleting a prospect
    window.deleteProspect = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/prospects/${id}`,
                    method: 'DELETE',
                    success: function() {
                        Swal.fire('Deleted!', 'Your prospect has been deleted.', 'success');
                        fetchProspects(); // Refresh the list after deletion
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to delete the prospect.', 'error');
                    }
                });
            }
        });
    };
    </script>
