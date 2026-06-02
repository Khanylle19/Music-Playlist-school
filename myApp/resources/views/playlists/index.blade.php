@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Playlist Management</h1>


<a href="{{ route('playlists.create') }}" class="btn btn-primary">
    Add Playlist
</a>


</div>

<form method="GET" class="mb-3">
    <div class="input-group">


    <input
        type="text"
        name="search"
        class="form-control"
        placeholder="Search playlist..."
        value="{{ request('search') }}"
    >

    <button class="btn btn-dark">
        Search
    </button>

</div>


</form>

<div class="card">
    <div class="card-body">


    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Playlist Name</th>
                <th>Description</th>
                <th>Created Date</th>
                <th width="180">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($playlists as $playlist)

            <tr>

                <td>{{ $playlist->playlist_name }}</td>

                <td>{{ $playlist->description }}</td>

                <td>
                    {{ $playlist->created_at->format('M d, Y') }}
                </td>

                <td>

                    <a
                        href="{{ route('playlists.edit', $playlist) }}"
                        class="btn btn-warning btn-sm"
                    >
                        Edit
                    </a>

                    <form action="{{ route('playlists.destroy', $playlist) }}" method="POST" class="d-inline delete-playlist-form"data-name="{{ $playlist->playlist_name }}" >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                        >
                            Delete
                        </button>
                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="4" class="text-center">
                    No playlists found.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

    {{ $playlists->links() }}

</div>


</div>
<script>
document.querySelectorAll('.delete-playlist-form').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        const playlistName = this.dataset.name;

        Swal.fire({
            title: 'Delete Playlist?',
            html: `
                Are you sure you want to delete
                <strong>${playlistName}</strong>?
                <br><br>
                This action cannot be undone.
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Delete Playlist',
            cancelButtonText: 'Cancel'
        }).then((result) => {

            if (result.isConfirmed) {
                this.submit();
            }

        });

    });

});
</script>
@endsection
