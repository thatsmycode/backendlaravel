<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Equip extends Model
{   
    use CrudTrait;
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nom',
        'partida_id',
        'punts'        
    ];
    public function partida()
    {
    return $this->belongsTo(Partida::class);
    }

}
