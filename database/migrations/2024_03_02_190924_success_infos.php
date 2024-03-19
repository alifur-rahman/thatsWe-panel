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
            $table->text('title_en')->nullable();
            $table->text('title_de')->nullable();
            $table->text('title_fr')->nullable();
            $table->text('title_es')->nullable();
            $table->text('title_tr')->nullable();
            $table->text('title_it')->nullable();
            $table->text('title_pt')->nullable();
            $table->text('title_da')->nullable();
            $table->text('title_nl')->nullable();
           
            $table->text('desc_en')->nullable();
            $table->text('desc_de')->nullable();
            $table->text('desc_fr')->nullable();
            $table->text('desc_es')->nullable();
            $table->text('desc_tr')->nullable();
            $table->text('desc_it')->nullable();
            $table->text('desc_pt')->nullable();
            $table->text('desc_da')->nullable();
            $table->text('desc_nl')->nullable();
           
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
