$(document).ready(function() {
    // Initialize your specific functions and event handlers
    fetchProspects('/prospects/all_credits'); // Customize the URL per view
});

function fetchProspects(url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function(data) {
            var tableBody = $('#prospectsBody');
            tableBody.empty();
            data.forEach(function(prospect) {
                var customerName = prospect.customer ? prospect.customer.name : 'No Customer';
                tableBody.append(`<tr>...</tr>`); // Populate table rows
            });
        },
        error: function(error) {
            console.log('Error fetching prospects:', error);
        }
    });
}
