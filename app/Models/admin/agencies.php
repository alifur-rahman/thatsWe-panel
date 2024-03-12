<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agencies extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_no',
        'app_name',
        'app_logo',
        'added_by',
        'show',
    ];
}
