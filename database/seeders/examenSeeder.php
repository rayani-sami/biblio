<?php

namespace Database\Seeders;

use App\Models\Examen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class examenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examenRecords = [
            [ 'id' => 1,
             'section_id' => 2,
             'niveau_id'=>7,
             'enseignant_id'=>0,
             'admin_id'=>1,
             'admin_type' =>'admin',
             'examen_name' => 'algo',
             'examen_code'=>'AL1',
             'examen_image'=>'',
             'description'=>'ALGO EXAMEN',
             'status'=>1],
            ];
             Examen::insert($examenRecords);
    }
}
