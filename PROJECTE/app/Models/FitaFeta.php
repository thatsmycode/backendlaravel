<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitaFeta extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'jugador_id',
        'fita_id', 
             
    ];
    public function jugador(){
        return $this->belongsTo(Jugador::class);
    }
    public function fita(){
        return $this->belongsTo(Fita::class);
    }
}
