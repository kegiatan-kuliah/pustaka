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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('condition');
            $table->float('price');
            $table->unsignedBigInteger('total_pages');
            $table->text('synopsis')->nullable();
            $table->string('cover')->nullable();
            $table->unsignedBigInteger('book_category_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('book_location_id');
            $table->timestamps();

            $table->foreign('book_category_id')->references('id')->on('book_categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('book_location_id')->references('id')->on('book_locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
