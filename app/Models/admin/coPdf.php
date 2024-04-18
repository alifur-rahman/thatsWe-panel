<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coPdf extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en', 'title_de', 'title_fr', 'title_es', 'title_tr', 'title_it', 'title_pt', 'title_da', 'title_nl',
        'subt_en', 'subt_de', 'subt_fr', 'subt_es', 'subt_tr', 'subt_it', 'subt_pt', 'subt_da', 'subt_nl',
        'ld_en', 'ld_de', 'ld_fr', 'ld_es', 'ld_tr', 'ld_it', 'ld_pt', 'ld_da', 'ld_nl',
        'txt_en', 'txt_de', 'txt_fr', 'txt_es', 'txt_tr', 'txt_it', 'txt_pt', 'txt_da', 'txt_nl',
        'ftxt_en', 'ftxt_de', 'ftxt_fr', 'ftxt_es', 'ftxt_tr', 'ftxt_it', 'ftxt_pt', 'ftxt_da', 'ftxt_nl',
    ];
}
