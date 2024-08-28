@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <h1 class="text-center">Create Project</h1>
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="On Progres">On Progres</option>
                    <option value="Finish">Finish</option>
                </select>
            </div>


            <div class="form-group">
                <label for="project_number">Project Number</label>
                <input type="text" name="project_number" id="project_number" required>
            </div>

            <div class="form-group">
                <label for="project_manager">Project Manager</label>
                <input type="text" name="project_manager" id="project_manager" required>
            </div>

            <div class="form-group">
                <label for="project_location">Project Location</label>
                <input type="text" name="project_location" id="project_location" required>
            </div>

            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" name="client" id="client" required>
            </div>

            <div class="form-group">
                <label for="project_start">Start Date</label>
                <input type="date" name="project_start" id="project_start" required>
            </div>

            <div class="form-group">
                <label for="project_finish">End Date</label>
                <input type="date" name="project_finish" id="project_finish" required>
            </div>

            <div class="form-group">
                <label for="project_picture">Project Image (optional)</label>
                <input type="file" name="project_picture" id="project_picture" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="image_preview" src="#" alt="Image Preview" style="display: none; max-height: 200px;">
                </div>
            </div>

            <div class="form-group">
                <label for="sector">Sector</label><br>
                <input type="checkbox" name="sector[]" value="Nickel"> Nickel<br>
                <input type="checkbox" name="sector[]" value="Power"> Power<br>
                <input type="checkbox" name="sector[]" value="Coal"> Coal<br>
                <input type="checkbox" name="sector[]" value="Oil & Gas"> Oil & Gas<br>
                <input type="checkbox" name="sector[]" value="Tin"> Tin<br>
                <input type="checkbox" name="sector[]" value="Metal"> Metal<br>
                <input type="checkbox" name="sector[]" value="Gold"> Gold<br>
                <input type="checkbox" name="sector[]" value="Infrastructure"> Infrastructure<br>
                <input type="checkbox" name="sector[]" value="Building"> Building<br>
                <input type="checkbox" name="sector[]" value="Haul Road"> Haul Road<br>
            </div>


            <div class="form-group">
                <label for="service">Service</label><br>
                <input type="checkbox" name="service[]" value="Feasibility Study"> Feasibility Study<br>
                <input type="checkbox" name="service[]" value="Generation"> Generation<br>
                <input type="checkbox" name="service[]" value="Detail Design "> Detail Design <br>
                <input type="checkbox" name="service[]" value="Capex Opex"> Capex Opex<br>
                <input type="checkbox" name="service[]" value="Oil & Gas"> Oil & Gas<br>
                <input type="checkbox" name="service[]" value="Metal"> Metal<br>
                <input type="checkbox" name="service[]" value="Gold"> Gold<br>
                <input type="checkbox" name="service[]" value="Engineering Services"> Engineering Services<br>
                <input type="checkbox" name="service[]" value="Coal Mine Development"> Coal Mine Development<br>
                <input type="checkbox" name="service[]" value="Design & Drafting Service"> Design & Drafting Service<br>
                <input type="checkbox" name="service[]" value="Minerals & Metals Development"> Minerals & Metals Development<br>
                <input type="checkbox" name="service[]" value="Project Development & COntroction Service"> Project Development & COntroction Service<br>
                <input type="checkbox" name="service[]" value="Steel Fabrication"> Steel Fabrication<br>
                <input type="checkbox" name="service[]" value="Site COmmunications & IT System Design"> Site COmmunications & IT System Design<br>
                <input type="checkbox" name="service[]" value="Feasibillity Studies & Technical Due Dligence"> Feasibillity Studies & Technical Due Dligence<br>
                <input type="checkbox" name="service[]" value="Tearming with leading Cial Process Design Groups"> Tearming with leading Cial Process Design Groups<br>




            </div>

            <div class="form-group">
                <label for="project_description">Description</label>
                <textarea name="project_description" id="project_description" rows="4" required></textarea>
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
@endpush

@push('script')
<script src="{{ asset('js/create.js') }}"></script>
@endpush