<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Attendance List</h2>

    <a href="{{ route('attendance.create') }}"
       class="btn btn-primary mb-3">

       Add Attendance

    </a>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>User</th>
            <th>Date</th>
            <th>Status</th>
            <th>Login</th>
            <th>Logout</th>

        </tr>

        @foreach($attendances as $attendance)

        <tr>

            <td>{{ $attendance->id }}</td>

            <td>{{ $attendance->user->name }}</td>

            <td>{{ $attendance->attendance_date }}</td>

            <td>

                @if($attendance->status == 'Present')

                    <span class="badge bg-success">

                        Present

                    </span>

                @elseif($attendance->status == 'Absent')

                    <span class="badge bg-danger">

                        Absent

                    </span>

                @else

                    <span class="badge bg-warning">

                        Half-Day

                    </span>

                @endif

            </td>

            <td>{{ $attendance->login_time }}</td>

            <td>{{ $attendance->logout_time }}</td>

        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>