@extends('layouts.default')

@section('content')
    <div class="container">
        @include('layouts.partials.message')

        <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}">
            @csrf
            <input type="hidden" name="id" value="{{ optional($bontocattraction)->id }}">

            <div class="row card p-5">
                <div class="bg-light p-5 rounded">
                    <h2>{{ $bontocattraction ? 'Edit Bontoc Attraction' : 'Add Bontoc Attraction' }}</h2>
                    <p class="mb-0">BREAD: Browse, Read, Edit, Add, Delete</p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-black">Title</label>
                        <input type="text" name="title" value="{{ old('title', optional($bontocattraction)->title) }}" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label class="text-black">Description</label>
                        <textarea id="myTextarea" name="description" style="width: 100%;">{{ old('description', optional($bontocattraction)->description) }}</textarea>
                    </div>
                    <div><br>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        @if($bontocattraction)
                            <a href="{{ route('admin.tourism.bontocattractions') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <div class="card p-4 mt-4">
            <h5>Browse Bontoc Attractions</h5>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bontocattractions as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{!! $value->description !!}</td>
                            <td>
                                <a href="{{ route('admin.tourism.bontocattractions.show', $value->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                                <a href="{{ route('admin.tourism.bontocattractions.edit', $value->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.tourism.bontocattractions.delete', $value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No attractions yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#myTextarea',
            plugins: 'advlist autolink lists link image code media table',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image code media table',
            menubar: false,
        });
    </script>
@endsection
