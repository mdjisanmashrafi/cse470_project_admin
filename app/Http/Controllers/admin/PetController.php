<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetInformation; // Ensure you're using the correct model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Add Storage facade for file handling

class PetController extends Controller
{
    // Display a listing of the pets
    public function index()
    {
        $pets = PetInformation::all(); // Fetch all pets
        return view('admin.pets.index', compact('pets')); // Ensure 'admin.pets.index' exists
    }

    // Show the form for creating a new pet
    public function create()
    {
        return view('admin.pets.create'); // Ensure 'admin.pets.create' exists
    }

    // Store a newly created pet
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'size' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'health_status' => 'nullable|string|max:255',
            'care_requirements' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'additional_notes' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle photo upload if provided
        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Store the photo in the 'pet_images' folder in 'public' disk
            $photoPath = $request->file('photo')->store('pet_images', 'public');
        }

        // Create the pet
        PetInformation::create([
            'name' => $request->name,
            'breed' => $request->breed,
            'age' => $request->age,
            'size' => $request->size,
            'gender' => $request->gender,
            'health_status' => $request->health_status,
            'care_requirements' => $request->care_requirements,
            'status' => $request->status ?? 'active', // Default to 'active' if not provided
            'additional_notes' => $request->additional_notes,
            'photo' => $photoPath,  // Store the photo path if uploaded
        ]);

        // Redirect back with success message
        return redirect()->route('admin.pets.index')->with('success', 'Pet added successfully!');
    }

    // Show the form for editing a specific pet
    public function edit($id)
    {
        $pet = PetInformation::findOrFail($id); // Find pet by ID
        return view('admin.pets.edit', compact('pet')); // Ensure 'admin.pets.edit' exists
    }

    // Update a specific pet
    public function update(Request $request, $id)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'size' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'health_status' => 'nullable|string|max:255',
            'care_requirements' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'additional_notes' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional photo
        ]);

        // Find the pet by ID
        $pet = PetInformation::findOrFail($id);

        // Handle the file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($pet->photo && Storage::exists('public/' . $pet->photo)) {
                Storage::delete('public/' . $pet->photo); // Delete old photo
            }

            // Store the new photo
            $pet->photo = $request->file('photo')->store('pet_images', 'public');
        }

        // Update the pet details
        $pet->update([
            'name' => $request->name,
            'breed' => $request->breed,
            'age' => $request->age,
            'size' => $request->size,
            'gender' => $request->gender,
            'health_status' => $request->health_status,
            'care_requirements' => $request->care_requirements,
            'status' => $request->status ?? 'active',
            'additional_notes' => $request->additional_notes,
        ]);

        // Redirect back with success message
        return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully!');
    }

    // Delete a specific pet
    public function destroy($id)
    {
        $pet = PetInformation::findOrFail($id);

        // Check if the photo exists and delete it
        if ($pet->photo && Storage::exists('public/' . $pet->photo)) {
            Storage::delete('public/' . $pet->photo); // Delete the photo
        }

        // Delete the pet record
        $pet->delete();

        // Redirect back with success message
        return redirect()->route('admin.pets.index')->with('success', 'Pet deleted successfully!');
    }
}
