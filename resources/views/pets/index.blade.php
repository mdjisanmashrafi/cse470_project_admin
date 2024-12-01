@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Pets Available for Adoption</h2>
    @if ($pets->isEmpty())
        <p class="text-center">No pets are currently available for adoption. Please check back later!</p>
    @else
        <div class="row">
            @foreach ($pets as $pet)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $pet->photo ? asset('storage/' . $pet->photo) : asset('images/default-pet.png') }}" 
                             class="card-img-top" 
                             alt="{{ $pet->name }}" 
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pet->name }}</h5>
                            <p class="card-text"><strong>Breed:</strong> {{ $pet->breed }}</p>
                            <p class="card-text"><strong>Age:</strong> {{ $pet->age }} years</p>
                            <p class="card-text"><strong>Size:</strong> {{ $pet->size }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ ucfirst($pet->status) }}</p>
                            <a href="{{ url('/pets/' . $pet->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
