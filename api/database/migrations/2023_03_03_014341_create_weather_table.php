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
        Schema::create('weather', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->string('city')->nullable();
            $table->float('temperature');
            $table->float('pressure');
            $table->string('icon');
            $table->string('main');
            $table->string('description');
            $table->float('wind_speed')->nullable();
            $table->float('wind_degree')->nullable();
            $table->float('humidity')->nullable();
            $table->float('feels_like')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
