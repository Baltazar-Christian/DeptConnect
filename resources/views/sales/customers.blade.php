<div class="">
    <div class=" mt-5">
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
                        <table class="table table-actions table-striped table-hover mb-0" id="customersTable" data-table>
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
    </div>

    <!-- Add/Edit Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                    $('#customersBody').html(rows); // Ensure tbody is emptied and refilled with new data
                }
            });
        }

        $('#customerForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var formUrl = $('#customer_id').val() ? '/customers/' + $('#customer_id').val() : '/customers';
            var formMethod = $('#customer_id').val() ? 'PUT' : 'POST';

            $.ajax({
                url: formUrl,
                method: formMethod,
                data: formData,
                success: function(result) {
                    $('#customerModal').modal('hide');
                    fetchCustomers();
                    $('#customerForm')[0].reset();
                    $('#customer_id').val(''); // Reset hidden id field to ensure correct create/update
                },
                error: function(xhr) {
                    console.error('Error occurred:', xhr.responseText);
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
            $.ajax({
                url: '/customers/' + id,
                method: 'DELETE',
                success: function(result) {
                    fetchCustomers();
                },
                error: function(xhr) {
                    console.error('Error occurred:', xhr.responseText);
                }
            });
        };

        // Initial fetch of customers
        fetchCustomers();
    });
</script>
