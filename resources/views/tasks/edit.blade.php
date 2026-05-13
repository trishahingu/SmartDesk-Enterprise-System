<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Title</label>

            <input type="text"
                   name="title"
                   value="{{ $task->title }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control">{{ $task->description }}</textarea>

        </div>

        <div class="mb-3">

    <label>Project</label>

    <select name="project_id" class="form-control">

        @foreach($projects as $project)

            <option value="{{ $project->id }}"
                {{ $task->project_id == $project->id ? 'selected' : '' }}>

                {{ $project->title }}

            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label>Assigned User</label>

    <select name="assigned_to" class="form-control">

        @foreach($users as $user)

            <option value="{{ $user->id }}"
                {{ $task->assigned_to == $user->id ? 'selected' : '' }}>

                {{ $user->name }}

            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label>Status</label>

    <select name="status" class="form-control">

        <option value="Pending"
            {{ $task->status == 'Pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="In Progress"
            {{ $task->status == 'In Progress' ? 'selected' : '' }}>
            In Progress
        </option>

        <option value="Completed"
            {{ $task->status == 'Completed' ? 'selected' : '' }}>
            Completed
        </option>

    </select>

</div>

<div class="mb-3">

    <label>Priority</label>

    <select name="priority" class="form-control">

        <option value="Low"
            {{ $task->priority == 'Low' ? 'selected' : '' }}>
            Low
        </option>

        <option value="Medium"
            {{ $task->priority == 'Medium' ? 'selected' : '' }}>
            Medium
        </option>

        <option value="High"
            {{ $task->priority == 'High' ? 'selected' : '' }}>
            High
        </option>

    </select>

</div>

<div class="mb-3">

    <label>Deadline</label>

    <input type="date"
           name="deadline"
           value="{{ $task->deadline }}"
           class="form-control">

</div>
        <button class="btn btn-success">

            Update Task

        </button>

    </form>

</div>

</x-app-layout>