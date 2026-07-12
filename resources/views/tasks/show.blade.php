<x-app-layout>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            📋 Task Details
        </h2>

        <p class="text-muted">
            View task information and collaborate using comments.
        </p>

    </div>

    <a href="{{ route('tasks.index') }}"
       class="btn btn-outline-secondary">

        ← Back

    </a>

</div>

<div class="card shadow border-0">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="fw-bold">Task Title</label>

                <p>{{ $task->title }}</p>

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">Project</label>

                <p>{{ $task->project->title }}</p>

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">Assigned To</label>

                <p>{{ $task->user->name }}</p>

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">Deadline</label>

                <p>{{ $task->deadline }}</p>

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">Status</label>

                <p>

                    @if($task->status=='Completed')

                        <span class="badge bg-success">

                            {{ $task->status }}

                        </span>

                    @elseif($task->status=='In Progress')

                        <span class="badge bg-warning text-dark">

                            {{ $task->status }}

                        </span>

                    @else

                        <span class="badge bg-secondary">

                            {{ $task->status }}

                        </span>

                    @endif

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">Priority</label>

                <p>

                    @if($task->priority=='High')

                        <span class="badge bg-danger">

                            High

                        </span>

                    @elseif($task->priority=='Medium')

                        <span class="badge bg-warning text-dark">

                            Medium

                        </span>

                    @else

                        <span class="badge bg-success">

                            Low

                        </span>

                    @endif

                </p>

            </div>

            <div class="col-12">

                <label class="fw-bold">

                    Description

                </label>

                <div class="border rounded p-3 bg-light">

                    {{ $task->description }}

                </div>

            </div>

        </div>

    </div>

</div>

    <p>
        <strong>Priority:</strong> {{ $task->priority }}
    </p>

    <hr>

   <h4 class="mt-5 mb-3">

💬 Comments

</h4>

    @forelse($task->comments as $comment)
        <div class="card shadow-sm border-0 mb-3">

<div class="card-body">

<h6 class="fw-bold">

👤 {{ $comment->user->name }}

</h6>

<p class="mb-2">

{{ $comment->comment }}

</p>

<small class="text-muted">

{{ $comment->created_at->diffForHumans() }}

</small>

</div>

</div>

    @empty

        <p>No comments yet.</p>

    @endforelse

    <hr>
    <div class="card shadow border-0 mt-4">

<div class="card-body">

<h5 class="mb-3">

➕ Add Comment

</h5>

<form
action="{{ route('comments.store',$task) }}"
method="POST">

@csrf

        @csrf

        <textarea
            class="form-control"
            name="comment"
            placeholder="Write your comment..."
            required></textarea>

        <br>
    <button
class="btn btn-success">

💬 Post Comment

</button>

    </form>
</div>

</div>
</div>

</x-app-layout>