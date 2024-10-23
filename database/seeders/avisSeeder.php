<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class avisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'idE'=>3,
                'idF' =>1,
                'points'=>20
            ],
            [
                'idE'=>2,
                'idF' =>1,
                'points'=>15
            ],
            [
                'idE'=>3,
                'idF' =>2,
                'points'=>19
            ],
            [
                'idE'=>4,
                'idF' =>3,
                'points'=>11
            ],
            [
                'idE'=>4,
                'idF' =>5,
                'points'=>13
            ]
            ];
            DB::table('avis')->insert($data);
    }
}
