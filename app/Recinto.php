<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    // Table
    protected $table = 'recintos';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'nombre', 'coste_alquiler', 'precio_entrada'
    ];
}
