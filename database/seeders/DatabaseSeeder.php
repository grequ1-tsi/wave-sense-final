<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Arthur',
            'email' => 'kitochegalli@gmail.com',
            'siape' => '7654321',
            'role' => 'user',
            'password' => bcrypt('St@rW@rs1977')
        ]);

        User::factory()->create([
            'name' => 'Ahron',
            'email' => 'agnes@gmail.com',
            'siape' => '7162534',
            'role' => 'user',
            'password' => bcrypt('@gnes2000')
        ]);

        User::factory()->create([
            'name' => 'Adriano',
            'email' => 'skyhunter16@gmail.com',
            'siape' => '1726354',
            'role' => 'user',
            'password' => bcrypt('skyruhunt@16')
        ]);

        User::factory()->create([
            'name' => 'Gabriel',
            'email' => 'twuisengames@gmail.com',
            'siape' => '1267354',
            'role' => 'user',
            'password' => bcrypt('twuiseng@mes2001')
        ]);
        

    }
}
