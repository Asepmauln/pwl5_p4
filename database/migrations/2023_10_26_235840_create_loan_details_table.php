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
        
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->index()->constrained();
            $table->date('loan_at');
            $table->date('return_at');
            $table->timestamps();
        });
        
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('books_id')->index()->constrained();
            $table->boolean('is_return');
            $table->timestamps();
        });
         
        Schema::table('loan_details', function (Blueprint $table) {
         $table->foreignId('loans_id')
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_details');

        Schema::dropIfExists('loans');
        
    }
    
    
};
