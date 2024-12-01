<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pet_information', function (Blueprint $table) {
            $table->text('care_requirements')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pet_information', function (Blueprint $table) {
            $table->text('care_requirements')->nullable(false)->change();
        });
    }
    
};
