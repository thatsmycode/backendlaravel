<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equip extends Model
{   
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'id_partida',
        'nom',
        'punts'        
    ];
    public function partida()
    {
    return $this->belongsTo(Partida::class);
    }

}
