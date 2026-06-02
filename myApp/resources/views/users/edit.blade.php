@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">


    <h1 class="mb-4">Edit User</h1>

    <form
        action="{{ route('users.update', $user) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $user->name) }}"
            >

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
            >

            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>New Password</label>

            <input
                type="password"
                name="password"
                class="form-control"
            >

            <small class="text-muted">
                Leave blank if unchanged.
            </small>

            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">
            Update User
        </button>

    </form>

</div>


</div>

@endsection
