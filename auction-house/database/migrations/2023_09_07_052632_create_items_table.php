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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('lot_reference_id');
            $table->string('status');
            $table->string('artist_name');
            $table->date('produced_year');
            $table->string('subject_classification');
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->enum('is_archived', ['yes', 'no'])->default('no');

            $table->foreignUuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
