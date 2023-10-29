<?php

use App\Models\Admin\DepartmentModel;
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
        Schema::create('location_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(DepartmentModel::class);
            $table->string('location_name');
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_models');
    }
};
