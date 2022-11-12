<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Promotor extends Model
{
    // Notifications to promotor
    use Notifiable;

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
