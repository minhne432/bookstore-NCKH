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
            $table->string('isbn');
            $table->string('rcmd1_isbns')->nullable();
            $table->string('rcmd2_isbns')->nullable();
            $table->string('rcmd3_isbns')->nullable();
            $table->string('rcmd4_isbns')->nullable();
            $table->string('rcmd5_isbns')->nullable();
            $table->string('rcmd6_isbns')->nullable();
            $table->string('rcmd7_isbns')->nullable();
            $table->string('rcmd8_isbns')->nullable();
            $table->string('rcmd9_isbns')->nullable();
            $table->string('rcmd10_isbns')->nullable();
            $table->string('rcmd11_isbns')->nullable();
            $table->string('rcmd12_isbns')->nullable();
            $table->string('rcmd13_isbns')->nullable();
            $table->string('rcmd14_isbns')->nullable();
            $table->string('rcmd15_isbns')->nullable();
            $table->string('rcmd16_isbns')->nullable();
            $table->string('rcmd17_isbns')->nullable();
            $table->string('rcmd18_isbns')->nullable();
            $table->string('rcmd19_isbns')->nullable();
            $table->string('rcmd20_isbns')->nullable();
            $table->timestamps();
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
