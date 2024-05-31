<div class="mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title"><i class="fas fa-box"></i> Products List</div>
                    {{-- <button class="btn btn-primary float-right  mb-3" onclick="addProduct()">Add New Product</button> --}}

                    <button class="btn btn-primary mb-3 float-right" onclick="addProduct()">Add New Product</button>


                </div>
                <div class="table-responsive-md">
                    <table data-table="true" class="table table-actions table-bordered table-striped table-hover mb-0" id="productsTable" data-table>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="productsBody">
                            <!-- Data will be loaded here by jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="productForm">
                    <div class="modal-body">
                        <input type="hidden" id="product_id" name="product_id">
                        <div class="form-group">
                            <label for="productName">Name</label>
                            <input type="text" class="form-control" id="productName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Product Button -->


    <script>
        $(document).ready(function() {
            window.addProduct = function() {
                $('#product_id').val(''); // Ensure this is empty
                $('#productForm')[0].reset(); // Reset all form fields
                $('#productModalLabel').text('Add New Product'); // Set the title for the modal
                $('#productModal').modal('show'); // Show the modal
            };
        });
    </script>

</div>

<script>
    $(document).ready(function() {
        function fetchProducts() {
            $.ajax({
                url: '/products',
                type: 'GET',
                success: function(data) {
                    var rows = "";
                    data.forEach(function(product) {
                        rows += `<tr>
                        <td>${product.id}</td>
                        <td>${product.name}</td>
                        <td>${product.description}</td>
                        <td>$${parseFloat(product.price).toFixed(2)}</td>
                        <td>
                            <button onclick="editProduct(${product.id})" class="btn btn-info btn-sm">Edit</button>
                            <button onclick="deleteProduct(${product.id})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>`;
                    });
                    $('#productsBody').html(rows);
                }
            });
        }

        $('#productForm').submit(function(e) {
    e.preventDefault();  // Prevent the default form submission

    var formData = {
        'name': $('#productName').val(),
        'description': $('#description').val(),
        'price': $('#price').val()
    };
    var productId = $('#product_id').val();  // Get the product ID from the hidden input field
    var ajaxUrl = productId ? '/products/' + productId : '/products'; // Determine if adding or updating
    var ajaxMethod = productId ? 'PUT' : 'POST'; // Use POST for add, PUT for update

    $.ajax({
        url: ajaxUrl,
        method: ajaxMethod,
        data: formData,
        success: function(response) {
            $('#productModal').modal('hide');  // Hide the modal on success
            Swal.fire({
                title: 'Success!',
                text: productId ? 'Product updated successfully!' : 'Product added successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetchProducts();  // Refresh the list of products
                }
            });
        },
        error: function(xhr) {
            $('#productModal').modal('hide');  // Hide the modal on error
            Swal.fire({
                title: 'Error!',
                text: 'Error processing request. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});



        window.editProduct = function(id) {
            $.get('/products/' + id, function(product) {
                $('#product_id').val(product.id);
                $('#productName').val(product.name);
                $('#description').val(product.description);
                $('#price').val(product.price);
                $('#productModalLabel').text('Edit Product');
                $('#productModal').modal('show');
            });
        };

        window.deleteProduct = function(productId) {
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
                    $('#productModal').modal('hide'); // Close any open modals
                    $.ajax({
                        url: '/products/' + productId,
                        method: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your product has been deleted.',
                                'success'
                            );
                            fetchProducts(); // Refresh the product list
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete the product. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        };


        fetchProducts();
    });
</script>
