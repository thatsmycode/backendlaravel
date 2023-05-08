<?php

namespace Database\Seeders;
use App\Models\Mapa;
use App\Models\Partida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class mapaipartidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert a new map into the mapas table and retrieve its ID
        $mapa = new Mapa([

            'nom' => 'vng',
            'lat1' => 40.4168,
            'long1' =>1.7038,
            'lat2' => 41.3851,
            'long2' => 1.1734
        ]);
       
        $mapa->save();
   
}
}