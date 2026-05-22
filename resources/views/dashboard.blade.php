<!DOCTYPE html>
<html>

<head>

    <title>SmartDesk Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->

    <div class="bg-dark text-white p-3"
         style="width:250px; min-height:100vh;">

        <h2>SmartDesk</h2>

        <hr>

        <ul class="nav flex-column">

            <li class="nav-item mb-3">

                <a href="/dashboard"
                   class="nav-link text-white">

                    Dashboard

                </a>

            </li>

            <li class="nav-item mb-3">

                <a href="/employees"
                   class="nav-link text-white">

                    Employees

                </a>

            </li>

            <li class="nav-item mb-3">

                <a href="/projects"
                   class="nav-link text-white">

                    Projects

                </a>

            </li>

            <li class="nav-item mb-3">

                <a href="/tasks"
                   class="nav-link text-white">

                    Tasks

                </a>

            </li>

            <li class="nav-item mb-3">

                <a href="/attendance"
                   class="nav-link text-white">

                    Attendance

                </a>

            </li>

            <li class="nav-item mb-3">

                <a href="/leave-requests"
                   class="nav-link text-white">

                    Leave Requests

                </a>

            </li>

            <li class="nav-item mb-3">

    <a href="/timesheets"
       class="nav-link text-white">

        Timesheets

    </a>

</li>
            <li class="nav-item mb-3">

    <a href="/backup/database"
       class="nav-link text-white">

        Backup Database

    </a>

</li>
<li class="nav-item mb-3">

    <a href="/events"
       class="nav-link text-white">

        Events Calendar

    </a>

</li>
            <li class="nav-item mb-3">

                <a href="/activity-logs"
                   class="nav-link text-white">

                    Activity Logs

                </a>

            </li>

            <li class="nav-item mb-3">

                <a href="/profile"
                   class="nav-link text-white">

                    Profile

                </a>

            </li>

        </ul>

    </div>

    <!-- Main Content -->

    <div class="container-fluid p-4">

        <!-- Header -->

        <div class="d-flex justify-content-between align-items-center">

            <h1>Dashboard</h1>

            <button class="btn btn-dark"
                    onclick="toggleDarkMode()">

                🌙 Toggle Dark Mode

            </button>

        </div>

        <!-- Top Cards -->

        <div class="row mt-4">

            <div class="col-md-3 mb-3">

                <div class="card bg-primary text-white">

                    <div class="card-body">

                        <h4>Total Employees</h4>

                        <h1>{{ $totalEmployees }}</h1>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card bg-success text-white">

                    <div class="card-body">

                        <h4>Total Users</h4>

                        <h1>{{ $totalUsers }}</h1>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card bg-dark text-white">

                    <div class="card-body">

                        <h4>Total Tasks</h4>

                        <h1>{{ $totalTasks }}</h1>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card bg-info text-white">

                    <div class="card-body">

                        <h4>Completed Tasks</h4>

                        <h1>{{ $completedTasks }}</h1>

                    </div>

                </div>

            </div>

        </div>

        <!-- Attendance Cards -->

        <div class="row">

            <div class="col-md-3 mb-3">

                <div class="card bg-success text-white">

                    <div class="card-body">

                        <h4>Present Today</h4>

                        <h1>{{ $presentToday }}</h1>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card bg-danger text-white">

                    <div class="card-body">

                        <h4>Absent Today</h4>

                        <h1>{{ $absentToday }}</h1>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card bg-warning text-white">

                    <div class="card-body">

                        <h4>Half-Day</h4>

                        <h1>{{ $halfDayToday }}</h1>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card bg-secondary text-white">

                    <div class="card-body">

                        <h4>Total Attendance</h4>

                        <h1>{{ $totalAttendance }}</h1>

                    </div>

                </div>

            </div>

        </div>

        <!-- Project Progress -->

        <div class="card p-4 mt-4">

            <h3>Project Progress</h3>

            <div class="progress mt-3"
                 style="height:30px;">

                <div class="progress-bar bg-success"
                     style="width: {{ $progress }}%;">

                    {{ round($progress) }}%

                </div>

            </div>

        </div>

        <!-- Notifications -->

        <div class="card p-4 mt-4">

            <h3>Notifications</h3>

            <ul class="list-group mt-3">

                @foreach(auth()->user()->notifications as $notification)

                    <li class="list-group-item">

                        {{ $notification->data['message'] }}

                    </li>

                @endforeach

            </ul>

        </div>

    </div>

</div>

<!-- Dark Mode Script -->

<script>

function toggleDarkMode()
{
    document.body.classList.toggle('bg-dark');

    document.body.classList.toggle('text-white');

    localStorage.setItem(
        'darkMode',
        document.body.classList.contains('bg-dark')
    );
}

window.onload = function()
{
    if(localStorage.getItem('darkMode') === 'true')
    {
        document.body.classList.add('bg-dark');

        document.body.classList.add('text-white');
    }
}

</script>

</body>

</html>