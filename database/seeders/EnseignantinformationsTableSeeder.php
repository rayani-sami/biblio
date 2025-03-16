<?php

namespace Database\Seeders;

use App\Models\EnseignantProffessionel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnseignantinformationsTableSeeder extends Seeder
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
            'enseignant_id'=>1,
            'nationnalite'=>'tunisien',
            'grade'=>'maitre assistant',
            'departement'=>'informatique',
            'statut'=>'vocataire',
            ],
        ];
        EnseignantProffessionel::insert($enseignantRecords);
    }
}
