<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book_item', function (Blueprint $table) {
            $table->string('isbn13');
            $table->string('isbn10')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('authors')->nullable();
            $table->string('categories');
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('published_year'); // Đổi từ integer sang string
            $table->decimal('average_rating', 3, 2)->nullable();
            $table->integer('num_pages')->nullable();
            $table->integer('ratings_count')->nullable();
            $table->timestamps(); // Cột timestamps: created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_item');
    }
};
