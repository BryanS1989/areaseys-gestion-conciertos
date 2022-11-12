<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    // Table
    protected $table = 'medios';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'nombre'
    ];
}
