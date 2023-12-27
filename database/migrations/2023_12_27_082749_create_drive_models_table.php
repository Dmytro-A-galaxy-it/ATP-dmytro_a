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
        Schema::create('drive_models', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 100);
            $table->date('birthday');
            $table->string('photo', 500)->nullable();
            $table->double('salary', 8, 2);
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drive_models');
    }
};
