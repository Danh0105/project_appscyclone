<?php

use App\Models\Admin\AssetModel;
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
        Schema::create('image_models', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->timestamps();
            $table->foreignIdFor(AssetModel::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_models');
    }
};
