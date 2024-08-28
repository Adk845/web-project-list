@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <h1 class="text-center">Edit Project</h1>
        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="On Progres" {{ $project->status == 'On Progres' ? 'selected' : '' }}>On Progres</option>
                    <option value="Finish" {{ $project->status == 'Finish' ? 'selected' : '' }}>Finish</option>
                </select>
            </div>

            <div class="form-group">
                <label for="project_number">Project Number</label>
                <input type="text" name="project_number" id="project_number" value="{{ $project->project_number }}" required>
            </div>

            <div class="form-group">
                <label for="project_manager">Project Manager</label>
                <input type="text" name="project_manager" id="project_manager" value="{{ $project->project_manager }}" required>
            </div>

            <div class="form-group">
                <label for="project_location">Project Location</label>
                <input type="text" name="project_location" id="project_location" value="{{ $project->project_location }}" required>
            </div>

            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" name="client" id="client" value="{{ $project->client }}" required>
            </div>

            <div class="form-group">
                <label for="project_start">Start Date</label>
                <input type="date" name="project_start" id="project_start" value="{{ $project->project_start->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="project_finish">End Date</label>
                <input type="date" name="project_finish" id="project_finish" value="{{ $project->project_finish->format('Y-m-d') }}" required>
            </div>

            <!-- <div class="form-group">
                <label for="project_picture">Project Image (optional)</label>
                <input type="file" name="project_picture" id="project_picture" accept="image/*" onchange="previewImage(event)">
                @if($project->project_picture)
                    <div class="mt-3">
                        <img id="image_preview" src="{{ asset('storage/' . $project->project_picture) }}" alt="Image Preview" style="max-height: 200px;">
                    </div>
                @endif
            </div> -->

            <div class="form-group">
                <label for="sector">Sector</label><br>
                @foreach(['Nickel', 'Power', 'Coal', 'Oil & Gas', 'Tin', 'Metal', 'Gold', 'Infrastructure', 'Building', 'Haul Road'] as $sector)
                    <input type="checkbox" name="sector[]" value="{{ $sector }}" {{ in_array($sector, explode(', ', $project->sector)) ? 'checked' : '' }}> {{ $sector }}<br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="service">Service</label><br>
                @foreach(['Feasibility Study', 'Generation', 'Detail Design', 'Capex Opex', 'Oil & Gas', 'Metal', 'Gold', 'Engineering Services', 'Coal Mine Development', 'Design & Drafting Service', 'Minerals & Metals Development', 'Project Development & Construction Service', 'Steel Fabrication', 'Site Communications & IT System Design', 'Feasibility Studies & Technical Due Diligence', 'Teaming with leading Cial Process Design Groups'] as $service)
                    <input type="checkbox" name="service[]" value="{{ $service }}" 
                    {{ in_array($service, explode(', ', $project->service)) ? 'checked' : '' }}> 
                    {{ $service }}<br>
                @endforeach
            </div>
            <div class="form-group">
                <label for="project_description">Description</label>
                <textarea name="project_description" id="project_description" rows="4" required>{{ $project->project_description }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit">Update Project</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endpush

@push('script')
<script src="{{ asset('js/edit.js') }}"></script>
@endpush
