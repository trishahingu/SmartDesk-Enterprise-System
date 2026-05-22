<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Add Timesheet</h2>

    <form method="POST"
          action="{{ route('timesheets.store') }}">

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

            <label>Work Date</label>

            <input type="date"
                   name="work_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Clock In</label>

            <input type="time"
                   name="clock_in"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Clock Out</label>

            <input type="time"
                   name="clock_out"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Work Notes</label>

            <textarea name="work_notes"
                      class="form-control"></textarea>

        </div>

        <button class="btn btn-success">

            Save Timesheet

        </button>

    </form>

</div>

</x-app-layout>