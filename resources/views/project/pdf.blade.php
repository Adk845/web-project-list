<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/pdf.css')}}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <style>
                {{-- <img src="{{ public_path('/images/template.jpg')}}" width="100%"> --}}
        body {
            font-family: Arial, sans-serif;
            padding-left: 20px;
            margin: 0x;
            background-image: url({{public_path('images/template.jpg')}});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .overley {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.5)
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        td{
            font-size: 16px;
        }
        th, td {
            padding: 0px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        .header{
            
        }

        h1{
            text-align: center
        }

        table, tr, td{
            border: none;

        }
        table{
            
        }
        .title_konten{
            width: 25%;
        }
        .konten{
            
        }
        .project_description_div{
            display: flex;
            flex-direction: row;
        }

        .project_description{
            /* text-wrap: wrap; */
            text-overflow: ellipsis;
            height: 280px;
            vertical-align: top;
            /* max-height: 290px;
            white-space: wrap; */
        }

        .gambar{
            display: flex;
            padding-top: 50px;
        }
     



    </style>
    <title>Document</title>
</head>
<body>
    <div class="overley">
    {{-- <div class="header">
        
    </div> --}}
    <div style="width: 100%; height: 90px; position:relative; top: 5px;">
        <h1>Project Anouncement</h1>
    </div>
    
    
    <div class="container_konten" style="display: flex; flex-direction: row;">
        <table>
            <tr>
                <td class="kiri_tulisan">
                    <div>
                        <table>
                            <tr>
                                <td class="title_konten">Name of The Project</td>
                                <td class="konten">: {{$projects[0]->project_name}}</td>
                            </tr>
                            <tr>
                                <td class="title_konten">Project Number</td>
                                <td class="konten">: {{$projects[0]->project_number}}</td>
                            </tr>
                            <tr>
                                <td class="title_konten">Project Manager</td>
                                <td class="konten">: {{$projects[0]->project_manager}}</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Project Brief</td>
                                <td class="project_description">{!! $projects[0]->project_description !!}</td>
                            </tr>
                            <tr>
                                <td class="title_konten">Project Location</td>
                                <td class="konten">: {{$projects[0]->project_location}}</td>
                            </tr>
                            <tr>
                                <td class="title_konten">Starting / End Date</td>
                                <td class="konten">: {{$projects[0]->project_start->format('d M Y')}} - {{$projects[0]->project_finish->format('d M Y')}}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td class="kanan_gambar">
                    
                    <div class="gambar" style="width: 200; height: 200px; ">
                    @if ($projects[0]->project_picture)
                        <img src="{{ public_path('storage/' . $projects[0]->project_picture) }}" width="100%"  alt="Project Picture">
                        
                        @else
                        No Image
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div style="width: 130px; height: 100px; position: absolute; bottom: 0px; right: 500px">
        <h5 style="margin: 0px">Simon Birch</h5>
        <hr>
        <p style="margin: 0px">President Director</p>
    </div>
    {{-- <div style="width: 100%; height: 100px; border: 1px solid black; position:absolute; bottom: 5px;">
        
    </div> --}}

    </div>
</body>
</html>
