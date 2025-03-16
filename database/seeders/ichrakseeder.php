<?php

namespace Database\Seeders;

use App\Models\ichrak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ichrakseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Record=[
        ['id'=>1,'name'=>'sami','mobile'=>'28878286',],
        ['id'=>2,'name'=>'fffffffffff','mobile'=>'28878286'],
       ];

      ichrak::insert($Record);
    }
}
