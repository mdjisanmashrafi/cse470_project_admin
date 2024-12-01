@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add New Pet</h2>
    <form action="{{ route('admin.pets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- ID (hidden field, will be auto-generated in DB) -->
        <input type="hidden" name="id" value="">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="breed">Breed</label>
            <input type="text" class="form-control" id="breed" name="breed" value="{{ old('breed') }}" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
        </div>

        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="health_status">Health Status</label>
            <select class="form-control" id="health_status" name="health_status" required>
                <option value="healthy" {{ old('health_status') == 'healthy' ? 'selected' : '' }}>Healthy</option>
                <option value="sick" {{ old('health_status') == 'sick' ? 'selected' : '' }}>Sick</option>
                <option value="injured" {{ old('health_status') == 'injured' ? 'selected' : '' }}>Injured</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="adopted" {{ old('status') == 'adopted' ? 'selected' : '' }}>Adopted</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <div class="form-group">
            <label for="care_requirements">Care Requirements</label>
            <textarea class="form-control" id="care_requirements" name="care_requirements">{{ old('care_requirements') }}</textarea>
        </div>

        <div class="form-group">
            <label for="additional_notes">Additional Notes</label>
            <textarea class="form-control" id="additional_notes" name="additional_notes">{{ old('additional_notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Add Pet</button>
    </form>
</div>
@endsection
