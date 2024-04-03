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
        Schema::create('catalogues', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('lot_number');
            $table->text('description');
            $table->integer('estimated_price');
            $table->enum('is_archived', ['yes', 'no'])->default('no');

            $table->foreignUuid('auction_id');
            $table->foreignUuid('item_id');

            $table->foreign('auction_id')->references('id')->on('auctions');
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
        Schema::dropIfExists('catalogues');
    }
};
