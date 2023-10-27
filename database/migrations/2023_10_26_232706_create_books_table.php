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
            $table->string('autor');
            $table->year('year');
            $table->string('publisher');
            $table->string('city');
            $table->string('cover');
            $table->foreignId('bookshelfs_id')->index()->constrained();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {

            $table->foreign('id')
                    ->references('id')
                    ->on('books')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('categories');
    }
};
