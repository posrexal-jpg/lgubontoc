@extends('layouts.default')

@section('content')
<div class="app-card app-card-settings shadow-sm p-4">
    <h1 class="app-page-title">Edit Account</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @method('PUT')
        @include('admin.users._form')
    </form>
</div>
@endsection
