<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            ➕ Create New Task
        </h2>

        <p class="text-muted">
            Fill in the details below to assign a new task.
        </p>

    </div>

    <a href="{{ route('tasks.index') }}"
       class="btn btn-outline-secondary">

        ← Back to Tasks

    </a>

</div>

<div class="card shadow border-0">

    <div class="card-body p-4">

        <form method="POST"
              action="{{ route('tasks.store') }}"
              enctype="multipart/form-data">

            @csrf
        <div class="row">

<div class="col-md-6 mb-3">

           <label class="form-label fw-semibold">

    Task Title

</label>

            <input type="text"
                   name="title"
                   class="form-control">

        </div>

        <div class="col-md-12 mb-3">

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
       <div class="d-flex justify-content-end mt-4">

    <button
        class="btn btn-primary btn-lg">

        💾 Save Task

    </button>

</div>

    </form>
        </div>

</div>
</div>

</x-app-layout>