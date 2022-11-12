<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoConcierto extends Model
{
    // Table
    protected $table = 'grupos_conciertos';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'id_grupo', 'id_concierto'
    ];
}
