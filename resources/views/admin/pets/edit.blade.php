@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Pet</h2>
    <form action="{{ route('admin.pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')  <!-- This is to specify that this is an update request -->
        
        <!-- ID (hidden field as it's not editable) -->
        <input type="hidden" name="id" value="{{ $pet->id }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pet->name }}" required>
        </div>

        <div class="form-group">
            <label for="breed">Breed</label>
            <input type="text" class="form-control" id="breed" name="breed" value="{{ $pet->breed }}" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $pet->age }}" required>
        </div>

        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" name="size" value="{{ $pet->size }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="health_status">Health Status</label>
            <select class="form-control" id="health_status" name="health_status" required>
                <option value="healthy" {{ $pet->health_status == 'healthy' ? 'selected' : '' }}>Healthy</option>
                <option value="sick" {{ $pet->health_status == 'sick' ? 'selected' : '' }}>Sick</option>
                <option value="injured" {{ $pet->health_status == 'injured' ? 'selected' : '' }}>Injured</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="available" {{ $pet->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="adopted" {{ $pet->status == 'adopted' ? 'selected' : '' }}>Adopted</option>
                <option value="pending" {{ $pet->status == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($pet->photo)
                <img src="{{ asset('storage/' . $pet->photo) }}" alt="Pet Image" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label for="care_requirements">Care Requirements</label>
            <textarea class="form-control" id="care_requirements" name="care_requirements" required>{{ $pet->care_requirements }}</textarea>
        </div>

        <div class="form-group">
            <label for="additional_notes">Additional Notes</label>
            <textarea class="form-control" id="additional_notes" name="additional_notes">{{ $pet->additional_notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Pet</button>
    </form>
</div>
@endsection
