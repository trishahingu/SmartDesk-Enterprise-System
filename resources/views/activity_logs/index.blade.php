<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Activity Logs</h2>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>User</th>
            <th>Activity</th>
            <th>Time</th>

        </tr>

        @foreach($logs as $log)

        <tr>

            <td>{{ $log->id }}</td>

            <td>

                {{ $log->user->name ?? 'N/A' }}

            </td>

            <td>{{ $log->activity }}</td>

            <td>{{ $log->created_at }}</td>

        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>