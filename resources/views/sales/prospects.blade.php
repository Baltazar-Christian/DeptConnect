
<div class=" mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title">
                        <i class="io io-list"></i> Prospects List
                    </div>
                    <button class="btn btn-primary mb-3 float-right" onclick="showAddModal()">Add New Prospect</button>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0" id="prospectsTable">
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

    <!-- Add/Edit Prospect Modal -->
    <div class="modal fade" id="prospectModal" tabindex="-1" role="dialog" aria-labelledby="prospectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prospectModalLabel">Add New Prospect</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="prospectForm">
                    <div class="modal-body">
                        <input type="hidden" id="prospect_id" name="prospect_id">
                        <!-- Add fields here similar to the Customer example -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Prospect</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src=" {{ asset('js/prospectManagement.js') }} "></script>
