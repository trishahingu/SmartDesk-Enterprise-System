<x-app-layout>

<div class="container mt-4">

    <h2>Activity Timeline</h2>

    @forelse($activities as $activity)

        <div class="card mb-3">

            <div class="card-body">

                <strong>{{ $activity->user->name ?? 'System' }}</strong>

                <br>

                {{ $activity->activity }}

                <br>

                <small class="text-muted">
                    {{ $activity->created_at->diffForHumans() }}
                </small>

            </div>

        </div>

    @empty

        <div class="alert alert-info">
            No activities found.
        </div>

    @endforelse

    {{ $activities->links() }}

</div>

</x-app-layout>