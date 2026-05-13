<!DOCTYPE html>
<html>

<head>

    <title>Task Report</title>

    <style>

        table {

            width: 100%;
            border-collapse: collapse;
        }

        th, td {

            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

    </style>

</head>

<body>

    <h2>Task Report</h2>

    <table>

        <tr>

            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Priority</th>

        </tr>

        @foreach($tasks as $task)

        <tr>

            <td>{{ $task->id }}</td>

            <td>{{ $task->title }}</td>

            <td>{{ $task->status }}</td>

            <td>{{ $task->priority }}</td>

        </tr>

        @endforeach

    </table>

</body>

</html>