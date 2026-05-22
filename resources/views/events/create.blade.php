<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">

    <h2>Add Event</h2>

    <form method="POST"
          action="{{ route('events.store') }}">

        @csrf

        <div class="mb-3">

            <label>Event Title</label>

            <input type="text"
                   name="title"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Event Date</label>

            <input type="date"
                   name="event_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control"></textarea>

        </div>

        <button class="btn btn-success">

            Save Event

        </button>

    </form>

</div>

</x-app-layout>