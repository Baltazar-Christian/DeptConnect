<div class="mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title">
                        <i class="io io-list"></i> @yield('card-title')
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

<script src="{{ asset('js/prospectManagement.js') }}"></script>
