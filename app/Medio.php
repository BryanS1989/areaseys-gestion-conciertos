<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    // Table
    protected $table = 'grupos';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'nombre'
    ];
}
