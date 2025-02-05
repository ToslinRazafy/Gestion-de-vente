@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Statistiques des Ventes</h2>
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-white p-4 shadow rounded-lg text-center">
            <h3 class="text-lg font-bold">Total Ventes</h3>
            <p class="text-2xl font-semibold text-blue-600">{{ $totalVente }} Ar</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
            <h3 class="text-lg font-bold">Produits Vendus</h3>
            <p class="text-2xl font-semibold text-green-600">{{ $nombreProduitVendu }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
            <h3 class="text-lg font-bold">Clients</h3>
            <p class="text-2xl font-semibold text-purple-600">{{ $nombreClients }}</p>
        </div>
    </div>
    <div class="mt-6 bg-white p-6 shadow rounded-lg">
        <h3 class="text-lg font-semibold mb-4">Évolution des Ventes</h3>
        <canvas id="salesChart"></canvas>
    </div>
</div>
<script>
     var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Ventes ($)',
                        data: [5000, 7000, 8000, 12000, 9000, 11000],
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
</script>
@endsection