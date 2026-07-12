<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            📋 Task Management
        </h2>

        <p class="text-muted mb-0">
            Manage and monitor all project tasks from one place.
        </p>

    </div>

    <a href="{{ route('tasks.create') }}"
       class="btn btn-primary btn-lg">

        + Add New Task

    </a>

</div>

    <!-- Search & Filter Form -->

    <form method="GET"
          action="{{ route('tasks.index') }}"
          class="row mb-4">

        <div class="col-md-4">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search Task">

        </div>

        <div class="col-md-3">

            <select name="status"
                    class="form-control">

                <option value="">All Status</option>

                <option value="Pending">Pending</option>

                <option value="In Progress">In Progress</option>

                <option value="Completed">Completed</option>

            </select>

        </div>

        <div class="col-md-3">

            <select name="priority"
                    class="form-control">

                <option value="">All Priority</option>

                <option value="Low">Low</option>

                <option value="Medium">Medium</option>

                <option value="High">High</option>

            </select>

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary w-100">

                Filter

            </button>

        </div>

    </form>

    <!-- Add Task Button -->
    
    <div class="mb-3">

    <a href="/tasks/pdf"
       class="btn btn-outline-danger">

        📄 Export PDF

    </a>

    <a href="/tasks/excel"
       class="btn btn-outline-success">

        📊 Export Excel

    </a>

</div>
    <!-- Task Table -->

    <table class="table table-hover align-middle shadow-sm bg-white rounded">

        <thead>

            <tr>

                <th>ID</th>
                <th>Title</th>
                <th>Project</th>
                <th>Assigned User</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Deadline</th>
                <th>Actions</th>
                <th>Attachment</th>

            </tr>

        </thead>

        <tbody>

            @foreach($tasks as $task)

            <tr>

                <td>{{ $task->id }}</td>

                <td>{{ $task->title }}</td>

                <td>{{ $task->project->title }}</td>

                <td>{{ $task->user->name }}</td>

                <td>

                    @if($task->status == 'Completed')

                        <span class="badge bg-success">

                            {{ $task->status }}

                        </span>

                    @elseif($task->status == 'In Progress')

                        <span class="badge bg-warning text-dark">

                            {{ $task->status }}

                        </span>

                    @else

                        <span class="badge bg-secondary">

                            {{ $task->status }}

                        </span>

                    @endif

                </td>

                <td>

                    @if($task->priority == 'High')

                        <span class="badge bg-danger">

                            {{ $task->priority }}

                        </span>

                    @elseif($task->priority == 'Medium')

                        <span class="badge bg-warning text-dark">

                            {{ $task->priority }}

                        </span>

                    @else

                        <span class="badge bg-success">

                            {{ $task->priority }}

                        </span>

                    @endif

                </td>

                <td>{{ $task->deadline }}</td>

                <!-- Actions -->
            <td>
        <a href="{{ route('tasks.show', $task->id) }}"
   class="btn btn-outline-primary btn-sm">

    👁 View

</a>

<a href="{{ route('tasks.edit', $task->id) }}"
   class="btn btn-outline-warning btn-sm">

    ✏ Edit

</a>
    @csrf

        @method('DELETE')
<button class="btn btn-outline-danger btn-sm">

    🗑 Delete

</button>
    

    </form>

</td>

                <!-- Attachment -->

                <td>

                    @if($task->attachment)

                        <a href="{{ asset('uploads/' . $task->attachment) }}"
                           target="_blank"
                           class="btn btn-info btn-sm">

                           View File

                        </a>

                    @endif

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</x-app-layout>