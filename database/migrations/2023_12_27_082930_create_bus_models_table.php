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
        Schema::create('bus_models', function (Blueprint $table) {
            $table->id();
            $table->string('deg_namber', 8);
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                    ->references('id')->on('car_brands')
                    ->nullable();
            $table->unsignedBigInteger('drive_id')->nullable();
            $table->foreign('drive_id')
                    ->references('id')->on('drive_models')
                    ->onDelete('set null')
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_models');
    }
};
