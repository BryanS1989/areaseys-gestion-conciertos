<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioConcierto extends Model
{
    // Table
    protected $table = 'medios_conciertos';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'id_medio', 'id_concierto'
    ];
}
