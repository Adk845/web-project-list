@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <h1 class="text-center">Edit Project</h1>
        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @method ('PUT')
            @csrf

            <div class="form-group">
                <label for="status form-label">Status</label>
                <select class="form-select" name="status" id="status" required>
                    <option value="On Progres" {{ $project->status == 'On Progres' ? 'selected' : '' }}>On Progres</option>
                    <option value="Finish" {{ $project->status == 'Finish' ? 'selected' : '' }}>Finish</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="project_number">Project Number</label>
                <input class="form-control" type="text" name="project_number" id="project_number" value="{{ old('project_number', $project->project_number) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="project_name">Project name</label>
                <input class="form-control" type="text" name="project_name" id="project_name" value="{{ old('project_name', $project->project_name) }}" required>
            </div>


            <div class="form-group">
                <label class="form-label" for="project_manager">Project Manager</label>
                <input class="form-control" type="text" name="project_manager" id="project_manager" value="{{ old('project_manager', $project->project_manager) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="project_location">Project Location</label>
                <input class="form-control" type="text" name="project_location" id="project_location" value="{{ old('project_location', $project->project_location) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="client">Client</label>
                <input class="form-control" type="text" name="client" id="client" value="{{ old('client', $project->client) }}" required>
            </div>
            <div class="date_start_finish">
                <div class="form-group">
                    <label class="form-label" for="project_start">Start Date</label>
                    <input class="form-control" type="date" name="project_start" id="project_start"
                        value="{{ old('project_start', $project->project_start ? $project->project_start->format('Y-m-d') : '') }}"
                        required>
                </div>


                <div class="form-group">
                    <label class="form-label" for="project_finish">finish Date</label>
                    <input class="form-control" type="date" name="project_finish" id="project_finish"
                        value="{{ old('project_finish', $project->project_finish ? $project->project_finish->format('Y-m-d') : '') }}"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label for="project_picture" class="form-label"></label>
                <img src="{{ asset('storage/'. $project->project_picture) }}" class="img-thumbnail d-block mb-3" name="tampil" alt="..." width="25%" id="tampil">
                <input class="form-control @error('project_picture') is-invalid @enderror" type="file" id="project_picture" name="project_picture" onchange="previewImage(event)">
                @error('project_picture')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            @php
            // Mengubah sektor dari string kembali menjadi array menggunakan pemisah ', '
            $selectedSectors = old('sector', isset($project->sector) ? explode(', ', $project->sector) : []);
            @endphp

            <h4 class="mb-2">Sector</h4>
            <div class="form-group-checkbox">
                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="nickel" value="nickel" {{ in_array('nickel', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="nickel">Nickel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="power" value="power" {{ in_array('power', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="power">Power</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="coal" value="coal" {{ in_array('coal', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="coal">Coal</label>
                    </div>
                </div>

                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="oil_gas" value="oil_gas" {{ in_array('oil_gas', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="oil_gas">Oil & Gas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="tin" value="tin" {{ in_array('tin', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tin">Tin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="metal" value="metal" {{ in_array('metal', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="metal">Metal</label>
                    </div>
                </div>

                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="gold" value="gold" {{ in_array('gold', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="gold">Gold</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="infrastructure" value="infrastructure" {{ in_array('infrastructure', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="infrastructure">Infrastructure</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="building" value="Building" {{ in_array('Building', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="building">Building</label>
                    </div>
                </div>

                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" id="haul_road" value="haul_road" {{ in_array('haul_road', $selectedSectors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="haul_road">Haul Road</label>
                    </div>
                </div>
            </div>


            @php
            // Mengubah service dari string kembali menjadi array menggunakan pemisah ', '
            $selectedServices = old('service', isset($project->service) ? explode(', ', $project->service) : []);
            @endphp

            <h4 class="mb-2">Services</h4>
            <div class="form-group-services">
                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="feasibility_study" value="feasibility study" {{ in_array('feasibility study', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="feasibility_study">Feasibility Study</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="power_generation" value="power generation" {{ in_array('power generation', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="power_generation">Power Generation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="detail_design" value="detail design" {{ in_array('detail design', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="detail_design">Detail Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="capex_opex" value="capex opex" {{ in_array('capex opex', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="capex_opex">Capex Opex</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="oil_gas_service" value="oil & gas" {{ in_array('oil & gas', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="oil_gas_service">Oil & Gas</label>
                    </div>
                </div>

                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="engineering_services" value="engineering services" {{ in_array('engineering services', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="engineering_services">Engineering Services</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="coal_mine_development" value="coal mine development" {{ in_array('coal mine development', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="coal_mine_development">Coal Mine Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="design_drafting_service" value="design & drafting service" {{ in_array('design & drafting service', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="design_drafting_service">Design & Drafting Service</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="minerals_metals_development" value="minerals & metals development" {{ in_array('minerals & metals development', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="minerals_metals_development">Minerals & Metals Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="project_development_construction_service" value="project development & construction service" {{ in_array('project development & construction service', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="project_development_construction_service">Project Development & Construction Service</label>
                    </div>
                </div>
                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="steel_fabrication_management" value="steel fabrication management" {{ in_array('steel fabrication management', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="steel_fabrication_management">Steel Fabrication Management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="site_comunication" value="site comunication & it system design" {{ in_array('site comunication & it system design', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="site_comunication">Site Comunication & IT System Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="feasibility_studies_technical_due_diligence" value="feasibility studies & technical due diligence" {{ in_array('feasibility studies & technical due diligence', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="feasibility_studies_technical_due_diligence">Feasibility Studies & Technical Due Diligence</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="teaming_with_leading_coal_process_design_groups" value="teaming with leading coal process design groups" {{ in_array('teaming with leading coal process design groups', $selectedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="teaming_with_leading_coal_process_design_groups">Teaming with Leading Coal Process Design Groups</label>
                    </div>
                </div>
            </div>










            <div class="form-group">
                <label class="form-label" for="project_description">Description</label>
                <input id="project_description" type="hidden" name="project_description" value="{{ old('project_description', $project->project_description) }}">
                <trix-editor input="project_description">{{ old('project_description', $project->project_description) }}</trix-editor>
            </div>

            <div class="text-center">
                <button type="submit">Save Project</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css"> {{-- library untuk text editor --}}
@endpush

@push('script')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('tampil');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script> {{-- library untuk text editor --}}
<script src="{{ asset('js/create.js') }}"></script>
@endpush