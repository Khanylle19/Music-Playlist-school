<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Music Playlist</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', sans-serif;
        color: #212529;
    }
    .navbar {
        border-bottom: 1px solid #e0e0e0;
        background-color: #fff !important;
        padding: 12px 0;
    }
    .navbar-brand {
        font-weight: 700;
        font-size: 1.2rem;
        color: #212529 !important;
        letter-spacing: 0.5px;
    }
    .nav-link {
        color: #555 !important;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 6px 14px !important;
        border-radius: 6px;
        transition: background 0.2s;
    }
    .nav-link:hover {
        background-color: #f0f0f0;
        color: #212529 !important;
    }
    .btn-logout {
        background: none;
        border: 1px solid #dee2e6;
        color: #555;
        font-size: 0.85rem;
        padding: 5px 14px;
        border-radius: 6px;
        transition: all 0.2s;
    }
    .btn-logout:hover {
        background-color: #212529;
        color: #fff;
        border-color: #212529;
    }
    .card {
        border: 1px solid #e9ecef;
        border-radius: 12px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    }
    .card-body {
        padding: 24px;
    }
</style>
</head>
<body>

@auth
<nav class="navbar navbar-expand-lg shadow-none">
<div class="container">

    <a class="navbar-brand" href="{{ route('dashboard') }}">
        🎵 Music Playlist
    </a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('playlists.index') }}">Playlists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
            </li>
        </ul>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('profile.edit') }}">
                @if(auth()->user()->profile_picture)
                    <img src="{{ auth()->user()->profile_picture }}"
                         width="36" height="36"
                         class="rounded-circle border"
                         style="object-fit: cover;"
                         alt="Profile">
                @else
                    <img src="https://via.placeholder.com/36"
                         width="36" height="36"
                         class="rounded-circle border"
                         style="object-fit: cover;"
                         alt="Profile">
                @endif
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>

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