<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas_data')->insert([
            ['nama_kelas' => 'X SIJA 1'],
            ['nama_kelas' => 'X SIJA 2'],
            ['nama_kelas' => 'XI SIJA 1'],
            ['nama_kelas' => 'XI SIJA 2'],
            ['nama_kelas' => 'XII SIJA 1'],
            ['nama_kelas' => 'XII SIJA 2']
        ]);
    }
}
