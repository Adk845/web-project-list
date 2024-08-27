@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-container">
            <h1 class="text-center">Create Project</h1>
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" required>
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
                    <label for="sector">Sector</label>
                    <input type="text" name="sector" id="sector" required>
                </div>

                <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" name="service" id="service" required>
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
