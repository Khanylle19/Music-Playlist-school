<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Music Playlist</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">

@auth
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

<div class="container">

    <a class="navbar-brand fw-bold"
       href="{{ route('dashboard') }}">
        Music Playlist
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse"
         id="navbarNav">

        <ul class="navbar-nav me-auto">

            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('users.index') }}">
                    Users
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('playlists.index') }}">
                    Playlists
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('profile.edit') }}">
                    Profile
                </a>
            </li>

        </ul>

        <a href="{{ route('profile.edit') }}" class="me-3">
            @if(auth()->user()->profile_picture)
                <img
                    src="{{ auth()->user()->profile_picture }}"
                    width="38"
                    height="38"
                    class="rounded-circle border border-2 border-white"
                    alt="Profile Picture"
                    style="object-fit: cover;"
                >
            @else
                <img
                    src="https://via.placeholder.com/38"
                    width="38"
                    height="38"
                    class="rounded-circle border border-2 border-white"
                    alt="Default Profile"
                    style="object-fit: cover;"
                >
            @endif
        </a>

        <form method="POST"
              action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm">
                Logout
            </button>
        </form>

    </div>

</div>

</nav>
@endauth

<div class="container py-4">

@yield('content')

</div>

@if(session('success'))
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 3000
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'error',
    title: "{{ session('error') }}",
    showConfirmButton: false,
    timer: 3000
});
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>