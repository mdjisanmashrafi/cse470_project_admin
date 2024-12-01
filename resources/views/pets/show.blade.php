@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <img src="{{ $pet->photo ? asset('storage/' . $pet->photo) : asset('images/default-pet.png') }}" 
             class="card-img-top" 
             alt="{{ $pet->name }}" 
             style="height: 400px; object-fit: cover;">
        <div class="card-body">
            <h2 class="card-title text-center">{{ $pet->name }}</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Breed:</strong> {{ $pet->breed }}</li>
                <li class="list-group-item"><strong>Age:</strong> {{ $pet->age }} years</li>
                <li class="list-group-item"><strong>Size:</strong> {{ $pet->size }}</li>
                <li class="list-group-item"><strong>Gender:</strong> {{ $pet->gender }}</li>
                <li class="list-group-item"><strong>Health Status:</strong> {{ $pet->health_status }}</li>
                <li class="list-group-item"><strong>Care Requirements:</strong> {{ $pet->care_requirements }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($pet->status) }}</li>
                @if($pet->additional_notes)
                <li class="list-group-item"><strong>Additional Notes:</strong> {{ $pet->additional_notes }}</li>
                @endif
            </ul>
            <div class="text-center mt-4">
                <a href="/pets" class="btn btn-primary">Back to All Pets</a>
            </div>
        </div>
    </div>
</div>
@endsection
