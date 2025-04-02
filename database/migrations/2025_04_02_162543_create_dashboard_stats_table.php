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
        Schema::create('dashboard_stats', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_revenue', 10, 2)->default(0); 
            $table->integer('total_reservations')->default(0); 
            $table->decimal('occupancy_rate', 5, 2)->default(0); 
            $table->timestamp('last_update')->useCurrent(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_stats');
    }
};
