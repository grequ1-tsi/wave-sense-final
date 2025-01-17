<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class profSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Adriane',
            'email' => 'adrianeramires@ifsul.edu.br',
            'siape' => '1234568',
            'role' => 'user',
            'password' => bcrypt('senha5')
        ]);

        User::factory()->create([
            'name' => 'Gill',
            'email' => 'gillgonzales@ifsul.edu.br',
            'siape' => '1234569',
            'role' => 'user',
            'password' => bcrypt('senha5')
        ]);
        //
    }
}
