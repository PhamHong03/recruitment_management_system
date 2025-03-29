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
        Schema::create('open_positions', function (Blueprint $table) {
            $table->id();
            $table->string('open_position_name');
            $table->string('open_position_description');
            $table->string('open_position_requirements');
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('hiring_round_id')->constrained('hiring_rounds')->onDelete('cascade');
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_positions');
    }
};
