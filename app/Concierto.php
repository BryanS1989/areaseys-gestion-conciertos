<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concierto extends Model
{
    // Table
    protected $table = 'conciertos';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'id_promotor', 'id_recinto',
        'nombre', 'numero_espectadores', 'fecha',
        'rentabilidad'
    ];
}
