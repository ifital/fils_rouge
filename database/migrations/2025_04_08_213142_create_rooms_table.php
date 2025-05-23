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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique(); 
            $table->enum('type', ['dormitory', 'private']);
            $table->text('description')->nullable(); 
            $table->decimal('price', 10, 2); 
            $table->decimal('space', 4, 2); 
            $table->enum('status', ['available', 'occupied', 'cleaning', 'maintenance'])->default('available'); 
            $table->text('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
