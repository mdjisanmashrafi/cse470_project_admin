<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Method to show all pets
    public function index()
    {
        // Fetch all pets from the database
        $pets = Pet::all(); // Ensure the `Pet` model is imported at the top of the file
    
        // Return the view with the pets data
        return view('showpet.index', compact('pets'));
    }
    
    
}





