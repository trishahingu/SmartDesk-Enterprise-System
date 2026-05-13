<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <h1>Project List</h1>

    <a href="{{ route('projects.create') }}"
       class="btn btn-primary mb-3">

       Add Project

    </a>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>Title</th>
            <th>Description</th>

        </tr>

        @foreach($projects as $project)

        <tr>

            <td>{{ $project->id }}</td>

            <td>{{ $project->title }}</td>

            <td>{{ $project->description }}</td>

        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>