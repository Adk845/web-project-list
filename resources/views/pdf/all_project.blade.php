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
        padding-top: 100px; /* Kurangi padding untuk menaikkan header */
        padding-bottom: 50px; /* Tambahkan padding bawah untuk footer */
    }

    .container {
        width: 100%;
        padding: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10px; /* Kecilkan ukuran font tabel */
    }

    th,
    td {
        padding: 4px; /* Kurangi padding sel */
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #006ec1;
        color: white;
        text-align: center;
    }

    img {
        max-width: 120px; /* Kecilkan gambar untuk menghemat ruang */
        height: auto;
    }

    @media print {
        @page {
            size: A4 landscape;
            margin: 0;
        }
    }

    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 80px; /* Kurangi tinggi header */
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 30px;
        border-bottom: 1px solid black;
        background-color: #fff;
    }

    .header img {
        height: 70px; /* Kurangi ukuran logo */
    }

    .header .title {
        text-align: right;
        font-size: 18px; /* Kecilkan font header */
        color: black;
        margin-left: 20px;
        margin-top: -40px;
    }

    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        text-align: left;
        font-size: 12px; /* Kurangi font footer */
        border-top: 1px solid black;
        font-weight: bold;
        box-sizing: border-box;
    }

    .footer .page-number:before {
        content: "Page " counter(page);
    }

    .footer .title {
        text-align: center;
        font-size: 12px; /* Kecilkan font footer */
        color: #006ec1;
        margin-top: -40px;
    }

    .footer .title2 {
        text-align: right;
        font-size: 12px; /* Kecilkan font footer */
        color: black;
        margin-top: -40px;
    }

    .status-finished {
        background-color: green;
        color: white;
    }

    .status-on-progress {
        background-color: orange;
        color: white;
    }

    .page-break {
        page-break-before: always;
    }
</style>

</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/logo resindo.jpeg') }}" alt="Logo">
        <div class="title"><b>Resindo Group</b><br>Project List - {{ date('F Y') }}</div>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <!-- <th>No.</th> -->
                    <th class="status">Status</th>
                    <th>Project Number</th>
                    <th style="width: 11%">Project Name</th>
                    <!-- <th>Project Manager</th> -->
                    <th>Project Location</th>
                    <th style="width: 11%">Client</th>
                    <th >Sector</th>
                    <th>Service</th>
                    <th style="width: 25%">Description</th>
                    <!-- <th>Project Start</th>
                    <th>Project Finish</th> -->
                    <th style="width: 15%">Project Image</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $key => $project)
                <tr>
                    <!-- <td>{{ $key + 1 }}</td> -->
                    <td class="{{ $project->status == 'Finish' ? 'status-finished' : ($project->status == 'On Progres' ? 'status-on-progress' : '') }}">
                        {{ $project->status }}
                        <br>
                        <span>{{ $project->project_start->format('M Y') }} - {{ $project->project_finish->format('M Y') }}</span>
                    </td>

                    <td>{{ $project->project_number }}</td>
                    <td>{{ $project->project_name }}</td>
                    <!-- <td>{{ $project->project_manager }}</td> -->
                    <td>{{ $project->project_location }}</td>
                    <td>{{ $project->client }}</td>
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
                    <!-- <td>{{ $project->project_start->format('d-M-Y') }}</td>
                    <td>{{ $project->project_finish->format('d-M-Y') }}</td> -->
                    <td>
                        @if ($project->project_picture)
                        <img src="{{ public_path('storage/' . $project->project_picture) }}" alt="Project Picture">
                        @else
                        No Image
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="13" style="text-align: center;">No projects found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div class="page-number"></div>
        <div class="title"><b>Engineering Projects for Community & Environmental Sustainability</b></div>
        <div class="title2">{{ date( 'Y') }}</div>
    </div>




</body>

</html>