<!DOCTYPE html>
<html>

<head>

    <title>AI Productivity Assistant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">
        AI Productivity Assistant
    </h1>

    <table class="table table-bordered">

        <tr>

            <th>Task</th>

            <th>Deadline</th>

            <th>AI Priority</th>

            <th>Risk Level</th>

            <th>Recommendation</th>

        </tr>

        @foreach($tasks as $task)

        <tr>

            <td>{{ $task->title }}</td>

            <td>{{ $task->deadline }}</td>

            <td>{{ $task->ai_priority }}</td>

            <td>{{ $task->risk }}</td>

            <td>{{ $task->recommendation }}</td>

        </tr>

        @endforeach

    </table>

</div>

</body>

</html>