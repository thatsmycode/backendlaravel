<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapa;
use App\Models\Partida;
use App\Models\user;
use Spatie\Permission\Models\Role; 
use App\Models\Equip;
 
use App\Models\Fita;
use App\Models\TipusFita;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        {
            $jugador = Role::create(['name' => 'jugador']);           
            $admin = Role::create(['name' => 'admin']);
        }
        

        $useradmin = new User([
            'name'      => 'admin123',
            'email'     => 'admin123@gmail.com',
            'password'  => 'admin123',
        ]);
        $useradmin->assignRole('admin');
        $useradmin->save();

        $mapa = new Mapa([
            
            'nom' => 'vng',
            'lat1' => 41.1975,
            'long1' =>1.7000,
            'lat2' => 41.2061,
            'long2' => 1.7650
        ]);
       
        $mapa->save();
        
        $partida = new Partida([
            'poblacio' => 'Vilanova',
            'nom' => 'Vilanovina',
            'puntsVictoria' => 100,
            'duracio' => 30,
            'mapa_id' => 1
        ]);
        $partida->save();


        $tipusfita = [
        new TipusFita([
            'nom' => 'normal'
        ]),
        new TipusFita([
            'nom' => 'x2'
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


        $equips = [
        new Equip([
             
        'partida_id' => 1 ,
        'nom' => 'ALFA',
        'punts' => 0
        ]),

        new Equip([
           
        'partida_id'  => 1,
        'nom' => 'BRAVO',
        'punts'  => 0
        ])];
        foreach ($equips as $equip) {
            $equip->save();
        }
    }
}
