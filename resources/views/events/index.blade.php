<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Events Calendar</h2>

    <a href="{{ route('events.create') }}"
       class="btn btn-primary mb-3">

       Add Event

    </a>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Description</th>

        </tr>

        @foreach($events as $event)

        <tr>

            <td>{{ $event->id }}</td>

            <td>{{ $event->title }}</td>

            <td>{{ $event->event_date }}</td>

            <td>{{ $event->description }}</td>

        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>