@extends('layouts.app')

@section('content')

<div class="row justify-content-center">


<div class="col-md-5">

    <div class="card">

        <div class="card-body">

            <h2 class="text-center mb-4">Login</h2>

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-3">
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                    >

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary w-100">
                    Login
                </button>

            </form>

            <div class="text-center mt-3">
                <a href="{{ route('register') }}">
                    Create account
                </a>
            </div>

        </div>
    </div>

</div>


</div>

@endsection
