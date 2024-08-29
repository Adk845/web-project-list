<!DOCTYPE html>
<html>
<head>
    <title>Project List PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Project List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Project Number</th>
                <th>Project Manager</th>
                <th>Location</th>
                <th>Client</th>
                <th>Start Date</th>
                <th>Finish Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->project_number }}</td>
                <td>{{ $project->project_manager }}</td>
                <td>{{ $project->project_location }}</td>
                <td>{{ $project->client }}</td>
                <td>{{ $project->project_start }}</td>
                <td>{{ $project->project_finish }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
