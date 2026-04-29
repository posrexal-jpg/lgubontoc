@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card-body">
        @include('layouts.partials.message')
        <h5 class="card-title">
            Announcements &amp; Advisories
            <a href="{{ url('admin/announcements/add') }}" class="btn btn-success text-white" style="float:right;margin-top:5px;">Add Announcement</a>
        </h5><br>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach($announcements as $item)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $item->title }}</td>
                    <td><span class="badge badge-info">{{ ucfirst($item->type) }}</span></td>
                    <td>{{ $item->date_posted }}</td>
                    <td>
                        <span class="badge badge-{{ $item->status === 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('admin/announcements/edit/'.$item->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                        <a onclick="return confirm('Delete this announcement?');" href="{{ url('admin/announcements/delete/'.$item->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $announcements->links() }}
    </div>
</div>
@endsection
