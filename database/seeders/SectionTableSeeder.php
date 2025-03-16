<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Record =[
            [ 'id'=>1,
            'name'=>'informatique',
            'status'=>1 ],
            ['id'=>2,
            'name'=>'gestion',
            'status'=>1],
            ['id'=>3,
            'name'=>'economie',
            'status'=>1],
        ];
        Section::insert($Record);

    }
}
