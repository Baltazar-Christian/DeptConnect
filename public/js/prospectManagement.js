

function showAddModal() {
    resetProspectForm();
    $('#prospectModalLabel').text('Add New Prospect');
    $('#prospectModal').modal('show');
}

function resetProspectForm() {
    $('#prospectForm')[0].reset();
    $('#prospect_customer_id').val('').trigger('change');
    $('#prospect_products').val('').trigger('change');
}

$(document).ready(function() {
    $('.select2').select2();
    fetchCustomersForProspects();
    fetchProductsForProspects();
    fetchProspects();

    $('#prospectForm').submit(function(e) {
        e.preventDefault();
        var formData = gatherFormData();
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
                resetProspectForm();
                fetchProspects();
            },
            error: function(xhr) {
                Swal.fire('Error', 'Failed to save prospect data.', 'error');
            }
        });
    });

    function gatherFormData() {
        return {
            'customer_id': $('#prospect_customer_id').val(),
            'products': $('#prospect_products').val(),
            'payment_amount': $('#payment_amount').val(),
            'installment_plan': $('#installment_plan').val(),
            'credit_form_url': $('#credit_form_url').val(),
            'prospect_type': $('#prospect_type').val(),
            'paid_amount': $('#paid_amount').val(),
            'status': $('#status').val(),
            'payment_deadline': $('#payment_deadline').val()
        };
    }
});

// Load customers and products
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


