<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("semesterplans", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("course");
            $table->string("section");
            $table->string("time");
            $table->string("location");
            $table->string("instructor");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("semesterplans");
    }
};
