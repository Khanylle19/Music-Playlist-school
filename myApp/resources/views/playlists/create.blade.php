@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">


    <h1 class="mb-4">Add Playlist</h1>

    <form action="{{ route('playlists.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Playlist Name</label>

            <input
                type="text"
                name="playlist_name"
                class="form-control"
                value="{{ old('playlist_name') }}"
            >

            @error('playlist_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="4"
            >{{ old('description') }}</textarea>

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">
            Save Playlist
        </button>

    </form>

</div>


</div>

@endsection
