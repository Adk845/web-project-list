<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f5f5;
            color: #000; /* Ganti menjadi hitam */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow lebih ringan */
            overflow-x: auto;
        }

/* ============TABLE STYLE====================== */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            vertical-align: top;
            border: 1px solid #ddd; /* Hapus warna latar belakang pada header tabel */
        }

        th {
            font-weight: bold;
            background-color: #d6a62d;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Background ringan untuk baris genap */
        }

        tbody tr:hover {
            background-color: #f1f1f1; /* Background ringan saat hover */
        }

        

        a {
            color: #E8BE28;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            background-color: #E8BE28;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #d6a62d;
        }

        .login-links {
            text-align: right;
            padding: 20px;
        }

        /* ======== BAGIAN TABLE ============== */

        .table-container h1 {
            color: #000;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: left;
        }

        .description {
            width: 30%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        


        td img {
            max-width: 200px;
            height: auto;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tr {
                border: 1px solid #ddd;
                margin-bottom: 10px;
                display: flex;
                flex-direction: column;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }

        .status-finished {
            background-color: green;
            /* Green background for finished */
            color: white;
            /* Dark green text color */
        }

        .status-on-progress {
            background-color: orange;
            /* Yellow background for on progress */
            color: white;
            /* Dark yellow text color */
        }

        .logo_segitiga{
            position: absolute
        }
        .logo_kotak {
            display: none;
        }

    </style>
</head>
<body class="antialiased">

    <div class="logo_segitiga">
        <img width="200px" src="{{ asset('images/logo_segitiga.png') }}">
    </div>

    <div class="container">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center dropdown">
                <form action="{{ route('project.index2') }}" method="GET" class="d-flex flex-grow-1 me-3">
                    <select name="filter" class="form-select me-2" style="max-width: 200px;">
                        <option value="project_number" {{ request('filter') == 'project_number' ? 'selected' : '' }}>Project Number</option>
                        <option value="project_name" {{ request('filter') == 'project_name' ? 'selected' : '' }}>Project Name</option>
                        <option value="client" {{ request('filter') == 'client' ? 'selected' : '' }}>Client</option>
                        <option value="project_start" {{ request('filter') == 'project_start' ? 'selected' : '' }}>Project Start</option>
                        <option value="project_finish" {{ request('filter') == 'project_finish' ? 'selected' : '' }}>Project Finish</option>
                        <option value="sector" {{ request('filter') == 'sector' ? 'selected' : '' }}>Sector</option>
                        <option value="service" {{ request('filter') == 'service' ? 'selected' : '' }}>Service</option>
                    </select>
                    <input type="text" name="query" class="form-control me-2" placeholder="Search Projects" value="{{ request('query') }}" style="width: 200px;">
                    <button type="submit" class="btn btn-secondary me-2">Search</button>
                    <a href="{{ route('project.index2') }}" class="btn btn-primary">View All</a>
                </form>

                <div class="login-links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/project') }}" class="btn">Add Data</a>
                        @else
                            <a href="{{ route('login') }}" class="btn">Log in</a>
            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
            
        </div>
        <div class="table-container">
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    <h1>Project List</h1>
                </div>
                <div class="logo_kotak">
                    <img width="150px" src="{{ asset('images/logo resindo.jpeg') }}">
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="status">Status</th>
                        <th class="project_number">Project Number</th>
                        <th class="project_name">Project Name</th>
                        <th class="project_manager">Project Manager</th>
                        <th class="project_location">Project Location</th>
                        <th class="client">Client</th>
                        <th class="sector">Sector</th>
                        <th class="service">Service</th>
                        <th class="description">Description</th>
                        {{-- <th>Project Start</th> --}}
                        {{-- <th>Project Finish</th> --}}
                        <th class="project_image">Project Image</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $key => $project)
                    <tr>
                    <td class="{{ $project->status == 'Finish' ? 'status-finished' : ($project->status == 'On Progres' ? 'status-on-progress' : '') }}">
                        {{ $project->status }}
                        <br>
                        <span>{{ $project->project_start->format('M Y') }} - {{ $project->project_finish->format('M Y') }}</span>
                    </td>
                        <td data-label="Project Number">{{ $project->project_number }}</td>
                        <td data-label="Project Name">{{ $project->project_name }}</td>
                        <td data-label="Project Manager">{{ $project->project_manager }}</td>
                        <td data-label="Project Location">{{ $project->project_location }}</td>
                        <td data-label="Client">{{ $project->client }}</td>
                        <td>
                            @if ($project->sector)
                            <ul style="list-style-type: disc; padding-left: 20px;">
                                @foreach(explode(',', $project->sector) as $item)
                                <li>{{ trim($item) }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </td>
                        <td>
                            @if ($project->service)
                            <ul style="list-style-type: disc; padding-left: 20px;">
                                @foreach(explode(',', $project->service) as $item)
                                <li>{{ trim($item) }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </td>
                        <td>{!! $project->project_description !!}</td>
                        {{-- <td data-label="Project Start">{{ $project->project_start->format('d-m-Y') }}</td> --}}
                        {{-- <td data-label="Project Finish">{{ $project->project_finish->format('d-m-Y') }}</td> --}}
                        <td data-label="Project Image">
                            @if ($project->project_picture)
                                <img src="{{ asset('storage/' . $project->project_picture) }}" alt="Project Picture">
                            @else
                                No Image
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-center">No projects found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
