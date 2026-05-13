@if ($errors->any())

<div class="alert alert-danger">

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Employee</h2>

    <form action="/employees/{{ $employee->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $employee->name }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ $employee->email }}">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text"
                   name="phone"
                   class="form-control"
                   value="{{ $employee->phone }}">
        </div>

        <div class="mb-3">
            <label>Department</label>
            <input type="text"
                   name="department"
                   class="form-control"
                   value="{{ $employee->department }}">
        </div>

        <button type="submit" class="btn btn-success">
            Update Employee
        </button>

    </form>

</div>

</body>
</html>