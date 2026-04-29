@extends('layouts.default')

@section('content')
<div class="app-card app-card-settings shadow-sm p-4">
    <h1 class="app-page-title">Add Account</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @include('admin.users._form')
    </form>
</div>
@endsection
