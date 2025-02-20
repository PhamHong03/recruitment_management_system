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
        Schema::create('hiring_rounds', function (Blueprint $table) {
            $table->id();
            $table->string('hiring_round_name');
            $table->date('start_date');  
            $table->date('end_date');   
            $table->enum('status', ['pending', 'ongoing', 'completed', 'canceled'])->default('pending');
            $table->string('description') ;
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiring_rounds');
    }
};
