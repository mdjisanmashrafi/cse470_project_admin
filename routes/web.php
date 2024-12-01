<?php
use App\Http\Controllers\Admin\PetController;
use App\Models\Pet;

Route::prefix('admin/pets')->name('admin.pets.')->group(function() {
    // Display all pets (Admin)
    Route::get('/', [PetController::class, 'index'])->name('index');

    // Show the form to create a new pet (Admin)
    Route::get('create', [PetController::class, 'create'])->name('create');

    // Store a newly created pet (Admin)
    Route::post('store', [PetController::class, 'store'])->name('store');

    // Route for editing a pet (Admin)
    Route::get('{id}/edit', [PetController::class, 'edit'])->name('edit');

    // Route for updating a pet (Admin)
    Route::put('{id}', [PetController::class, 'update'])->name('update');

    // Delete a pet (Admin)
    Route::delete('destroy/{id}', [PetController::class, 'destroy'])->name('destroy');
});

// Frontend Route (Non-admin)
Route::get('/pets', function () {
    $pets = Pet::all();
    return view('pets.index', compact('pets'));
});

Route::get('/pets/{id}', function ($id) {
    $pet = Pet::find($id);

    if (!$pet) {
        abort(404, 'Pet not found');
    }

    return view('pets.show', compact('pet'));
    
});





