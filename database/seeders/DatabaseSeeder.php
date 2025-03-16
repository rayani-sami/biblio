<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       // $this->call(AdminTableSeeder::class);
       // $this->call(SectionTableSeeder::class);
      //  $this->call(NiveauTableSeeder::class);
      //  $this->call(EnseignantsTableSeeder::class);
       // $this->call(EnseignantinformationsTableSeeder::class);
       // $this->call(examenSeeder::class);
        $this->call(ichrakseeder::class);
    }
}
