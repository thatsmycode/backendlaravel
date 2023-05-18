<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use CrudTrait;
    use HasFactory;

    
    protected $fillable = [
        'id',
        'nom',
        'poblacio',
        'puntsVictoria',
        'duracio',
        'mapa_id', 
    ];
    public function fita(){
        return $this->hasMany(Fita::class);
    }
   
    public function equip(){
        return $this->hasMany(Equip::class);
    }
    public function mapa(){
        return $this->belongsTo(Mapa::class);
    }
}
