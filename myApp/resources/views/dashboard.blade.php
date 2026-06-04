@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Dashboard</h4>
        <small class="text-muted">Welcome back, {{ auth()->user()->name }}!</small>
    </div>
</div>

<div class="row g-3 mb-4">

    <div class="col-md-6">
        <div class="card">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="font-size: 2rem;">👥</div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $usersCount }}</h3>
                    <small class="text-muted">Total Users</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="font-size: 2rem;">🎵</div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $playlistsCount }}</h3>
                    <small class="text-muted">Total Playlists</small>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">
        <p class="text-muted small fw-semibold mb-3">SYSTEM OVERVIEW</p>
        <canvas id="dashboardChart" height="80"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('dashboardChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Users', 'Playlists'],
        datasets: [{
            label: 'Total Count',
            data: [{{ $usersCount }}, {{ $playlistsCount }}],
            backgroundColor: ['#212529', '#adb5bd'],
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: '#f0f0f0' },
                ticks: { color: '#adb5bd' }
            },
            x: {
                grid: { display: false },
                ticks: { color: '#555' }
            }
        }
    }
});
</script>

@endsection