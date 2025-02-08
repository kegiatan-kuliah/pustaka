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
        Schema::create('book_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('condition');
            $table->text('description')->nullable();
            $table->enum('status', ['BORROW','RETURN']);
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_transactions');
    }
};
