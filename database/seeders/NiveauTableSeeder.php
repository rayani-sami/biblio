<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $NiveauRecord=[
        ['id'=>1,'parent_id'=>0,'section_id'=>1,'niveau_name'=>'licence','url'=>'licence','status'=>1],
        ['id'=>2,'parent_id'=>0,'section_id'=>1,'niveau_name'=>'mastere','url'=>'mastere','status'=>1],
       ];

       Niveau::insert($NiveauRecord);
    }
}
