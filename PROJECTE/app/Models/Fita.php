<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fita extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'id',
        'lat',
        'long',
        'partida_id',
        'tipus_id' 
        
    ];
    public function combat(){
        return $this->hasMany(Combat::class);
    }
    public function tipus(){
        return $this->belongsTo(TipusFita::class);
    }
    public function partida(){
        return $this->belongsTo(Partida::class);
    }
}
