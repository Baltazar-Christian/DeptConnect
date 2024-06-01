
<div class="mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title">
                        <i class="io io-list"></i> Customers List
                    </div>
                    <button class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#customerModal">Add New Customer</button>
                </div>
                <div class="table-responsive-md">
                    <table data-table="true" class="table table-actions table-bordered table-striped table-hover mb-0" id="customersTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="customersBody">
                            <!-- Data will be loaded here by jQuery -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="customerForm">
                    <div class="modal-body">
                        <input type="hidden" id="customer_id" name="customer_id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // var customerTable = $('#customersTable').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "ajax": {
    //             "url": "/customers", // Replace with Laravel route, e.g., '{{ route('customers.index') }}'
    //             "type": "GET",
    //             "dataSrc": function(json) {
    //                 return json.data;
    //             }
    //         },
    //         "columns": [
    //             { "data": "id" },
    //             { "data": "name" },
    //             { "data": "email" },
    //             { "data": "phone" },
    //             { "data": "address" },
    //             { "data": null, "sortable": false, "render": function(data, type, row) {
    //                 return `<button onclick="editCustomer(${row.id})" class="btn btn-info btn-sm">Edit</button>
    //                         <button onclick="deleteCustomer(${row.id})" class="btn btn-danger btn-sm">Delete</button>`;
    //             }}
    //         ]
    //     });

    function fetchCustomers() {
        $.ajax({
            url: '/customers', // Assuming base URL, replace with '{{ route('customers.index') }}' if using Laravel
            type: 'GET',
            success: function(data) {
                var rows = "";
                data.forEach(function(customer) {
                    rows += `<tr>
                        <td>${customer.id}</td>
                        <td>${customer.name}</td>
                        <td>${customer.email}</td>
                        <td>${customer.phone}</td>
                        <td>${customer.address}</td>
                        <td>
                            <button onclick="editCustomer(${customer.id})" class="btn btn-info btn-sm">Edit</button>
                            <button onclick="deleteCustomer(${customer.id})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#customersBody').html(rows);
            }
        });
    }

    $('#customerForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var customerUrl = $('#customer_id').val() ? '/customers/' + $('#customer_id').val() : '/customers';
        var method = $('#customer_id').val() ? 'PUT' : 'POST';

        $.ajax({
            url: customerUrl,
            method: method,
            data: formData,
            beforeSend: function() {
                $('#customerModal').modal('hide');
            },
            success: function() {
                fetchCustomers();
                Swal.fire({
                    title: 'Success!',
                    text: 'Customer information has been saved successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                $('#customerForm')[0].reset();
                $('#customer_id').val('');
                $('.modal-backdrop').remove(); // Ensure the backdrop is removed
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to save the customer information.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    window.editCustomer = function(id) {
        $.get('/customers/' + id, function(customer) {
            $('#customer_id').val(customer.id);
            $('#name').val(customer.name);
            $('#email').val(customer.email);
            $('#phone').val(customer.phone);
            $('#address').val(customer.address);
            $('#customerModalLabel').text('Edit Customer');
            $('#customerModal').modal('show');
        });
    };

    window.deleteCustomer = function(id) {
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
                    url: '/customers/' + id,
                    method: 'DELETE',
                    success: function() {
                        Swal.fire(
                            'Deleted!',
                            'The customer has been deleted.',
                            'success'
                        );
                        fetchCustomers();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to delete the customer.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    };

    fetchCustomers();
});
</script>
