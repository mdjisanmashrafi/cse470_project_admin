@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Pet List</h2>
    <a href="{{ route('admin.pets.create') }}" class="btn btn-primary mb-3">Add New Pet</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Size</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
            <tr>
                <td>
                    @if ($pet->photo)
                    <img src="{{ asset('storage/' . $pet->photo) }}" alt="Pet Image" width="100">
                    @else
                    <img src="{{ asset('images/default-pet.png') }}" alt="Pet Image" width="100">
                    @endif
                </td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->age }}</td>
                <td>{{ $pet->size }}</td>
                <td>{{ $pet->status }}</td>
                <td>
                    <a href="{{ route('admin.pets.edit', $pet->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.pets.destroy', $pet->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this pet?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
