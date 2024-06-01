$(document).ready(function() {
    initializeSelect2();
    fetchProspects(window.location.pathname); // Fetch based on the current URL

    // Form submission for adding or updating prospects
    $('#prospectForm').submit(handleFormSubmit);
});

function initializeSelect2() {
    $('#prospectModal .select2').select2({
        dropdownParent: $('#prospectModal')
    });
}

function fetchProspects(url) {
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json', // Ensure jQuery expects JSON
        success: function(data) {
            if (Array.isArray(data)) {
                populateProspectsTable(data);
            } else {
                console.error('Data is not an array:', data);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching prospects:', xhr, status, error);
            Swal.fire('Error', 'Failed to fetch prospect data.', 'error');
        }
    });
}

function populateProspectsTable(prospects) {
    var tableBody = $('#prospectsBody');
    tableBody.empty();
    prospects.forEach(function(prospect) {
        tableBody.append(createProspectRow(prospect));
    });
}


function createProspectRow(prospect) {
    return `<tr>
        <td>${prospect.id}</td>
        <td>${prospect.customer_id}</td>
        <td>${prospect.payment_amount}</td>
        <td>${prospect.installment_plan}</td>
        <td><a href="${prospect.credit_form_url}" target="_blank">View Form</a></td>
        <td>${prospect.prospect_type}</td>
        <td>${prospect.paid_amount}</td>
        <td>${prospect.status}</td>
        <td>${new Date(prospect.payment_deadline).toLocaleDateString()}</td>
        <td>
            <button onclick="editProspect(${prospect.id})" class="btn btn-info btn-sm">View Details</button>
        </td>
    </tr>`;
}

function handleFormSubmit(e) {
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
            fetchProspects(window.location.pathname);
        },
        error: function(xhr) {
            var message = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Failed to save prospect data.';
            Swal.fire('Error', message, 'error');
        }
    });
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

// Additional functions for editing and deleting prospects could be added here
