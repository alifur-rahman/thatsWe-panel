<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'screen_logo',
        'screenshot',
    ];
}
