<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'assign_to',
        'save_as',
        'title_en',
       'title_de',
       'title_fr',
       'title_es',
       'title_tr',
       'title_it',
       'title_pt',
       'title_da',
       'title_nl',
       'desc_en',
       'desc_de',
       'desc_fr',
       'desc_es',
       'desc_tr',
       'desc_it',
       'desc_pt',
       'desc_da',
       'desc_nl',
    ];
}
