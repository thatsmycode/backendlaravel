<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    use CrudTrait;
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'nom',
        'lat1',
        'long1',
        'lat2',
        'long2'        
    ];
    public function partida(){
        return $this->hasMany(Partida::class);
    }
}
