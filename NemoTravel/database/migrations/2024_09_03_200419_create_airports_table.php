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
        Schema::create('airports', function (Blueprint $table) {
            $table->string('code', 3)->primary();
            $table->string('cityName_ru');
            $table->string('cityName_en');
            $table->string('airportName_ru')->nullable();
            $table->string('airportName_en')->nullable();
            $table->string('area', 3)->nullable();
            $table->string('country', 2)->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('lng')->nullable();
            $table->string('timezone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
