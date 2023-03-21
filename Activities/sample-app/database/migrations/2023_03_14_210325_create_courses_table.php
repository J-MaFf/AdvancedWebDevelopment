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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // The id( ) method creates the primary key ID column that auto increments, 
            // Lets create columns for the courses table
            $table->string('subject');
            $table->integer('number');
            $table->string('title');
            $table->string('description');
            $table->float('credits');
            $table->string('prereq');
            $table->timestamps(); // The timestamps( ) method creates two columns: created_at and updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
