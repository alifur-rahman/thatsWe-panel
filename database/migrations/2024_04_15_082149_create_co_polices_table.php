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
        Schema::create('co_polices', function (Blueprint $table) {
            $table->id();
            // Data Protection
            $table->text('dp_en')->nullable();
            $table->text('dp_de')->nullable();
            $table->text('dp_fr')->nullable();
            $table->text('dp_es')->nullable();
            $table->text('dp_tr')->nullable();
            $table->text('dp_it')->nullable();
            $table->text('dp_pt')->nullable();
            $table->text('dp_da')->nullable();
            $table->text('dp_nl')->nullable();
            // Imprint
            $table->text('im_en')->nullable();
            $table->text('im_de')->nullable();
            $table->text('im_fr')->nullable();
            $table->text('im_es')->nullable();
            $table->text('im_tr')->nullable();
            $table->text('im_it')->nullable();
            $table->text('im_pt')->nullable();
            $table->text('im_da')->nullable();
            $table->text('im_nl')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_polices');
    }
};
