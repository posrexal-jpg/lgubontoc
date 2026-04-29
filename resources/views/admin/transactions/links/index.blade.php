@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card-body">
        @include('layouts.partials.message')

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following:</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h5 class="card-title">
            Transaction Links
            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addTransactionLinkModal">Add Link</button>
        </h5>
        <p class="text-muted">These links appear under the public Transactions menu after Citizen's Charter and Mayor's Office.</p>

        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu Title</th>
                    <th>URL</th>
                    <th>Order</th>
                    <th>New Tab</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($links as $link)
                    <tr>
                        <td>{{ $links->firstItem() + $loop->index }}</td>
                        <td>{{ $link->title }}</td>
                        <td><a href="{{ $link->url }}" target="_blank" rel="noopener">{{ $link->url }}</a></td>
                        <td>{{ $link->sort_order }}</td>
                        <td>{{ $link->opens_new_tab ? 'Yes' : 'No' }}</td>
                        <td>{{ $link->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editTransactionLinkModal{{ $link->id }}">Edit</button>
                            <a onclick="return confirm('Delete this transaction link?');" href="{{ route('admin.transactions.links.delete', $link->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No transaction links have been added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $links->links() }}
    </div>
</div>

<div class="modal fade" id="addTransactionLinkModal" tabindex="-1" aria-labelledby="addTransactionLinkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('admin.transactions.links.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionLinkModalLabel">Add Transaction Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.transactions.links.partials.form', ['link' => null])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($links as $link)
    <div class="modal fade" id="editTransactionLinkModal{{ $link->id }}" tabindex="-1" aria-labelledby="editTransactionLinkModalLabel{{ $link->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('admin.transactions.links.update', $link->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTransactionLinkModalLabel{{ $link->id }}">Edit Transaction Link</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.transactions.links.partials.form', ['link' => $link])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
