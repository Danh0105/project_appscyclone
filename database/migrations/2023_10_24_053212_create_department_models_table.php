<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_models', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->string('floor');
            $table->string('unit');
            $table->string('building');
            $table->string('street_address');
            $table->string('city_name');
            $table->string('state_name');
            $table->string('country');
            $table->integer('zip_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_models');
    }
};
