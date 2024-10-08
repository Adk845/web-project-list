@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <h1 class="text-center">Create Project</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="status form-label">Status</label>
                <select class="form-select" name="status" id="status" required>
                    <option value="On Progres">On Progres</option>
                    <option value="Finish">Finish</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="project_number">Project Number</label>
                <input class="form-control" type="text" name="project_number" id="project_number" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="project_name">Project Name</label>
                <input class="form-control" type="text" name="project_name" id="project_name" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="project_manager">Project Manager</label>
                <input class="form-control" type="text" name="project_manager" id="project_manager" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="project_location">Project Location</label>
                <input class="form-control" type="text" name="project_location" id="project_location" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="client">Client</label>
                <input class="form-control" type="text" name="client" id="client" required>
            </div>
            <div class="date_start_finish">
                <div class="form-group">
                    <label class="form-label" for="project_start">Start Date</label>
                    <input class="form-control" type="date" name="project_start" id="project_start" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="project_finish">End Date</label>
                    <input class="form-control" type="date" name="project_finish" id="project_finish" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="project_picture">Project Image (optional)</label>
                <input class="form-control" type="file" name="project_picture" id="project_picture" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="image_preview" src="#" alt="Image Preview" style="display: none; max-height: 200px;" class="mb-3">  
                </div>
            </div>


            <h4 class="mb-2">Sector</h4>
        <div class="form-group-checkbox">
            <div class="checkbox-container">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="nickel" value="nickel">
                    <label class="form-check-label" for="nickel">Nickel</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="power" value="power">
                    <label class="form-check-label" for="power">Power</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="coal" value="coal">
                    <label class="form-check-label" for="coal">Coal</label>
                </div>
            </div>

            <div class="checkbox-container">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="oil_gas" value="oil_gas">
                    <label class="form-check-label" for="oil_gas">Oil & Gas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="tin" value="tin">
                    <label class="form-check-label" for="tin">Tin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="metal" value="metal">
                    <label class="form-check-label" for="metal">Metal</label>
                </div>
            </div>

            <div class="checkbox-container">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="gold" value="gold">
                    <label class="form-check-label" for="gold">Gold</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="infrastructure" value="infrastructure">
                    <label class="form-check-label" for="infrastructure">Infrastructure</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="building" value="building">
                    <label class="form-check-label" for="building">Building</label>
                </div>
            </div>

            <div class="checkbox-container">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sector[]" id="haul_road" value="haul_road">
                    <label class="form-check-label" for="haul_road">Haul Road</label>
                </div>
            </div>
        </div>

            <h4 class="mb-2">Services</h4>
            <div class="form-group-services">


                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="feasibility_study" value="feasibility study">
                        <label class="form-check-label" for="feasibility_study">Feasibility Study</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="power_generation" value="power generation">
                        <label class="form-check-label" for="power_generation">Power Generation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="detail_design" value="detail design">
                        <label class="form-check-label" for="detail_design">Detail Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="capex_opex" value="capex opex">
                        <label class="form-check-label" for="capex_opex">Capex Opex</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="oil_gas_service" value="oil & gas">
                        <label class="form-check-label" for="oil_gas_service">Oil & Gas</label>
                    </div>
                </div>

                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="engineering_services" value="engineering services">
                        <label class="form-check-label" for="engineering_services">Engineering services</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="coal_mine_development" value="coal mine development">
                        <label class="form-check-label" for="coal_mine_development">Coal Mine Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="design_drafting_service" value="design & drafting service">
                        <label class="form-check-label" for="design_drafting_service">Design & Drafting Service</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="minerals_metals_development" value="minerals & metals development">
                        <label class="form-check-label" for="minerals_metals_development">Minerals & Metals Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="project_development_construction_service" value="project development & construction service">
                        <label class="form-check-label" for="project_development_construction_service">Project Development & Construction Service</label>
                    </div>
                </div>
                <div class="checkbox-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="steel_fabrication_management" value="steel fabrication management">
                        <label class="form-check-label" for="steel_fabrication_management">Steel Fabrication Management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="site_comunication" value="site comunication & it system design">
                        <label class="form-check-label" for="site_comunication">Site Comunication & IT System Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="feasibility_studies_technical_due_diligence" value="feasibility studies & technical due diligence">
                        <label class="form-check-label" for="feasibility_studies_technical_due_diligence">Feasibility Studies & Technical Due Diligence</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" id="teaming_with_leading_coal_process_design_groups" value="teaming with leading coal process design groups">
                        <label class="form-check-label" for="teaming_with_leading_coal_process_design_groups">Teaming with Leading Coal Process Design Groups</label>
                    </div>

                </div>





            </div>

            <div class="form-group">
                <label class="form-label" for="project_description">Description</label>
                <input id="project_description" type="hidden" name="project_description">
                <trix-editor input="project_description"></trix-editor>
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
        reader.onload = function(){
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script> {{-- library untuk text editor --}}
<script src="{{ asset('js/create.js') }}"></script>
@endpush