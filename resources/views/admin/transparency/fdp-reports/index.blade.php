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
            Full Disclosure Policy Reports
            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addFdpReportModal">
                Add FDP Report
            </button>
        </h5>

        <table class="table table-light align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Period</th>
                    <th>File</th>
                    <th>Order</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    <tr>
                        <td>{{ $reports->firstItem() + $loop->index }}</td>
                        <td>
                            <strong>{{ $report->title }}</strong>
                            @if($report->description)
                                <div class="text-muted small">{!! \Illuminate\Support\Str::limit(strip_tags($report->description), 120) !!}</div>
                            @endif
                        </td>
                        <td>{{ $report->period ?: 'Not set' }}</td>
                        <td>
                            @if($report->file_url)
                                <a href="{{ $report->file_url }}" target="_blank" rel="noopener">{{ $report->file_name ?? 'View file' }}</a>
                            @else
                                <span class="text-muted">No file</span>
                            @endif
                        </td>
                        <td>{{ $report->sort_order }}</td>
                        <td>{{ $report->is_published ? 'Yes' : 'No' }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editFdpReportModal{{ $report->id }}">Edit</button>
                            <a onclick="return confirm('Delete this FDP report?');" href="{{ route('admin.transparency.fdp-reports.delete', $report->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No FDP reports have been added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $reports->links() }}
    </div>
</div>

<div class="modal fade" id="addFdpReportModal" tabindex="-1" aria-labelledby="addFdpReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('admin.transparency.fdp-reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addFdpReportModalLabel">Add FDP Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.transparency.fdp-reports.partials.form', ['report' => null])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($reports as $report)
    <div class="modal fade" id="editFdpReportModal{{ $report->id }}" tabindex="-1" aria-labelledby="editFdpReportModalLabel{{ $report->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('admin.transparency.fdp-reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editFdpReportModalLabel{{ $report->id }}">Edit FDP Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.transparency.fdp-reports.partials.form', ['report' => $report])
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
