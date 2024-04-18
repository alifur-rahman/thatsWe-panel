<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        // Data Protection
        'dp_en', 'dp_de', 'dp_fr', 'dp_es', 'dp_tr', 'dp_it', 'dp_pt', 'dp_da', 'dp_nl',
        // Imprint
        'im_en', 'im_de', 'im_fr', 'im_es', 'im_tr', 'im_it', 'im_pt', 'im_da', 'im_nl',
    ];
    protected $table = 'co_polices';
}
