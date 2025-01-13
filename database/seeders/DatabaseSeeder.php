<?php

namespace Database\Seeders;

use App\Models\Movimento;
use App\Models\Sala;
use App\Models\Setor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Miguel',
            'email' => 'miguelgrequi@gmail.com',
            'siape' => '1234567',
            'role' => 'admin',
            'password' => bcrypt('L@stSon1938')
        ]);

        Movimento::factory(10)->create();

//        Setor::factory()->create(
  //          [
    //            'nome' => 'Curso Superior em Tecnologia em Sistemas para Internet',
      //          'sigla' => 'CSTSI',
        //        'responsavel' => 1
          //  ]
       // );
        //Sala::factory()->create(
          //  [
            //    'numSalas' => '147B',
              //  'dispositivo' => 'Krypto',
                //'setores_id' => 31
           // ]
        //);
        

    }
}
