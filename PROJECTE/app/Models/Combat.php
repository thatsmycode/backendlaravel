<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//comentari per esborrar
class Combat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'fita_id',
        'equip_id',
        'soldadets'        
    ];

public function fita()
{
    return $this->belongsTo(Fita::class);
}
public function equip()
{
    return $this->belongsTo(Equip::class);
}

}