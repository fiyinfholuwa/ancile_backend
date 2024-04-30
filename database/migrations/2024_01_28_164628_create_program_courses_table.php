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
        Schema::create('program_courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->nullable();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('about')->nullable();
            $table->text('why')->nullable();
            $table->text('level')->nullable();
            $table->string('entry_score')->nullable();
            $table->string('duration')->nullable();
            $table->string('location')->nullable();
            $table->string('intake')->nullable();
            $table->string('fee')->nullable();
            $table->text('university')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_courses');
    }
};
