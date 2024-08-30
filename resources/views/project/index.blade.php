@extends('layouts.app')

@section('content')

<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between">
        <!-- Tombol Tambah -->
        <a href="{{ route('projects.pdfAll') }}" class="btn btn-warning btn-sm">DOWNLOAD ALL</a>
        <a href="{{ route('project.create') }}" class="btn btn-primary">Tambah Proyek</a>
       


        <!-- Tombol Import, Export, dan Download Template -->

    </div>
</div>
<div class="container-fluid">
    

    <div class="table">
        <table class="table table-bordered table-striped" id="projectTable">
            <thead>
                <tr>
                    {{-- <th>No.</th> --}}
                    {{-- <th>Category</th> --}}
                    <th>Project Number</th>
                    <th class="project_manager">Project Manager</th>
                    <th class="project_location">Project Location</th>
                    <th class="client">Client</th>
                    <th class="sector">Sector</th>
                    <th class="services">Service</th>
                    <th class="project_description">Project Description</th>
                    <th class="project_start">Project Start</th>
                    <th class="project_finish">Project Finish</th>
                    <th class="project_picture">Project Picture</th>
                    {{-- <th>Options</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $key => $project)
                <?php 
                $sektors[] = explode(", ",$project['sector']); 
                $services[] = explode(", ",$project['service']);
                
                ?>
                <tr>
                    {{-- <td>{{ $key + 1 }}</td> --}}
                    {{-- <td>{{ $project->category }}</td> --}}
                    <td >{{ $project->project_number }}</td>
                    <td >{{ $project->project_manager }}</td>
                    <td >{{ $project->project_location }}</td>
                    <td >{{ $project->client }}</td>
                    {{-- <td >{{ $project->sector }}</td> --}}
                    <td >
                        <ul>
                            <?php foreach($sektors[0] as $sektor) :?>
                           
                            <li><?php echo $sektor ?></li>
                            <?php endforeach?>
                        </ul>
                    </td>
                    {{-- <td >{{ $project->service }}</td> --}}
                    <td >
                        <?php var_dump($services[0]) ?>
                        {{-- <ul>
                            <?php foreach($services[0] as $service) :?>
                            <li><?php echo $service ?></li>
                            <?php endforeach?>
                        </ul> --}}
                    </td>
                    <td ><p class="">{!! $project->project_description !!}</p></td>
                    <td >{{ $project->project_start->format('d M Y') }}</td>
                    <td >{{ $project->project_finish->format('d-m-Y') }}</td>
                    <td >
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
                              Dropdown button
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