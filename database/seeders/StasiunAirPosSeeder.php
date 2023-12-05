<?php

namespace Database\Seeders;

use App\Models\StasiunAirPos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StasiunAirPosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_pos' => 'dhompo',
                'batas_air_siaga' => 1,
                'batas_air_awas' => 1.5,
            ],
            [
                'nama_pos' => 'purwodadi',
                'batas_air_siaga' => 0.6,
                'batas_air_awas' => 1
            ]
        ];

        StasiunAirPos::insert($data);
    }
}
