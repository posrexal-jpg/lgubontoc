@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card-body">
        @include('layouts.partials.message')
        <h5 class="card-title">
            Barangays
            <a href="{{ url('admin/barangays/add') }}" class="btn btn-success text-white" style="float:right;margin-top:5px;">Add Barangay</a>
        </h5><br>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Barangay Captain</th>
                    <th>Area</th>
                    <th>Population</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach($barangays as $barangay)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>
                        @if($barangay->photo)
                            <img src="{{ url('uploads/'.$barangay->photo) }}" style="height:50px;width:50px;object-fit:cover;border-radius:4px;">
                        @else
                            <div style="height:50px;width:50px;background:#e8f5e9;border-radius:4px;display:flex;align-items:center;justify-content:center;">
                                <i class="fa fa-home text-success"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $barangay->name }}</td>
                    <td>{{ $barangay->captain ?? '—' }}</td>
                    <td>{{ $barangay->area ?? '—' }}</td>
                    <td>{{ $barangay->population ?? '—' }}</td>
                    <td>
                        <span class="badge badge-{{ $barangay->active ? 'success' : 'secondary' }}">
                            {{ $barangay->active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('admin/barangays/edit/'.$barangay->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                        <a onclick="return confirm('Delete this barangay?');" href="{{ url('admin/barangays/delete/'.$barangay->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
