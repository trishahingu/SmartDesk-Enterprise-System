<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Timesheet Records</h2>

    <a href="{{ route('timesheets.create') }}"
       class="btn btn-primary mb-3">

       Add Timesheet

    </a>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>User</th>
            <th>Date</th>
            <th>Clock In</th>
            <th>Clock Out</th>
            <th>Total Hours</th>
            <th>Notes</th>

        </tr>

        @foreach($timesheets as $sheet)

        <tr>

            <td>{{ $sheet->id }}</td>

            <td>{{ $sheet->user->name }}</td>

            <td>{{ $sheet->work_date }}</td>

            <td>{{ $sheet->clock_in }}</td>

            <td>{{ $sheet->clock_out }}</td>

            <td>{{ $sheet->total_hours }} hrs</td>

            <td>{{ $sheet->work_notes }}</td>

        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>