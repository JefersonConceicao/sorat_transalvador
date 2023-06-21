<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMenu extends Model
{
    use HasFactory;
    
    protected $table = 'grm_grupo_menu';
    protected $primaryKey = 'grm_id_grm';

    protected $fillable = [
        'grm_id_gru',
        'grm_id_men'
    ];
    
    public $timestamps = false;
}

