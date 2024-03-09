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
        Schema::create('success_infos', function (Blueprint $table) {
            $table->id();
            $table->enum('assign_to', ['ThatsWE', 'ThatsSoft']);
            $table->enum('save_as', ['active', 'draft']);
            $table->string('title_en')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('title_sp')->nullable();
            $table->string('title_tr')->nullable();
            $table->string('title_it')->nullable();
            $table->string('title_po')->nullable();
            $table->string('title_da')->nullable();
            $table->string('title_ne')->nullable();
           
            $table->string('desc_en')->nullable();
            $table->string('desc_de')->nullable();
            $table->string('desc_fr')->nullable();
            $table->string('desc_sp')->nullable();
            $table->string('desc_tr')->nullable();
            $table->string('desc_it')->nullable();
            $table->string('desc_po')->nullable();
            $table->string('desc_da')->nullable();
            $table->string('desc_ne')->nullable();
           
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('success_infos');
    }
};
