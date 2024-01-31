<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasis')->insert([
            ['nama_lokasi' => 'Lab SIJA 1'],
            ['nama_lokasi' => 'Lab SIJA 2'],
            ['nama_lokasi' => 'Ruang Server'],
        ]);
    }
}
