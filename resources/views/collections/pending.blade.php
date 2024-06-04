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
                            <th>Customer Name</th>
                            <th>Purchase Date</th>
                            <th>Total Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $collection)
                        <tr>
                            <td>{{ $collection->customer_name }}</td>
                            <td>{{ $collection->purchase_date }}</td>
                            <td>{{ $collection->total_amount }}</td>
                            <td>
                                <a href="{{ route('collections.show', $collection->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" style="display: inline-line">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
              </div>
            </div>
          </div>
    </div>



    </div>
