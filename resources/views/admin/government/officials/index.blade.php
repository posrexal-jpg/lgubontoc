@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card-body">
        @include('layouts.partials.message')
        <h5 class="card-title">
            Government Officials
            <a href="{{ url('admin/government/officials/add') }}" class="btn btn-success text-white" style="float:right;margin-top:5px;">Add Official</a>
        </h5><br>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Contact</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach($officials as $official)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>
                        @if($official->photo)
                            <img src="{{ url('uploads/'.$official->photo) }}" style="height:50px;width:50px;object-fit:cover;border-radius:50%;">
                        @else
                            <div style="height:50px;width:50px;background:#e8f5e9;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <i class="fa fa-user text-success"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $official->name }}</td>
                    <td>{{ $official->position }}</td>
                    <td>{{ $official->office }}</td>
                    <td>{{ $official->contact }}</td>
                    <td>{{ $official->sort_order }}</td>
                    <td>
                        <span class="badge badge-{{ $official->active ? 'success' : 'secondary' }}">
                            {{ $official->active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('admin/government/officials/edit/'.$official->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                        <a onclick="return confirm('Delete this official?');" href="{{ url('admin/government/officials/delete/'.$official->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
