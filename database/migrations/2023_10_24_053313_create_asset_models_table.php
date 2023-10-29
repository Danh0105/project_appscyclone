<?php

use App\Models\Admin\CategoryModel;
use App\Models\Admin\LocationModel;
use App\Models\Admin\ModelofManuf;
use App\Models\Admin\SupplierModel;
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
        Schema::create('asset_models', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->foreignIdFor(CategoryModel::class);
            $table->string('condition');
            $table->text('note');
            $table->date('date');
            $table->string('serial');
            $table->foreignIdFor(ModelofManuf::class);
            $table->foreignIdFor(SupplierModel::class);
            $table->foreignIdFor(LocationModel::class);
            $table->integer('warranty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_models');
    }
};
