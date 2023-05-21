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
        Schema::create('flight_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('airline')->nullable();
            $table->string('departure')->nullable();
            $table->string('departure_code')->nullable();
            $table->string('arrival')->nullable();
            $table->string('arrival_code')->nullable();
            $table->string('class')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('duration')->nullable();
            $table->string('scheduled')->nullable();
            $table->string('estimated')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_schedules');
    }
};
