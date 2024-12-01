<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    // Define the table name (if it differs from the pluralized default)
    protected $table = 'pet_information';

    // Specify all the fillable fields for mass assignment
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
        'type', // If "type" is also used elsewhere
    ];
}
