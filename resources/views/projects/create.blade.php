<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <h1>Add Project</h1>

    <form action="{{ route('projects.store') }}"
          method="POST">

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

        <button class="btn btn-success">

            Save Project

        </button>

    </form>

</div>

</x-app-layout>