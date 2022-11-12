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

    // Relationships

    /**
     * Get conciertos for a recinto.
     */
    public function conciertos()
    {
        return $this->hasMany('App\Concierto', 'id_recinto', 'id');
    }
}
