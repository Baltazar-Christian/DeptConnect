{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body> --}}
<div class="container mt-5">
    <button class="btn btn-primary mb-3" onclick="addProduct()">Add New Product</button>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title"><i class="fas fa-box"></i> Products List</div>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0" data-table>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
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
    <!-- Add/Edit Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="productForm">
              <div class="modal-body">
                  <input type="hidden" id="product_id" name="product_id">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" required>
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
</div>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetchProducts() {
        $.ajax({
            url: '{{ route('products.index') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var rows = "";
                $.each(data, function(index, product) {
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
                $('table[data-table] tbody').html(rows);
            }
        });
    }

    $('#productForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var productId = $('#product_id').val();
        var formUrl = productId ? '/products/' + productId : '/products';
        var formMethod = productId ? 'PUT' : 'POST';

        $.ajax({
            url: formUrl,
            method: formMethod,
            data: formData,
            processData: false,
            contentType: false,
            success: function(result) {
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

    window.addProduct = function() {
        $('#product_id').val('');
        $('#productForm')[0].reset();
        $('#productModalLabel').text('Add New Product');
        $('#productModal').modal('show');
    };

    window.editProduct = function(id) {
        $.get('/products/' + id, function(product) {
            $('#product_id').val(product.id);
            $('#name').val(product.name);
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
            success: function(result) {
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
{{-- </body>
</html> --}}
