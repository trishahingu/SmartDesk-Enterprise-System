<x-app-layout>

<div class="container mt-4">

    <h2 class="mb-4">📊 SmartDesk Analytics Dashboard</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-black">
                <div class="card-body">
                    <h5>Total Projects</h5>
                    <h2>{{ $totalProjects }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-success text-black">
                <div class="card-body">
                    <h5>Total Tasks</h5>
                    <h2>{{ $totalTasks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-dark text-black">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Task Status (Pie Chart)
                </div>

                <div class="card-body">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Task Comparison
                </div>

                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('pieChart'), {

    type:'pie',

    data:{

        labels:['Completed','Pending','In Progress'],

        datasets:[{

            data:[
                {{ $completedTasks }},
                {{ $pendingTasks }},
                {{ $inProgressTasks }}
            ]

        }]

    }

});

new Chart(document.getElementById('barChart'), {

    type:'bar',

    data:{

        labels:['Completed','Pending','In Progress'],

        datasets:[{

            label:'Tasks',

            data:[
                {{ $completedTasks }},
                {{ $pendingTasks }},
                {{ $inProgressTasks }}
            ]

        }]

    }

});

</script>

</x-app-layout>