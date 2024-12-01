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
        Schema::table('pet_information', function (Blueprint $table) {
            $table->integer('age')->nullable();  // Add age field
        });
    }
    
    public function down()
    {
        Schema::table('pet_information', function (Blueprint $table) {
            $table->dropColumn('age');
        });
    }
    
};
