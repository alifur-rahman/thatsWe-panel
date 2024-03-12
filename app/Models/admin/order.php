<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'street',
        'zip',
        'city',
        'country',
        'telephone',
        'www',
        'mail_address',
        'managing_director',
        'agency_id',
    ];
}
