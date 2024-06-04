<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col">
              <div class="card mb-grid">
                <div class="card-header">
                    <div class="card-header-title">
                        <i class="io io-list"></i> Unscanned  Collections
                    </div>
                    {{-- <button class="btn btn-primary float-right" onclick="showAddModal()">New Collection</button> --}}
                    <a href="{{ route('collection-form') }}" class="btn btn-primary float-right">Collection Form</a>
                </div>
                </div>
                <div class="table-responsive-md">
                  <table class="table table-actions table-striped table-hover mb-0" data-table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Customer </th>
                            <th scope="col">Amount</th>
                            <th scope="col">Installment </th>
                            <th scope="col">Credit Form URL</th>
                            <th scope="col">Prospect Type</th>
                            <th scope="col">Paid Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment Deadline</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>



    </div>
