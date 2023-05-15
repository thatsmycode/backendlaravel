<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use CrudTrait;
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'soldadets',
        'equip_id'
    ];
    
    public function fitaFeta(){
        return $this->hasMany(FitaFeta::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function equip(){
        return $this->belongsTo(Equip::class);
    }

}
