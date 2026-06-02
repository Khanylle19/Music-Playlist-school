@extends('layouts.app')

@section('content')

<h1 class="mb-4">Dashboard</h1>

<div class="row">

    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $usersCount }}</h3>
                <p>Total Users</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $playlistsCount }}</h3>
                <p>Total Playlists</p>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4">
    <div class="card-body">
        <canvas id="dashboardChart"></canvas>
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
            label: 'System Reports',
            data: [{{ $usersCount }}, {{ $playlistsCount }}]
        }]
    }
});
</script>

@endsection