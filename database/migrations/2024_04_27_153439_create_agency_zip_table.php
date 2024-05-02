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
        Schema::create('agency_zip', function (Blueprint $table) {
            $table->id();
            $table->text('zip')->nullable();
            $table->text('company_name')->nullable();
            $table->text('telephone')->nullable();
            $table->text('city')->nullable();
            $table->text('street')->nullable();
            $table->text('email')->nullable();
            $table->text('site_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_zip');
    }
};
