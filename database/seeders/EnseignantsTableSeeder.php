<?php

namespace Database\Seeders;

use App\Models\Enseignant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnseignantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enseignantRecords =[
            [ 'id'=>1,
            'name'=>'ichrak',
            'image'=>'',
            'mobile'=>'28878286',
            'address'=>'tunis',
            'status'=>0,
            'email'=>'ichrak@gmail.com',
            ],
        ];
        Enseignant::insert( $enseignantRecords);
    }
}
