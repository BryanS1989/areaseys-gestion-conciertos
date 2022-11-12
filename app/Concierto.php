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


    // Relationships

    /**
     * Get the promotor that owns the concierto.
     */
    public function promotor()
    {
        return $this->belongsTo('App\Promotor', 'id_promotor', 'id');
    }

    /**
     * Get the recinto that owns the concierto.
    */
    public function recinto()
    {
        return $this->belongsTo('App\Recinto', 'id_recinto', 'id');
    }

    /**
     * Grupos that belong to the concert.
     */
    public function grupos()
    {
        return $this->belongsToMany('App\Grupo', 'grupos_conciertos', 'id_concierto', 'id_grupo');
    }

    /**
     * medios that belong to the concert.
     */
    public function medios()
    {
        return $this->belongsToMany('App\Medio', 'medios_conciertos', 'id_concierto', 'id_medio');
    }

    /*
        FUNCTIONS
        ---------
    */
    public function getRentabilidad () {
        // calculate benefits

        $beneficiosEntradas = 0;
        $totalGastoGrupos = 0;

        $recinto = $this->recinto()->first();
        $grupos = $this->grupos()->get();

        $beneficiosEntradas = $this->numero_espectadores * $recinto->precio_entrada;

        // Each group takes the 10% of all the sold tickets
        foreach ($grupos as $grupo) {
            $totalGastoGrupos += ($grupo->cache + ($beneficiosEntradas * 0.1));
        };

        $gastos = $recinto->coste_alquiler + $totalGastoGrupos;

        $this->rentabilidad = $beneficiosEntradas - $gastos;

        $this->save();
    }

}
