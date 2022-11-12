<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    // Table
    protected $table = 'promotores';

    // PK
    protected $primaryKey = 'id';

    // Columns
    protected $fillable = [
        'nombre'
    ];
}
