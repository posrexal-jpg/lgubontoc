@extends('layouts.default')

@section('content')
    <div class="container">
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

        <div class="card p-4">
            <h5 class="card-title">
                Downloadable Forms
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addDownloadableFormModal">
                    Add Form
                </button>
            </h5>

            <table class="table table-light align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title of Form</th>
                        <th>Short Description</th>
                        <th>Upload Form</th>
                        <th>Order</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($downloadableforms as $form)
                        <tr>
                            <td>{{ $downloadableforms->firstItem() + $loop->index }}</td>
                            <td>{{ $form->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($form->description), 120) }}</td>
                            <td>
                                @if($form->file_url)
                                    <a href="{{ $form->file_url }}" target="_blank" rel="noopener">{{ $form->file_name ?? 'View file' }}</a>
                                @else
                                    <span class="text-muted">No file</span>
                                @endif
                            </td>
                            <td>{{ $form->sort_order }}</td>
                            <td>{{ $form->is_published ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.others.downloadableforms.show', $form->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editDownloadableFormModal{{ $form->id }}">Edit</button>
                                <a onclick="return confirm('Delete this form?');" href="{{ route('admin.others.downloadableforms.delete', $form->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No downloadable forms have been added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $downloadableforms->links() }}
        </div>
    </div>

    <div class="modal fade" id="addDownloadableFormModal" tabindex="-1" aria-labelledby="addDownloadableFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('admin.others.downloadableforms.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDownloadableFormModalLabel">Add Downloadable Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.others.downloadableforms.partials.form', ['form' => null])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($downloadableforms as $form)
        <div class="modal fade" id="editDownloadableFormModal{{ $form->id }}" tabindex="-1" aria-labelledby="editDownloadableFormModalLabel{{ $form->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="{{ route('admin.others.downloadableforms.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $form->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDownloadableFormModalLabel{{ $form->id }}">Edit Downloadable Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('admin.others.downloadableforms.partials.form', ['form' => $form])
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
