<?php

namespace App\Http\Controllers;

use App\Models\PetInformation;
use Illuminate\Http\Request;

class PetInformationController extends Controller
{
    // Display all pets
    public function index()
    {
        $pets = PetInformation::all();
        return view('admin.pets.index', compact('pets'));
    }

    // Show form to create a new pet
    public function create()
    {
        return view('admin.pets.create');
    }

    // Store a new pet in the database
    public function store(Request $request)
    {
        PetInformation::create($request->all());
        return redirect()->route('admin.pets.index');
    }

    // Show form to edit a pet
    public function edit($id)
    {
        $pet = PetInformation::findOrFail($id);
        return view('admin.pets.edit', compact('pet'));
    }

    // Update pet information
    public function update(Request $request, $id)
    {
        $pet = PetInformation::findOrFail($id);
        $pet->update($request->all());
        return redirect()->route('admin.pets.index');
    }

    // Delete a pet
    public function destroy($id)
    {
        $pet = PetInformation::findOrFail($id);
        $pet->delete();
        return redirect()->route('admin.pets.index');
    }
}

