<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetInformation extends Model
{
    use HasFactory;

    protected $table = 'pet_information'; // Define the table name

    protected $fillable = [
        'name', 
        'breed', 
        'owner_or_center', 
        'age', 
        'size', 
        'gender', 
        'health_status', 
        'photo', 
        'care_requirements', 
        'status', 
        'additional_notes',
        'age'
    ];

    /**
     * Define the relationship between PetInformation and the Pet model
     */
    public function pet()
    {
        return $this->hasOne(Pet::class); // Assuming you have a Pet model that stores pet details
    }

    /**
     * Define the relationship between PetInformation and the Owner model
     */
    public function owner()
    {
        return $this->belongsTo(Owner::class); // Assuming there's an Owner model and this table links to an owner
    }

    // You can add other relationships as needed.
}

