@extends('./layouts/main')

@section('container')
    <h1>Home</h1>
    <ul>
        <li><a href="/measurements/new">Cadastrar</a></li>
        <li><a href="/measurements">Listar</a></li>
    </ul>

    {{-- Gráfico --}}
    <style>
        .cardChart{
            width: 400px;
            height: 250px;
        }
    </style>


    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="cardChart card shadow p-4 my-5">
                    <canvas id="myChart" width="400" height="250"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div>

    
    {{-- Importando o chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    {{-- Script que cria o gráfico --}}
    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janeiro/22', 'Abril/22', 'Julho/22', 'Outubro/22', 'Janeiro/23'],
                datasets: [{
                    label: 'Braço Direito',
                    data: [29, 30, 30, 31, 32],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
@endsection
