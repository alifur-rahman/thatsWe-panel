<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class co_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'txt_en',
        'txt_de',
        'txt_fr',
        'txt_es',
        'txt_tr',
        'txt_it',
        'txt_pt',
        'txt_da',
        'txt_nl',
       
    ];
}
