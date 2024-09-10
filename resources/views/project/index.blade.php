@extends('layouts.app')

@section('content')
 <!-- Notifikasi Sukses -->
 @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('successdelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successdelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center dropdown">
        <form action="{{ route('project.index') }}" method="GET" class="d-flex flex-grow-1 me-3">
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
            <a href="{{ route('project.index') }}" class="btn btn-primary">View All</a>
        </form>



        <!-- Tombol Tambah dan Download -->
        <div class="d-flex">

            <!-- <a href="{{ route('projects.export') }}" class="btn btn-warning me-1">Export Projects</a> -->
            <a href="{{ route('project.create') }}" class="btn btn-primary me-2">Create Project </a>
            <div class="d-flex dropdown">
                <!-- Dropdown Toggle Button -->
                <button class="btn btn-warning btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" style="width: 100px;" aria-expanded="false">
                    Actions
                </button>

                <!-- Dropdown Menu -->
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="min-width: 200px;">
                    <!-- Download All Button -->
                    <li>
                        <a href="{{ route('projects.pdfAll', ['query' => request('query'), 'filter' => request('filter')]) }}" class="dropdown-item" target="_blank">Download All</a>
                    </li>

                    <!-- Export Projects -->
                    <li>
                        <a href="{{ route('projects.export') }}" class="dropdown-item">Export Projects</a>
                    </li>

                    <!-- Import Form -->
                    <li>
                        <form action="{{ route('projects.import') }}" method="POST" enctype="multipart/form-data" class="px-4 py-2">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File</label>
                                <input type="file" id="file" name="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Import</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="table">
        <table class="table table-bordered table-striped" id="projectTable">
            <thead>
                <tr>
                    {{-- <th>No.</th> --}}
                    {{-- <th>Category</th> --}}
                    <th class="project_status">Project Status</th>
                    <th class="project_number">Project Number</th>
                    <th>Project Name</th>
                    <th class="project_manager">Project Manager</th>
                    <th class="project_location">Project Location</th>
                    <th class="client">Client</th>
                    <th class="sector">Sector</th>
                    <th class="services">Service</th>
                    <th class="project_description">Project Description</th>
                    {{-- <th class="project_start">Project Start</th> --}}
                    {{-- <th class="project_finish">Project Finish</th> --}}
                    <th>Project Picture</th>
                    {{-- <th>Options</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $key => $project)
                <?php
                $sektors[] = explode(", ", $project['sector']);
                $services[] = explode(", ", $project['service']);

                ?>
                <tr>
                    {{-- <td>{{ $key + 1 }}</td> --}}
                    {{-- <td>{{ $project->category }}</td> --}}
                    <td style="{{ $project->status == 'Finish' ? 'background-color: green; color: white;' : ($project->status == 'On Progres' ? 'background-color: rgb(254, 206, 0); color: white;' : '') }}">
                        {{ $project->status }}
                        <br>
                        <span>{{ $project->project_start ? $project->project_start->format('M Y') : '-' }} - {{ $project->project_finish ? $project->project_finish->format('M Y') : '-' }}</span>
                    </td>
                    <td>{{ $project->project_number }}</td>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->project_manager }}</td>
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
                    <td>
                        @if ($project->service)
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            @foreach(explode(',', $project->service) as $item)
                            <li>{{ trim($item) }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </td>
                    <td>
                        <p class="">{!! $project->project_description !!}</p>
                    </td>
                    {{-- <td>{{ $project->project_start->format('d M Y') }}</td> --}}
                    {{-- <td>{{ $project->project_finish->format('d M Y') }}</td> --}}
                    <td class="project_picture">
                        <div>
                            @if ($project->project_picture)
                            <img src="{{ asset('storage/' . $project->project_picture) }}" alt="Project Picture" class="img-thumbnail">
                           
                            @else
                            No Image
                            @endif
                        </div>

                    </td>
                    <td>
                        <div class="dropdown text-center">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Options
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('project.edit', $project) }}" class="dropdown-item">Edit</a></li>
                                <li>
                                    <form action="{{ route('project.destroy', $project) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </li>
                                <li><a href="{{ route('projects.pdf', $project->id) }}" class="dropdown-item" target="_blank">Download PDF</a></li>


                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
<div class="d-flex justify-content-center">
    {{$projects->links('pagination::bootstrap-4', ['class => pagination-sm']) }}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#projectTable').DataTable({
            "responsive": true,
            "paging": true,
            "searching": true
        });
    });
</script>

@endsection

@push('styles')

@endpush

@push('script')

@endpush