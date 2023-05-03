<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esdeveniment extends Model
{
    use CrudTrait;
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'partida_id',
        'esdeveniment_id',
        'jugador_id',
                
    ];
    public function partida(){
        return $this->belongsTo(Partida::class);
    }
    public function jugador(){
        return $this->belongsTo(Jugador::class);
    }
    public function tipus(){
        return $this->belongsTo(TipusEsdeveniment::class);
    }
}
