<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1 class="text-center">Project Anouncement {{$projects[0]->status}} </h1>
    </div>
    
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
