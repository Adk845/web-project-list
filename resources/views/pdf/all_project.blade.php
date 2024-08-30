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
            padding-top: 120px;
             /* Adjust padding for header */
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        table {
            width: 100%;
            margin: -20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #006ec1;
        
        }

        img {
            max-width: 150px;
            height: auto;
        }

        @media print {
            @page {
                size: A3 landscape;
                margin: 0;
            }
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 100px; /* Adjust header height */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            border-bottom: 1px solid black;
            background-color: #fff; /* Ensure header background is white */
        }

        .header img {
            height: 80px; /* Adjust logo size */
        }

        .header .title {
            text-align: right;
            font-size: 25px;
            color: black;
            margin-left: 20px;
            margin-top: -60px;
        }

        .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                /* background-color: #E8BE28; */
                padding: 10px;
                text-align: left;
                font-size: 14px;
                border-top: 1px solid black;
               
                font-weight: bold;
                box-sizing: border-box;
            }

            .footer .page-number:before {
                content: "Page " counter(page) ;
            }

            .footer .title {
            text-align: center;
            font-size: 14px;
            color: #006ec1;
            /* margin-left: 20px; */
            margin-top: -60px;
            }

            .footer .title2 {
                text-align: right;
            font-size: 14px;
            color: black;
            /* margin-left: 20px; */
            margin-top: -60px;
            }


        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/logo resindo.jpeg') }}" alt="Logo">
        <div class="title"><b>Resources & Energy Group</b><br>Project List - {{ date('F Y') }}</div>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Status</th>
                    <th>Project Number</th>
                    <th>Project Name</th>
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
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->project_number }}</td>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->project_manager }}</td>
                    <td>{{ $project->project_location }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->sector }}</td>
                    <td>{{ $project->service }}</td>
                    <td>{!! $project->project_description !!}</td>
                    <td>{{ $project->project_start->format('d-M-Y') }}</td>
                    <td>{{ $project->project_finish->format('d-M-Y') }}</td>
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
        <div class="title"><b>Engineering Projects for Community $ Environmental Sustainability</b></div>
        <div class="title2">{{ date( 'Y') }}</div>
    </div>    




</body>

</html>
