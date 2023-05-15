<?php

namespace Database\Seeders;
use App\Models\Mapa;
use App\Models\Partida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fita;
use App\Models\TipusFita;

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
            'lat1' => 41.1975,
            'long1' =>1.7000,
            'lat2' => 41.2061,
            'long2' => 1.7650
        ]);
       
        $mapa->save();
        
        $partida = new Partida([

            'nom' => 'Vilanovina',
            'puntsVictoria' => 100,
            'duracio' => 30,
            'mapa_id' => 1
        ]);
        $partida->save();


        $tipusfita = [
        new TipusFita([
            'nom' => normal
        ]),
        new TipusFita([
            'nom' => x2
        ])
        ];
        foreach ($tipusfita as $tipus) {
            $tipus->save();
        }

        $fitas = [
            new Fita([
                'lat' => 41.2245400,
                'long' => 1.7255100,
                'partida_id' => 1,
                'tipus_id'  => 2
            ]),
            new Fita([
                'lat' => 41.2242100,
                'long' => 1.7259300,
                'partida_id' => 1,
                'tipus_id'  => 1
            ]),
            new Fita([
                'lat' => 41.2173000,
                'long' => 1.7389200,
                'partida_id' => 1,
                'tipus_id'  => 1
            ]),
            new Fita([
                'lat' => 41.2145400,
                'long' => 1.7255100,
                'partida_id' => 1,
                'tipus_id'  => 1
            ]),
            new Fita([
                'lat' => 41.22200,
                'long' => 1.71563,
                'partida_id' => 1,
                'tipus_id'  => 1
            ]),
        ];
    
        
        foreach ($fitas as $fita) {
            $fita->save();
        }

}
}