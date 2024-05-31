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
                    <table class="table table-actions table-striped table-hover mb-0" id="productsTable" data-table>
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
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
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
        $('#product_id').val('');  // Ensure this is empty
        $('#productForm')[0].reset();  // Reset all form fields
        $('#productModalLabel').text('Add New Product');  // Set the title for the modal
        $('#productModal').modal('show');  // Show the modal
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
        e.preventDefault();
        var formData = new FormData(this);
        var productUrl = $('#product_id').val() ? '/products/' + $('#product_id').val() : '/products';
        var method = $('#product_id').val() ? 'PUT' : 'POST';

        $.ajax({
            url: productUrl,
            method: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function() {
                $('#productModal').modal('hide');
                fetchProducts();
                $('#productForm')[0].reset();
                $('#product_id').val('');
            },
            error: function(xhr, status, error) {
                console.error('Error occurred:', xhr.responseText);
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

    window.deleteProduct = function(id) {
        $.ajax({
            url: '/products/' + id,
            method: 'DELETE',
            success: function() {
                fetchProducts();
            },
            error: function(xhr) {
                console.error('Error occurred:', xhr.responseText);
            }
        });
    };

    fetchProducts();
});

</script>
