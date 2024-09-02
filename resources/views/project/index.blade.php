@extends('layouts.app')

@section('content')


<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center dropdown">
        <form action="{{ route('project.index') }}" method="GET" class="d-flex flex-grow-1 me-3">
            <select name="filter" class="form-select me-2" style="max-width: 200px;">
                <option value="project_number" {{ request('filter') == 'project_number' ? 'selected' : '' }}>Project Number</option>
                <option value="project_name" {{ request('filter') == 'project_name' ? 'selected' : '' }}>Project Name</option>
                <option value="sector" {{ request('filter') == 'sector' ? 'selected' : '' }}>Sector</option>
                <option value="service" {{ request('filter') == 'service' ? 'selected' : '' }}>Service</option>
            </select>
            <input type="text" name="query" class="form-control me-2" placeholder="Search Projects" value="{{ request('query') }}" style="width: 200px;">
            <button type="submit" class="btn btn-secondary me-2">Search</button>
            <a href="{{ route('project.index') }}" class="btn btn-primary">View All</a>
        </form>
        <!-- Tombol Tambah dan Download -->
        <div class="d-flex">
            <a href="{{ route('project.create') }}" class="btn btn-primary me-2">Tambah Proyek</a>
            <a href="{{ route('projects.pdfAll') }}" class="btn btn-warning btn-sm">DOWNLOAD ALL</a>
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
                    {{-- <th class="project_manager">Project Manager</th> --}}
                    <th class="project_location">Project Location</th>
                    <th class="client">Client</th>
                    <th class="sector">Sector</th>
                    <th class="services">Service</th>
                    <th class="project_description">Project Description</th>
                    {{-- <th class="project_start">Project Start</th> --}}
                    {{-- <th class="project_finish">Project Finish</th> --}}
                    <th >Project Picture</th>
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
                    <td class="{{ $project->status == 'Finish' ? 'bg-success text-white' : ($project->status == 'On Progres' ? 'bg-warning text-white' : '') }}">
                        {{ $project->status }}
                        <br>
                        <span>{{ $project->project_start->format('M Y') }} - {{ $project->project_finish->format('M Y') }}</span>
                    </td>
                    <td>{{ $project->project_number }}</td>
                    <td>{{ $project->project_name }}</td>
                    {{-- <td>{{ $project->project_manager }}</td> --}}
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
                            {{-- <img src="{{ asset('project_images/' . $project->project_picture) }}" alt="Project Picture" class="img-thumbnail"> --}}
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
                                <li><a href="{{ route('projects.pdf', $project->id) }}" class="dropdown-item">Download PDF</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
