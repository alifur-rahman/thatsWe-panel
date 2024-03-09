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
       'title_sp',
       'title_tr',
       'title_it',
       'title_po',
       'title_da',
       'title_ne',
       'desc_en',
       'desc_de',
       'desc_fr',
       'desc_sp',
       'desc_tr',
       'desc_it',
       'desc_po',
       'desc_da',
       'desc_ne',
    ];
}
