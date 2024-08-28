@extends('layouts.app')

@section('content')

<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between">
        <!-- Tombol Tambah -->
        <a href="{{ route('project.create') }}" class="btn btn-primary">Tambah Proyek</a>

        <!-- Tombol Import, Export, dan Download Template -->

    </div>
</div>
<div class="container-fluid">
    

    <div class="table-responsive table_responsive">
        <table class="table table-bordered table-striped" id="projectTable">
            <thead>
                <tr>
                    {{-- <th>No.</th> --}}
                    <th class="">Status</th>
                    <th>Project Number</th>
                    <th class="project-manager">Project Manager</th>
                    <th class="project-location">Project Location</th>
                    <th>Client</th>
                    <th class="col-width-sector">Sector</th>
                    <th class="col-width-service">Service</th>
                    <th class="project-description">Project Description</th>
                    <th>Project Start</th>
                    <th>Project Finish</th>
                    <th class="project-picture">Project Picture</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $key => $project)
                <tr>
                    {{-- <td>{{ $key + 1 }}</td> --}}
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->project_number }}</td>
                    <td>{{ $project->project_manager }}</td>
                    <td>{{ $project->project_location }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->sector }}</td>
                    <td>{{ $project->service }}</td>
                    <td class="project-description"><p class="text-wrap">{{ $project->project_description }}</p></td>
                    <td>{{ $project->project_start->format('d M Y') }}</td>
                    <td>{{ $project->project_finish->format('d M Y') }}</td>
                    <td class="project-picture">
                        <div>
                        @if ($project->project_picture)
                            {{-- <img src="{{ asset('storage/' . $project->project_picture) }}" alt="Project Picture" class="img-thumbnail"> --}}
                            <img src="{{ asset('project_images/' . $project->project_picture) }}" alt="Project Picture" class="img-thumbnail">
                        @else
                            No Image
                        @endif
                        </div>
                    </td>
                    <td>
                        {{-- <a href="{{ route('project.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('project.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a class="btn btn-success btn-sm">Download Anoucement</a> --}}
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Option
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('project.edit', $project) }}" class="dropdown-item">Edit</a></li>
                              <li><form action="{{ route('project.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn dropdown-item btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form></li>
                              <li><a href="#" class="dropdown-item">Download Anoucement</a></li>
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