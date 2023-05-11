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
        Schema::create("contact", function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->nullable(false);
            $table->string("email", 100)->nullable(false);
            $table->string("phone", 100)->nullable(false);
            $table->string("subject", 100)->nullable(false);
            $table->text("message")->nullable(false);
            $table->boolean("is_read")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("contact");
    }
};
