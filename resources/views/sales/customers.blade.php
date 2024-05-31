<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title"><i class="io io-list"></i> Customers List</div>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0" data-table>
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
                        <tbody>
                            <!-- Data will be loaded here by jQuery -->
                        </tbody>
                    </table>
                </div>
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

    function fetchCustomers() {
        $.ajax({
            url: '{{ route('customers.index') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var rows = "";
                $.each(data, function(index, customer) {
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
                $('table[data-table] tbody').html(rows);
            }
        });
    }

    window.editCustomer = function(id) {
        $.get('/customers/' + id, function(customer) {
            // Populate form fields for editing
            $('#customerModal').modal('show');
        });
    };

    window.deleteCustomer = function(id) {
        if (confirm('Are you sure you want to delete this customer?')) {
            $.ajax({
                url: '/customers/' + id,
                method: 'DELETE',
                success: function(result) {
                    fetchCustomers(); // Refresh the list
                },
                error: function(xhr) {
                    console.error('Error occurred:', xhr.responseText);
                }
            });
        }
    };

    fetchCustomers();
});
</script>
</body>
</html>
