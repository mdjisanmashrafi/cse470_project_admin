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
            $table->string('owner_or_center')->nullable(); // Add this column
        });
    }
    public function down()
{
    Schema::table('pet_information', function (Blueprint $table) {
        $table->dropColumn('owner_or_center');
    });
}

};
