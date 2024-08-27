<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project List</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f5f5; /* Ganti menjadi abu muda */
            color: #E8BE28;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            overflow-x: auto; /* Memastikan tabel dapat digeser horizontal */
        }
        table {
            width: 100%; /* Memastikan tabel memenuhi lebar kontainer */
            border-collapse: collapse;
        }
        thead {
            background-color: #E8BE28;
            color: #000;
        }
        th, td {
            padding: 12px;
            text-align: left; /* Rata kiri teks pada tabel */
            vertical-align: top; /* Rata atas teks pada tabel */
            border: 1px solid #ddd; /* Garis pada sel tabel */
        }
        th {
            font-weight: bold;
        }
        tbody tr:nth-child(even) {
            background-color: #333;
        }
        tbody tr:hover {
            background-color: #444;
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
        /* Styling for the table header */
        .table-container h1 {
            color: #000; /* Warna hitam untuk judul */
            margin-top: 0;
            margin-bottom: 20px; /* Jarak bawah untuk memberi ruang */
            text-align: left; /* Atur posisi teks ke kiri */
        }
        /* Lebar kolom deskripsi */
        td.description {
            max-width: 250px; /* Atur lebar maksimum kolom deskripsi */
            overflow: hidden;
            text-overflow: ellipsis; /* Tambahkan ellipsis jika teks terlalu panjang */
            white-space: nowrap; /* Jangan biarkan teks terpotong ke baris berikutnya */
        }
        td img {
            max-width: 150px; /* Atur lebar maksimum gambar */
            height: auto; /* Menjaga rasio gambar */
        }
        /* Media query untuk layar kecil */
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
    </style>
</head>
<body class="antialiased">
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

    <div class="container">
        <div class="table-container">
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
                        <td data-label="No.">{{ $key + 1 }}</td>
                        <td data-label="Category">{{ $project->category }}</td>
                        <td data-label="Project Number">{{ $project->project_number }}</td>
                        <td data-label="Project Manager">{{ $project->project_manager }}</td>
                        <td data-label="Project Location">{{ $project->project_location }}</td>
                        <td data-label="Client">{{ $project->client }}</td>
                        <td data-label="Sector">{{ $project->sector }}</td>
                        <td data-label="Service">{{ $project->service }}</td>
                        <td data-label="Description" class="description">{{ $project->project_description }}</td>
                        <td data-label="Project Start">{{ $project->project_start->format('d-m-Y') }}</td>
                        <td data-label="Project Finish">{{ $project->project_finish->format('d-m-Y') }}</td>
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
