{/* <script> */}

function showAddModal() {
    $('#prospectForm')[0].reset();
    $('#prospect_id').val('');
    $('#products').val(null).trigger('change');  // Reset the Select2 multi-select
    $('#customer_id').val(null).trigger('change');  // Reset the Select2 customer select
    $('#prospectModalLabel').text('Add New Prospect');
    $('#prospectModal').modal('show');
}

$(document).ready(function() {
    initializeSelect2();
    fetchCustomersForProspects();
    fetchProductsForProspects();
    fetchProspects();

    function initializeSelect2() {
        $('.select2').select2({
            width: '100%',
            placeholder: "Select an option",
            allowClear: true
        });
    }

    function fetchCustomersForProspects() {
        $.ajax({
            url: '/api/customers',  // Ensure this is the correct endpoint
            method: 'GET',
            success: function(data) {
                var options = '<option value="">Select a Customer</option>';
                data.forEach(function(customer) {
                    options += `<option value="${customer.id}">${customer.name}</option>`;
                });
                $('#prospect_customer_id').html(options);
            },
            error: function() {
                Swal.fire('Error', 'Failed to retrieve customers.', 'error');
            }
        });
    }

    function fetchProductsForProspects() {
        $.ajax({
            url: '/api/products',  // Ensure this is the correct endpoint
            method: 'GET',
            success: function(data) {
                var options = '';
                data.forEach(function(product) {
                    options += `<option value="${product.id}">${product.name} - ${product.price}</option>`;
                });
                $('#prospect_products').html(options);
            },
            error: function() {
                Swal.fire('Error', 'Failed to retrieve products.', 'error');
            }
        });
    }

    // Continue with the setup for handling form submission, etc.

    function fetchProspects() {
        $.ajax({
            url: '/prospects',  // Adjust according to your API endpoint
            method: 'GET',
            success: function(data) {
                var rows = '';
                data.forEach(function(prospect) {
                    rows += `<tr>
                        <td>${prospect.id}</td>
                        <td>${prospect.customer_id}</td>
                        <td>${prospect.payment_amount}</td>
                        <td>${prospect.installment_plan}</td>
                        <td>${prospect.credit_form_url || ''}</td>
                        <td>${prospect.prospect_type}</td>
                        <td>${prospect.paid_amount}</td>
                        <td>${prospect.status}</td>
                        <td>${prospect.payment_deadline}</td>
                        <td>
                            <button onclick="editProspect(${prospect.id})" class="btn btn-info btn-sm">Edit</button>
                            <button onclick="deleteProspect(${prospect.id})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#prospectsBody').html(rows);
            },
            error: function() {
                Swal.fire('Error', 'Failed to retrieve prospects.', 'error');
            }
        });
    }

    $('#prospectForm').submit(function(e) {
        e.preventDefault();
        var formData = {
            'customer_id': $('#customer_id').val(),
            'products': $('#products').val(),  // Array of product IDs
            'payment_amount': $('#payment_amount').val(),
            'installment_plan': $('#installment_plan').val(),
            'credit_form_url': $('#credit_form_url').val(),
            'prospect_type': $('#prospect_type').val(),
            'paid_amount': $('#paid_amount').val(),
            'status': $('#status').val(),
            'payment_deadline': $('#payment_deadline').val()
        };

        var prospectId = $('#prospect_id').val();
        var url = prospectId ? `/prospects/${prospectId}` : '/prospects';
        var method = prospectId ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: formData,
            success: function(response) {
                $('#prospectModal').modal('hide');
                Swal.fire('Success', 'Prospect data saved successfully!', 'success');
                $('#prospectForm')[0].reset();
                $('.select2').val(null).trigger('change');  // Reset Select2
                fetchProspects();
            },
            error: function(xhr) {
                Swal.fire('Error', 'Failed to save prospect data.', 'error');
            }
        });
    });

    window.editProspect = function(id) {
        $.ajax({
            url: `/prospects/${id}`,
            method: 'GET',
            success: function(prospect) {
                $('#prospect_id').val(prospect.id);
                $('#customer_id').val(prospect.customer_id).trigger('change');
                $('#payment_amount').val(prospect.payment_amount);
                $('#installment_plan').val(prospect.installment_plan);
                $('#credit_form_url').val(prospect.credit_form_url);
                $('#prospect_type').val(prospect.prospect_type);
                $('#paid_amount').val(prospect.paid_amount);
                $('#status').val(prospect.status);
                $('#payment_deadline').val(prospect.payment_deadline);
                $('#products').val(prospect.products.map(product => product.id)).trigger('change');
                $('#prospectModalLabel').text('Edit Prospect');
                $('#prospectModal').modal('show');
            },
            error: function() {
                Swal.fire('Error', 'Failed to fetch prospect data.', 'error');
            }
        });
    };

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
                        Swal.fire(
                            'Deleted!',
                            'Your prospect has been deleted.',
                            'success'
                        );
                        fetchProspects();
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to delete the prospect.', 'error');
                    }
                });
            }
        });
    };
});

// </script>
