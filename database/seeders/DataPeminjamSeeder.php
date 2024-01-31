<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataPeminjam;

class DataPeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            ['kelas' => 'X SIJA 1'],
            ['kelas' => 'X SIJA 2'],
            ['kelas' => 'XI SIJA 1'],
            ['kelas' => 'XI SIJA 2'],
            ['kelas' => 'XII SIJA 1'],
            ['kelas' => 'XII SIJA 2']
        ];

        DataPeminjam::insert($kelas);
    }
}
