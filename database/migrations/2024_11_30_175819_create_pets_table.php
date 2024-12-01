<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pet_information', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Pet's name
            $table->string('breed'); // Pet's breed
            $table->enum('owner_or_center', ['owner', 'center']); // Pet's owner or adoption center
            $table->integer('age')->default(0)->change(); // Pet's age
            $table->string('size'); // Pet's size (small, medium, large, etc.)
            $table->string('gender')->default('male'); // Add a default value; // Pet's gender
            $table->string('health_status'); // Pet's health status (e.g., healthy, sick, etc.)
            $table->string('photo')->nullable(); // Path to the pet's photo (nullable)
            $table->text('care_requirements'); // Special care requirements for the pet
            $table->enum('status', ['available', 'adopted', 'pending']); // Pet's adoption status
            $table->text('additional_notes')->nullable(); // Additional notes about the pet
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pet_information');
    }
};
