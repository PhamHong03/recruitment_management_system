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
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->string('email'); 
            $table->unsignedBigInteger('job_position_id'); 
            $table->string('pdf_file_path'); 
            $table->timestamp('submitted_at')->nullable(); 
            $table->timestamps();

            
            $table->foreign('job_position_id')->references('id')->on('open_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_forms');
    }
};
