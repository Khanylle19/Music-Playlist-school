<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <!-- Scripts & External Stylesheets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <!-- Dark minimalist wrapper backdrop -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#050508]">

        <!-- Stark, geometric text branding wrapper replacing standard logo color -->
        <div class="mb-4">
            <a href="/" class="text-[#00f0ff] text-xl font-bold tracking-[0.3em] uppercase text-glow-cyan no-underline">
                SYS.AUTH //
            </a>
        </div>

        <!-- Minimalist sharp-edged panel container using your external CSS rules -->
        <div class="w-full sm:max-w-md mt-2 p-6 cyber-panel overflow-hidden">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('success'))
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            iconColor: '#00f0ff',
            customClass: { popup: 'cyber-toast' },
            title: '✓ SUCCESS // ' + @json(session('success')),
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    });
    </script>
    @endif

    @if(session('error'))
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            iconColor: '#ff0055',
            customClass: { popup: 'cyber-toast-error' },
            title: '⚠ ERROR // ' + @json(session('error')),
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true
        });
    });
    </script>
    @endif

    @if ($errors->any())
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            iconColor: '#ff0055',
            customClass: { popup: 'cyber-toast-error' },
            title: '⚠ AUTH_ERR // {{ $errors->first() }}',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true
        });
    });
    </script>
    @endif
</body>
</html>