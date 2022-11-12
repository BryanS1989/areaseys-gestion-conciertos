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


    // Relationships

    /**
     * Get conciertos for a promotor.
     */
    public function conciertos()
    {
        return $this->hasMany('App\Concierto', 'id_promotor', 'id');
    }
}
