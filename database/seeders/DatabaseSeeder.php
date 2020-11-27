<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Karolis Balčiūnas',
            'email' => 'admin@test.com',
            'password' => Hash::make('Stud1234'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Jonas Jonaitis',
            'email' => 'lect1@test.com',
            'password' => Hash::make('Stud1234'),
            'role' => 'lecturer'
        ]);

        DB::table('users')->insert([
            'name' => 'Petras Petraitis',
            'email' => 'lect2@test.com',
            'password' => Hash::make('Stud1234'),
            'role' => 'lecturer'
        ]);

        DB::table('users')->insert([
            'name' => 'Juozas Juozaitis',
            'email' => 'stud1@test.com',
            'password' => Hash::make('Stud1234')
        ]);

        DB::table('users')->insert([
            'name' => 'Tomas Tomaitis',
            'email' => 'stud2@test.com',
            'password' => Hash::make('Stud1234')
        ]);

        DB::table('users')->insert([
            'name' => 'Lukas Lukaitis',
            'email' => 'stud3@test.com',
            'password' => Hash::make('Stud1234')
        ]);

        DB::table('temas')->insert([
            'user_id' => 1,
            'lecturer_id' => 2,
            'pavadinimas' => 'Operacinės sistemos',
            'aprasas' => 'Assemblerio ir C vystymasis.',
            'stud_limitas' => 3
        ]);

        DB::table('temas')->insert([
            'user_id' => 1,
            'lecturer_id' => 2,
            'pavadinimas' => 'Dirbtinis intelektas',
            'aprasas' => 'Dirbtinio intelekto poveikis žmonijai.',
            'stud_limitas' => 5
        ]);

        DB::table('temas')->insert([
            'user_id' => 1,
            'lecturer_id' => 3,
            'pavadinimas' => 'Matematika',
            'aprasas' => 'Modernios matematikos teoremos.',
            'stud_limitas' => 2
        ]);

        DB::table('siulomas')->insert([
            'user_id' => 4,
            'pavadinimas' => 'Robotika',
            'aprasas' => 'Robotai aplink mus.'
        ]);

        DB::table('siulomas')->insert([
            'user_id' => 5,
            'pavadinimas' => 'Chemija',
            'aprasas' => 'Chemijos raida XX a.'
        ]);
    }
}
