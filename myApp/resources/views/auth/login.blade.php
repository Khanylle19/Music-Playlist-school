@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
<div class="col-md-4">

    <div class="text-center mb-4">
        <h4 class="fw-bold">🎵 Music Playlist</h4>
        <p class="text-muted small">Sign in to your account</p>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-muted small fw-semibold">EMAIL</label>
                    <input type="email" name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="you@example.com">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small fw-semibold">PASSWORD</label>
                    <input type="password" name="password"
                           class="form-control"
                           placeholder="••••••••">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-dark w-100">Sign In</button>

            </form>

            <div class="text-center mt-3">
                <small class="text-muted">Don't have an account?
                    <a href="{{ route('register') }}" class="text-dark fw-semibold">Register</a>
                </small>
            </div>

        </div>
    </div>

</div>
</div>

@endsection