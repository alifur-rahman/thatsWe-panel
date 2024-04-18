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
        Schema::create('co_pdfs', function (Blueprint $table) {
            $table->id();
            // title 
            $table->text('title_en')->nullable();
            $table->text('title_de')->nullable();
            $table->text('title_fr')->nullable();
            $table->text('title_es')->nullable();
            $table->text('title_tr')->nullable();
            $table->text('title_it')->nullable();
            $table->text('title_pt')->nullable();
            $table->text('title_da')->nullable();
            $table->text('title_nl')->nullable();
            // subtitle 
            $table->text('subt_en')->nullable();
            $table->text('subt_de')->nullable();
            $table->text('subt_fr')->nullable();
            $table->text('subt_es')->nullable();
            $table->text('subt_tr')->nullable();
            $table->text('subt_it')->nullable();
            $table->text('subt_pt')->nullable();
            $table->text('subt_da')->nullable();
            $table->text('subt_nl')->nullable();
            // licence duration 
            $table->text('ld_en')->nullable();
            $table->text('ld_de')->nullable();
            $table->text('ld_fr')->nullable();
            $table->text('ld_es')->nullable();
            $table->text('ld_tr')->nullable();
            $table->text('ld_it')->nullable();
            $table->text('ld_pt')->nullable();
            $table->text('ld_da')->nullable();
            $table->text('ld_nl')->nullable();
            // main content text 
            $table->text('txt_en')->nullable();
            $table->text('txt_de')->nullable();
            $table->text('txt_fr')->nullable();
            $table->text('txt_es')->nullable();
            $table->text('txt_tr')->nullable();
            $table->text('txt_it')->nullable();
            $table->text('txt_pt')->nullable();
            $table->text('txt_da')->nullable();
            $table->text('txt_nl')->nullable();
            // footer content 
            $table->text('ftxt_en')->nullable();
            $table->text('ftxt_de')->nullable();
            $table->text('ftxt_fr')->nullable();
            $table->text('ftxt_es')->nullable();
            $table->text('ftxt_tr')->nullable();
            $table->text('ftxt_it')->nullable();
            $table->text('ftxt_pt')->nullable();
            $table->text('ftxt_da')->nullable();
            $table->text('ftxt_nl')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_pdfs');
    }
};
