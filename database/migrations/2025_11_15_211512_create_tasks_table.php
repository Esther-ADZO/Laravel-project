<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title'); 
            $table->enum('statut', ['a_faire', 'en_cours', 'termine'])->default('a_faire');
            $table->text('description'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
