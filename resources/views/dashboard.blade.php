<!DOCTYPE html>
<html>

<head>

    <title>SmartDesk Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->

        <div class="col-md-2 bg-dark text-white min-vh-100 p-3">

            <h2>SmartDesk</h2>

            <hr>

            <ul class="nav flex-column">

                <li class="nav-item mb-2">
                    <a href="/dashboard" class="nav-link text-white">Dashboard</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/companies" class="nav-link text-white">Companies</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/subscriptions" class="nav-link text-white">Subscriptions</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/employees" class="nav-link text-white">Employees</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/projects" class="nav-link text-white">Projects</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/tasks" class="nav-link text-white">Tasks</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/attendance" class="nav-link text-white">Attendance</a>
                </li>

            </ul>

        </div>

        <!-- Main Content -->

        <div class="col-md-10 p-4">

            <h1 class="mb-4">Dashboard</h1>

            <!-- SaaS Cards -->

            <div class="row mb-4">

                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Company</h5>
                            <h4>{{ $company->name ?? 'Not Assigned' }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5>Plan</h5>
                            <h4>{{ $company->plan_type ?? 'Free' }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-warning text-dark">
                        <div class="card-body">
                            <h5>Total Users</h5>
                            <h4>{{ $totalUsers }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5>Total Projects</h5>
                            <h4>{{ $totalProjects }}</h4>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Statistics -->
            <div class="row">

                <div class="col-md-3 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Employees</h5>
                            <h2>{{ $totalEmployees }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5>Total Tasks</h5>
                            <h2>{{ $totalTasks }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5>Completed Tasks</h5>
                            <h2>{{ $completedTasks }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <h5>Total Attendance</h5>
                            <h2>{{ $totalAttendance }}</h2>
                        </div>
                    </div>
                </div>

            </div>

     <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5>ai assistant</h5>        <!-- Attendance -->
    <a href="/ai-assistant"
       class="nav-link text-white">

       AI Assistant

    </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Invoices</h5> 
                            <a href="/invoices"
       class="nav-link text-white">

      invoices

    </a>    <!-- Attendance -->
 </div>
                    </div>
                </div>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5>Present Today</h5>
                            <h2>{{ $presentToday }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5>Absent Today</h5>
                            <h2>{{ $absentToday }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h5>Half Day</h5>
                            <h2>{{ $halfDayToday }}</h2>
                        </div>
                    </div>
                </div>

            </div>
        <div class="card mt-4">

    <div class="card-header">
        Task Analytics
    </div>

    <div class="card-body">

        <canvas id="taskChart"></canvas>

    </div>

</div>
            <!-- Progress -->

            <div class="card mt-4">

                <div class="card-header">
                    Project Progress
                </div>

                <div class="card-body">

                    <div class="progress">

                        <div class="progress-bar bg-success"
                             role="progressbar"
                             style="width: {{ $progress }}%">

                            {{ round($progress) }}%

                        </div>

                    </div>

                </div>

            </div>
    <div class="card mt-4">

    <div class="card-header">
        Attendance Analytics
    </div>

    <div class="card-body">

        <canvas id="attendanceChart"></canvas>

    </div>

</div>
        </div>

    </div>

</div>
<script>

const taskCtx =
document.getElementById('taskChart');

new Chart(taskCtx, {

    type: 'doughnut',

    data: {

        labels: [
            'Completed',
            'Remaining'
        ],

        datasets: [{

            data: [
                {{ $completedTasks }},
                {{ $totalTasks - $completedTasks }}
            ]

        }]
    }
});

const attendanceCtx =
document.getElementById('attendanceChart');

new Chart(attendanceCtx, {

    type: 'bar',

    data: {

        labels: [
            'Present',
            'Absent',
            'Half Day'
        ],

        datasets: [{

            label: 'Attendance',

            data: [
                {{ $presentToday }},
                {{ $absentToday }},
                {{ $halfDayToday }}
            ]

        }]
    }
});

</script>
</body>
</html>