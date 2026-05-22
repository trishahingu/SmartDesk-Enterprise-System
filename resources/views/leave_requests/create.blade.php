<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Apply Leave</h2>

    <form method="POST"
          action="{{ route('leave-requests.store') }}">

        @csrf

        <div class="mb-3">

            <label>User</label>

            <select name="user_id"
                    class="form-control">

                @foreach($users as $user)

                <option value="{{ $user->id }}">

                    {{ $user->name }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Leave Type</label>

            <select name="leave_type"
                    class="form-control">

                <option>Sick Leave</option>

                <option>Casual Leave</option>

                <option>Paid Leave</option>

            </select>

        </div>

        <div class="mb-3">

            <label>From Date</label>

            <input type="date"
                   name="from_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>To Date</label>

            <input type="date"
                   name="to_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Reason</label>

            <textarea name="reason"
                      class="form-control"></textarea>

        </div>

        <button class="btn btn-success">

            Apply Leave

        </button>

    </form>

</div>

</x-app-layout>