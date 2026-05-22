<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Leave Requests</h2>

    <a href="{{ route('leave-requests.create') }}"
       class="btn btn-primary mb-3">

       Apply Leave

    </a>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>User</th>
            <th>Type</th>
            <th>From</th>
            <th>To</th>
            <th>Status</th>
            <th>Action</th>

        </tr>

        @foreach($leaveRequests as $leave)

        <tr>

            <td>{{ $leave->id }}</td>

            <td>{{ $leave->user->name }}</td>

            <td>{{ $leave->leave_type }}</td>

            <td>{{ $leave->from_date }}</td>

            <td>{{ $leave->to_date }}</td>

            <td>

                <span class="badge bg-warning">

                    {{ $leave->status }}

                </span>

            </td>
        <td>

    @if($leave->status == 'Approved')

        <span class="badge bg-success">

            Approved

        </span>

    @elseif($leave->status == 'Rejected')

        <span class="badge bg-danger">

            Rejected

        </span>

    @else

        <span class="badge bg-warning">

            Pending

        </span>

    @endif

</td>

<td>

    <a href="/leave-requests/{{ $leave->id }}/approve"
       class="btn btn-success btn-sm">

       Approve

    </a>

    <a href="/leave-requests/{{ $leave->id }}/reject"
       class="btn btn-danger btn-sm">

       Reject

    </a>

</td>
        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>