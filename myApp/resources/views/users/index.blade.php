@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Users Management</h1>


<a href="{{ route('users.create') }}" class="btn btn-primary">
    Add User
</a>


</div>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search users..."
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
                <th>Name</th>
                <th>Email</th>
                <th>Created Date</th>
                <th width="180">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($users as $user)

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('M d, Y') }}</td>

                <td>

                    <a
                        href="{{ route('users.edit', $user) }}"
                        class="btn btn-warning btn-sm"
                    >
                        Edit
                    </a>

                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline delete-user-form" data-name="{{ $user->name }}">
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
                    No users found.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

    {{ $users->links() }}

</div>


</div>
<script>
document.querySelectorAll('.delete-user-form').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        const userName = this.dataset.name;

        Swal.fire({
            title: 'Delete User?',
            html: `
                Are you sure you want to delete
                <strong>${userName}</strong>?
                <br><br>
                This action cannot be undone.
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Delete User',
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
