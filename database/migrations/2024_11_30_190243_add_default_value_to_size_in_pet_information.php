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
        $table->string('size')->default('medium')->change();
    });
}

public function down()
{
    Schema::table('pet_information', function (Blueprint $table) {
        $table->string('size')->nullable(false)->change(); // Revert to original if necessary
    });
}

};
