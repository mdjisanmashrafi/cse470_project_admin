<!-- Show List of Pets -->
<h1>Pets List</h1>

@foreach ($pets as $pet)
    <div class="pet-card">
        <h3>{{ $pet->name }}</h3>

        <!-- Display the pet image, and link to the show page with pet details -->
        @if($pet->photo)
            <a href="{{ route('pet.show', $pet->id) }}">
                <img src="{{ asset('storage/' . $pet->photo) }}" alt="{{ $pet->name }}" style="width: 200px; height: auto;">
            </a>
        @else
            <p>No photo available</p>
        @endif
    </div>
@endforeach
