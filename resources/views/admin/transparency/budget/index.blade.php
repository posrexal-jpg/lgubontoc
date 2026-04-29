@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card-body">
        @include('layouts.partials.message')
        <h5 class="card-title">
            Budget &amp; Financial Documents
            <a href="{{ url('admin/transparency/budget/add') }}" class="btn btn-success text-white" style="float:right;margin-top:5px;">Add Document</a>
        </h5><br>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach($documents as $doc)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $doc->title }}</td>
                    <td>{{ $doc->year }}</td>
                    <td><span class="badge badge-info">{{ ucwords(str_replace('-', ' ', $doc->category)) }}</span></td>
                    <td>
                        @if($doc->file_path)
                            <a href="{{ asset($doc->file_path) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                <i class="fa fa-download"></i> View
                            </a>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $doc->active ? 'success' : 'secondary' }}">
                            {{ $doc->active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('admin/transparency/budget/edit/'.$doc->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                        <a onclick="return confirm('Delete this document?');" href="{{ url('admin/transparency/budget/delete/'.$doc->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $documents->links() }}
    </div>
</div>
@endsection
