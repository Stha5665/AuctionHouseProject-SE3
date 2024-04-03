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
        Schema::create('item_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('category_name');
            $table->string('used_medium')->nullable();
            $table->string('used_material')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimension')->nullable();
            $table->string('image_type_of')->nullable();
            $table->enum('is_framed', ['yes', 'no'])->nullable();

            $table->foreignUuid('item_id');
            $table->foreign('item_id')->references('id')->on('items');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_categories');
    }
};
