@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-container">
            <h1 class="text-center">Create Project</h1>
      
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endpush

@push('script')
    <script src="{{ asset('js/create.js') }}"></script>
@endpush
