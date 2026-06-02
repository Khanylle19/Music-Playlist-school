@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">


    <h1 class="mb-4">Edit Playlist</h1>

    <form
        action="{{ route('playlists.update', $playlist) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Playlist Name</label>

            <input
                type="text"
                name="playlist_name"
                class="form-control"
                value="{{ old('playlist_name', $playlist->playlist_name) }}"
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
            >{{ old('description', $playlist->description) }}</textarea>

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">
            Update Playlist
        </button>

    </form>

</div>


</div>

@endsection
