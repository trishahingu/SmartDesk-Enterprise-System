<!DOCTYPE html>
<html>
<head>

    <title>SmartDesk Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->

    <div class="bg-dark text-white p-3"
         style="width:250px; height:100vh;">

        <h3>SmartDesk</h3>

        <hr>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">

                <a href="/dashboard"
                   class="nav-link text-white">

                    Dashboard

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/employees"
                   class="nav-link text-white">

                    Employees

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/projects"
                   class="nav-link text-white">

                    Projects

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/tasks"
                   class="nav-link text-white">

                    Tasks

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/profile"
                   class="nav-link text-white">

                    Profile

                </a>

            </li>

        </ul>

    </div>

    <!-- Main Content -->

    <div class="container-fluid p-4">

        <h2>Dashboard</h2>

        <div class="row mt-4">

            <!-- Total Employees -->

            <div class="col-md-4">

                <div class="card bg-primary text-white">

                    <div class="card-body">

                        <h5>Total Employees</h5>

                        <h2>{{ $totalEmployees }}</h2>

                    </div>

                </div>

            </div>

            <!-- Total Users -->

            <div class="col-md-4">

                <div class="card bg-success text-white">

                    <div class="card-body">

                        <h5>Total Users</h5>

                        <h2>{{ $totalUsers }}</h2>

                    </div>

                </div>

            </div>

            <!-- Total Tasks -->

            <div class="col-md-4">

                <div class="card bg-warning text-dark">

                    <div class="card-body">

                        <h5>Total Tasks</h5>

                        <h2>{{ $totalTasks }}</h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- Completed Tasks -->

        <div class="row mt-4">

            <div class="col-md-4">

                <div class="card bg-info text-white">

                    <div class="card-body">

                        <h5>Completed Tasks</h5>

                        <h2>{{ $completedTasks }}</h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- Progress Bar -->

        <div class="card p-4 mt-4">

            <h4>Project Progress</h4>

            <div class="progress mt-3">

                <div class="progress-bar bg-success"
                     role="progressbar"
                     style="width: {{ $progress }}%">

                    {{ round($progress) }}%

                </div>

            </div>

        </div>

    </div>

</div>
<div class="card p-4 mt-4">

    <h4>Notifications</h4>

    <ul class="list-group mt-3">

        @foreach(auth()->user()->notifications as $notification)

            <li class="list-group-item">

                {{ $notification->data['message'] }}

            </li>

        @endforeach

    </ul>

</div>
</body>
</html>