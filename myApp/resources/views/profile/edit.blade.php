@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <h1 class="mb-4">My Profile</h1>

        <form
            action="{{ route('profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="mb-3 text-center">
                @if(auth()->user()->profile_picture)
                    <img
                        src="{{ auth()->user()->profile_picture }}"
                        width="120"
                        height="120"
                        class="rounded-circle mb-3"
                        alt="Profile Picture"
                    >
                @else
                    <img
                        src="https://via.placeholder.com/120"
                        width="120"
                        height="120"
                        class="rounded-circle mb-3"
                        alt="Default Profile"
                    >
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                >

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', auth()->user()->email) }}"
                    required
                >

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Picture</label>

                <input
                    type="file"
                    name="profile_picture"
                    class="form-control"
                    accept="image/*"
                >

                @error('profile_picture')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update Profile
            </button>

        </form>

    </div>
</div>

@endsection