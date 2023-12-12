<?php

namespace Database\Seeders;

use App\Models\StasiunHujanPos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StasiunHujanPosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_pos' => 'cendono',
                'batas_hujan_ringan' => 0.0,
                'batas_hujan_sedang' => 1,
                'batas_hujan_berat' => 1.5
            ],
            [
                'nama_pos' => 'lawang',
                'batas_hujan_ringan' => 0.0,
                'batas_hujan_sedang' => 1,
                'batas_hujan_berat' => 1.5
            ]
        ];

        StasiunHujanPos::insert($data);
    }
}
