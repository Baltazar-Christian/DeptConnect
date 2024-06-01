
<div class=" mt-5">
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-grid">
              <div class="card-header">
                  <div class="card-header-title">
                      <i class="io io-list"></i> Prospects List
                  </div>
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
          url: '/prospects/all_credits',
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
                              <button onclick="editProspect(${prospect.id})"class="btn btn-info btn-sm">View Details </button>
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
