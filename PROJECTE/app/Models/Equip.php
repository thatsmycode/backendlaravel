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
        'partida_id',
        'nom',
        'punts'        
    ];
    public function partida()
    {
    return $this->belongsTo(Partida::class);
    }

}
