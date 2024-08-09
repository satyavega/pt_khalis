<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            ['id' => 1, 'name' => 'Pesanan Diterima'],
            ['id' => 2, 'name' => 'Surat Jalan'],
            ['id' => 3, 'name' => 'Penyerahan Pekerjaan'],
            ['id' => 4, 'name' => 'Faktur'],
            ['id' => 5, 'name' => 'BAP'],
            ['id' => 6, 'name' => 'BAST'],
            ['id' => 7, 'name' => 'Permohonan Pembayaran'],
            ['id' => 8, 'name' => 'Surat PP'],
            ['id' => 9, 'name' => 'Kwitansi'],
            ['id' => 10, 'name' => 'Selesai'],
        ];

        DB::table('statuses')->insert($statuses);
    }
}
