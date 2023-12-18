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
        Schema::table('bedrooms', function (Blueprint $table) {
            $table->string('img')->nullable()->after('pay');
            $table->boolean('show_page')->default(0)->after('img');
            $table->string('web_phrase', 400)->nullable()->after('show_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bedrooms', function (Blueprint $table) {
            $table->dropColumn(['img']);
            $table->dropColumn(['show_page']);
            $table->dropColumn(['web_phrase']);
        });
    }
};
