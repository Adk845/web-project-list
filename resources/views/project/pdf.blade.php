<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/pdf.css')}}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <style>
                {{-- <img src="{{ public_path('/images/template2.jpg')}}" width="100%"> --}}
        body {
            font-family: Arial, sans-serif;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 0px;
            margin: 0px;
            background-image: url({{public_path('images/template5.jpg')}});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* .overley {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            margin: 0px;
            padding: 0px;
        } */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        td{
            font-size: 14px;
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
           margin-left: 45px; 
        }
        .title_konten{
            width: 25%;
            vertical-align: top;
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
            height: 230px;
            vertical-align: top;
            /* max-height: 290px;
            white-space: wrap; */
        }

        .gambar{
            display: flex;
            padding-top: 50px;
        }
     
        .logo{
            position: absolute;
            top: 0px;
            right: 10px;
        }

        .judul{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 35px
        }

        .titik_dua{
            width: 2px;
            vertical-align: top;
            padding-right: 3px;
        }

        .kiri_tulisan{
            width: 55%;
        }
        .kanan_gambar{
            padding-left: 45px;
        }
        .quotes{
            width: 80%;
        }
        .quotes p{
            margin-left: 90px;
            font-size: 14px;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        .gambar{
            border: 1px solid grey;
            position: absolute;
            top: 200px;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <div class="overley">
        {{-- <div class="header">
            
        </div> --}}
        <div style="width: 100%; height: 140px; position:relative; top: 30px;">
        </div>

        <div class="quotes">
            <p>Dear Team</p>
            <p>We are delighted to inform you that we have won the contract for:</p>
        </div>
    
        <div class="container_konten" style="display: flex; flex-direction: row;">
            <table>
                <tr>
                    <td class="kiri_tulisan">
                        <div>
                            <table>
                                <tr>
                                    <td class="title_konten">Name of The Project</td>
                                    <td class="titik_dua">:</td>
                                    <td class="konten">{{$projects[0]->project_name}}</td>
                                </tr>
                                <tr>
                                    <td class="title_konten">Project Number</td>
                                    <td class="titik_dua">:</td>
                                    <td class="konten">{{$projects[0]->project_number}}</td>
                                </tr>
                                <tr>
                                    <td class="title_konten">Project Manager</td>
                                    <td class="titik_dua">:</td>
                                    <td class="konten">{{$projects[0]->project_manager}}</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top">Project Brief</td>
                                    <td class="titik_dua">:</td>
                                    <td class="project_description">{!! $projects[0]->project_description !!}</td>
                                </tr>
                                <tr>
                                    <td class="title_konten">Project Location</td>
                                    <td class="titik_dua">:</td>
                                    <td class="konten">{{$projects[0]->project_location}}</td>
                                </tr>
                                <tr>
                                    <td class="title_konten">Starting / End Date</td>
                                    <td class="titik_dua">:</td>
                                    <td class="konten">{{$projects[0]->project_start->format('M Y')}} - {{$projects[0]->project_finish->format('M Y')}}</td>
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

        <div class="quotes" style="margin-top: 10px">
            <p>Let use all thank the efforts made by our Tender Team for a key project for Resindo with a major new client and may it be one of many such projects in future. Well done team! Lets's make this Project a great success in Time & Quality</p>
        </div>

        <div style="width: 130px; height: 100px; position: absolute; bottom: 35px; right: 500px">
            <h5 style="margin: 0px">Simon Birch</h5>
            <hr>
            <p style="margin: 0px">President Director</p>
        </div>
        {{-- <div style="width: 100%; height: 100px; border: 1px solid black; position:absolute; bottom: 5px;">
            
        </div> --}}

    </div>
</body>
</html>
