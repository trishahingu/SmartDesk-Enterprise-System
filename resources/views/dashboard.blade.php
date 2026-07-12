<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid">

    <!-- Welcome Banner -->

    <div class="row mb-4">

        <div class="col-12">

            <div class="card border-0 shadow-lg"
                 style="border-radius:25px;
                        background:linear-gradient(135deg,#4f46e5,#2563eb);">

                <div class="card-body p-5 text-white">

                    <div class="row align-items-center">

                        <div class="col-lg-8">

                            <h1 class="fw-bold display-6">

                                Welcome Back,
                                {{ Auth::user()->name }} 👋

                            </h1>

                            <p class="fs-5 opacity-75">

                                Manage your projects, employees,
                                attendance, AI assistant and analytics
                                from one dashboard.

                            </p>

                        </div>

                        <div class="col-lg-4 text-end">

                            <i class="bi bi-speedometer2"
                               style="font-size:90px;"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- KPI Cards -->

    <div class="row g-4">

        <div class="col-lg-3">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Company

                            </small>

                            <h3 class="fw-bold mt-2">

                                {{ $company->name ?? 'Not Assigned' }}

                            </h3>

                        </div>

                        <div class="bg-primary rounded-circle
                                    d-flex align-items-center
                                    justify-content-center"

                             style="width:60px;height:60px;">

                            <i class="bi bi-buildings-fill
                                      text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Employees

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalEmployees }}

                            </h2>

                        </div>

                        <div class="bg-success rounded-circle
                                    d-flex align-items-center
                                    justify-content-center"

                             style="width:60px;height:60px;">

                            <i class="bi bi-people-fill
                                      text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Projects

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalProjects }}

                            </h2>

                        </div>

                        <div class="bg-warning rounded-circle
                                    d-flex align-items-center
                                    justify-content-center"

                             style="width:60px;height:60px;">

                            <i class="bi bi-folder-fill
                                      text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Tasks

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalTasks }}

                            </h2>

                        </div>

                        <div class="bg-danger rounded-circle
                                    d-flex align-items-center
                                    justify-content-center"

                             style="width:60px;height:60px;">

                            <i class="bi bi-check2-square
                                      text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Second KPI Row -->

    <div class="row g-4 mt-1">

        <div class="col-lg-3">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <h6 class="text-muted">

                        Plan

                    </h6>

                    <h3 class="fw-bold text-success">

                        {{ $company->plan_type ?? 'Free' }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <h6 class="text-muted">

                        Users

                    </h6>

                    <h3 class="fw-bold text-primary">

                        {{ $totalUsers }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <h6 class="text-muted">

                        Completed

                    </h6>

                    <h3 class="fw-bold text-success">

                        {{ $completedTasks }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <h6 class="text-muted">

                        Attendance

                    </h6>

                    <h3 class="fw-bold text-dark">

                        {{ $totalAttendance }}

                    </h3>

                </div>

            </div>

        </div>

    </div>
        <!-- Quick Actions -->

    <div class="row mt-5">

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <h4 class="fw-bold mb-4">

                        🤖 AI Productivity Assistant

                    </h4>

                    <p class="text-muted">

                        Generate project summaries,
                        emails, reports and ideas using AI.

                    </p>

                    <a href="/ai-assistant"
                       class="btn btn-primary mt-3">

                        Open AI Assistant

                    </a>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <h4 class="fw-bold mb-4">

                        💰 Invoices

                    </h4>

                    <p class="text-muted">

                        Generate and download invoices
                        for your organization.

                    </p>

                    <a href="/invoices"
                       class="btn btn-success mt-3">

                        View Invoices

                    </a>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <h4 class="fw-bold mb-4">

                        ⚡ Quick Actions

                    </h4>

                    <div class="d-grid gap-2">

                        <a href="/projects/create"
                           class="btn btn-outline-primary">

                            New Project

                        </a>

                        <a href="/tasks/create"
                           class="btn btn-outline-success">

                            New Task

                        </a>

                        <a href="/employees/create"
                           class="btn btn-outline-dark">

                            Add Employee

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Attendance Cards -->

    <div class="row mt-4">

        <div class="col-lg-4">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <i class="bi bi-check-circle-fill
                              text-success fs-1"></i>

                    <h5 class="mt-3">

                        Present Today

                    </h5>

                    <h2 class="fw-bold">

                        {{ $presentToday }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <i class="bi bi-x-circle-fill
                              text-danger fs-1"></i>

                    <h5 class="mt-3">

                        Absent Today

                    </h5>

                    <h2 class="fw-bold">

                        {{ $absentToday }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow">

                <div class="card-body text-center">

                    <i class="bi bi-clock-fill
                              text-warning fs-1"></i>

                    <h5 class="mt-3">

                        Half Day

                    </h5>

                    <h2 class="fw-bold">

                        {{ $halfDayToday }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Charts -->

    <div class="row mt-5">

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow">

                <div class="card-header bg-white">

                    <h5 class="fw-bold">

                        📈 Task Analytics

                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="taskChart"></canvas>

                </div>

            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow">

                <div class="card-header bg-white">

                    <h5 class="fw-bold">

                        📊 Attendance Analytics

                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="attendanceChart"></canvas>

                </div>

            </div>

        </div>

    </div>

    <!-- Progress -->

    <div class="card border-0 shadow mt-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold">

                📅 Project Progress

            </h5>

        </div>

        <div class="card-body">

            <div class="progress"
                 style="height:25px;">

                <div class="progress-bar
                            progress-bar-striped
                            progress-bar-animated
                            bg-success"

                     style="width:{{ $progress }}%;">

                    {{ round($progress) }}%

                </div>

            </div>

        </div>

    </div>
        <!-- Bottom Widgets -->

    <div class="row mt-5">

        <!-- Company Information -->

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-header bg-white">

                    <h5 class="fw-bold">

                        🏢 Company Information

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-borderless">

                        <tr>

                            <th>Company</th>

                            <td>{{ $company->name ?? 'Not Assigned' }}</td>

                        </tr>

                        <tr>

                            <th>Subscription</th>

                            <td>{{ $company->plan_type ?? 'Free Plan' }}</td>

                        </tr>

                        <tr>

                            <th>Total Users</th>

                            <td>{{ $totalUsers }}</td>

                        </tr>

                        <tr>

                            <th>Total Employees</th>

                            <td>{{ $totalEmployees }}</td>

                        </tr>

                        <tr>

                            <th>Total Projects</th>

                            <td>{{ $totalProjects }}</td>

                        </tr>

                        <tr>

                            <th>Total Tasks</th>

                            <td>{{ $totalTasks }}</td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- Quick Navigation -->

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-header bg-white">

                    <h5 class="fw-bold">

                        🚀 Quick Navigation

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-6">

                            <a href="/companies"
                               class="btn btn-outline-primary w-100">

                                Companies

                            </a>

                        </div>

                        <div class="col-6">

                            <a href="/employees"
                               class="btn btn-outline-success w-100">

                                Employees

                            </a>

                        </div>

                        <div class="col-6">

                            <a href="/projects"
                               class="btn btn-outline-warning w-100">

                                Projects

                            </a>

                        </div>

                        <div class="col-6">

                            <a href="/tasks"
                               class="btn btn-outline-danger w-100">

                                Tasks

                            </a>

                        </div>

                        <div class="col-6">

                            <a href="/attendance"
                               class="btn btn-outline-dark w-100">

                                Attendance

                            </a>

                        </div>

                        <div class="col-6">

                            <a href="/analytics"
                               class="btn btn-outline-info w-100">

                                Analytics

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const taskCtx = document.getElementById('taskChart');

new Chart(taskCtx,{

type:'doughnut',

data:{

labels:['Completed','Remaining'],

datasets:[{

data:[

{{ $completedTasks }},

{{ $totalTasks-$completedTasks }}

],

backgroundColor:[

'#22c55e',

'#e5e7eb'

]

}]

}

});

const attendanceCtx=document.getElementById('attendanceChart');

new Chart(attendanceCtx,{

type:'bar',

data:{

labels:[

'Present',

'Absent',

'Half Day'

],

datasets:[{

label:'Attendance',

data:[

{{ $presentToday }},

{{ $absentToday }},

{{ $halfDayToday }}

],

backgroundColor:[

'#22c55e',

'#ef4444',

'#facc15'

]

}]

}

});

</script>

</x-app-layout>