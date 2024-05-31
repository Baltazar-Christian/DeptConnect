
<div class=" mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title">
                        <i class="io io-list"></i> Prospects List
                    </div>
                    <button class="btn btn-primary float-right" onclick="showAddModal()">Add New Prospect</button>
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

   <!-- Prospect Modal -->
<div class="modal fade" id="prospectModal" tabindex="-1" aria-labelledby="prospectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prospectModalLabel">Manage Prospect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="prospectForm">
                <div class="modal-body">
                    <input type="hidden" id="prospect_id" name="prospect_id">
                    <input type="hidden" id="prospect_id" name="prospect_id">
                    <div class="form-group">
                        <label for="prospect_customer_id">Customer</label>
                        <select class="form-control select2" id="prospect_customer_id" name="customer_id" required>
                            <!-- Customer options will be loaded here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prospect_products">Products</label>
                        <select class="form-control select2" id="prospect_products" name="products[]" multiple="multiple">
                            <!-- Product options will be loaded here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_amount">Payment Amount</label>
                        <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
                    </div>
                    <div class="form-group">
                        <label for="installment_plan">Installment Plan (Number of Payments)</label>
                        <input type="number" class="form-control" id="installment_plan" name="installment_plan" required>
                    </div>
                    <div class="form-group">
                        <label for="credit_form_url">Credit Form URL</label>
                        <input type="url" class="form-control" id="credit_form_url" name="credit_form_url">
                    </div>
                    <div class="form-group">
                        <label for="prospect_type">Prospect Type</label>
                        <select class="form-control" id="prospect_type" name="prospect_type">
                            <option value="presentation">Presentation</option>
                            <option value="cash">Cash</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="paid_amount">Paid Amount</label>
                        <input type="number" class="form-control" id="paid_amount" name="paid_amount">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="presentation">Presentation</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="full paid">Full Paid</option>
                            <option value="partially paid">Partially Paid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_deadline">Payment Deadline</label>
                        <input type="date" class="form-control" id="payment_deadline" name="payment_deadline" required>
                    </div>
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
