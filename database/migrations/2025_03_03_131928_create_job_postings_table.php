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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('job_posting_name');
            $table->string('job_posting_description');
            $table->string('job_posting_request');
            $table->string('job_posting_content');
            $table->string('job_posting_salary');
            $table->date('job_posting_start_date');
            $table->date('job_posting_end_date');
            $table->string('job_posting_status');
            $table->string('job_posting_poster');
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
