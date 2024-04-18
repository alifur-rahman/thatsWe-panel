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
        Schema::create('co_orders', function (Blueprint $table) {
            $table->id();
            $table->text('txt_en')->nullable();
            $table->text('txt_de')->nullable();
            $table->text('txt_fr')->nullable();
            $table->text('txt_es')->nullable();
            $table->text('txt_tr')->nullable();
            $table->text('txt_it')->nullable();
            $table->text('txt_pt')->nullable();
            $table->text('txt_da')->nullable();
            $table->text('txt_nl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_orders');
    }
};
