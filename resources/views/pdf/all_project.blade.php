<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Project List</h1>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Category</th>
                    <th>Project Number</th>
                    <th>Project Manager</th>
                    <th>Project Location</th>
                    <th>Client</th>
                    <th>Sector</th>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Project Start</th>
                    <th>Project Finish</th>
                    <th>Project Image</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $key => $project)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $project->category }}</td>
                    <td>{{ $project->project_number }}</td>
                    <td>{{ $project->project_manager }}</td>
                    <td>{{ $project->project_location }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->sector }}</td>
                    <td>{{ $project->service }}</td>
                    <td>{!! $project->project_description !!}</td>
                    <td>{{ $project->project_start->format('d-m-Y') }}</td>
                    <td>{{ $project->project_finish->format('d-m-Y') }}</td>
                    <td> @if ($project->project_picture)
                        <img src="{{ public_path('storage/' . $project->project_picture) }}" alt="Project Picture">
                        @else
                        No Image
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" style="text-align: center;">No projects found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>