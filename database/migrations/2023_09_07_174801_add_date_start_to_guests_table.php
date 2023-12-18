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
        Schema::table('guests', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->date('date_start')->nullable()->after('bedroom_id');
            $table->date('date_log_start')->nullable()->after('date_start');
            $table->date('date_log_finish')->nullable()->after('date_log_start');
            $table->string('photo_agreement')->nullable()->after('date_log_finish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn(['date_start']);
            $table->dropColumn(['date_log_start']);
            $table->dropColumn(['date_log_finish']);
            $table->dropColumn(['photo_agreement']);
        });
    }
};
