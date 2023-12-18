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
        Schema::create('administrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->date('date_month_start')->nullable();
            $table->date('date_month_finish')->nullable();
            $table->string('water')->nullable();
            $table->string('internet')->nullable();
            $table->string('gas')->nullable();
            $table->string('electric_power')->nullable();
            $table->string('maintenance')->nullable();
            $table->string('other_amount')->nullable();
            $table->string('profit_total')->nullable();
            $table->string('profit_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrations');
    }
};
