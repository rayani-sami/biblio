<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords =[
            [ 'id'=>1,
            'name'=>'ichrak',
            'type'=>'superadmin',
            'mobile'=>'28878286',
            'enseignant_id'=>0,
            'image'=>'',
            'status'=>1,
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$cu4Ay10AQ.WH2yP0g2EO/eLzrU35MAWHH0AeCUKiH.DgfWqAbKeGm'],
        ];

           \App\Models\Admin::insert($adminRecords);

    }
}
