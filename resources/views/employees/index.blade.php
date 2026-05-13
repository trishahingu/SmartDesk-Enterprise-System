<form action="/employees" method="GET" class="mb-3">

    <input type="text"
           name="search"
           class="form-control"
           placeholder="Search employee...">

</form>
<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Employee List</h2>

    <a href="/employees/create" class="btn btn-primary mb-3">
        Add Employee
    </a>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        @foreach($employees as $employee)

        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->department }}</td>
            <td>

    <a href="/employees/{{ $employee->id }}/edit"
       class="btn btn-warning">
       Edit
    </a>

    <form action="/employees/{{ $employee->id }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger">
            Delete
        </button>

    </form>

</td>
        </tr>

        @endforeach

    </table>
<div class="mt-3">

    {{ $employees->links() }}

</div>
</div>

</body>
</html>