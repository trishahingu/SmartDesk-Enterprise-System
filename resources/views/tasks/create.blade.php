<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4">

    <h1>Add Task</h1>

<form method="POST"
      action="{{ route('tasks.store') }}"
      enctype="multipart/form-data">
        @csrf

        <div class="mb-3">

            <label>Title</label>

            <input type="text"
                   name="title"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>Project</label>

            <select name="project_id"
                    class="form-control">

                @foreach($projects as $project)

                <option value="{{ $project->id }}">

                    {{ $project->title }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Assign User</label>

            <select name="assigned_to"
                    class="form-control">

                @foreach($users as $user)

                <option value="{{ $user->id }}">

                    {{ $user->name }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option>Pending</option>

                <option>In Progress</option>

                <option>Completed</option>

            </select>

        </div>

        <div class="mb-3">

            <label>Priority</label>

            <select name="priority"
                    class="form-control">

                <option>Low</option>

                <option>Medium</option>

                <option>High</option>

            </select>

        </div>

        <div class="mb-3">

            <label>Deadline</label>

            <input type="date"
                   name="deadline"
                   class="form-control">

        </div>
<div class="mb-3">

    <label>Attachment</label>

    <input type="file"
           name="attachment"
           class="form-control">

</div>
        <button class="btn btn-success">

            Save Task

        </button>

    </form>

</div>

</x-app-layout>