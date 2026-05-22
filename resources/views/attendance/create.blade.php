<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Add Attendance</h2>

    <form method="POST"
          action="{{ route('attendance.store') }}">

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

            <label>Date</label>

            <input type="date"
                   name="attendance_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option>Present</option>

                <option>Absent</option>

                <option>Half-Day</option>

            </select>

        </div>

        <div class="mb-3">

            <label>Login Time</label>

            <input type="time"
                   name="login_time"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Logout Time</label>

            <input type="time"
                   name="logout_time"
                   class="form-control">

        </div>

        <button class="btn btn-success">

            Save Attendance

        </button>

    </form>

</div>

</x-app-layout>