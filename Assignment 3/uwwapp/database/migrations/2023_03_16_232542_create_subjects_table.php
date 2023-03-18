<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // This is the function that creates the table collumns
    {
        
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('full_name');
            //timestamps
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
