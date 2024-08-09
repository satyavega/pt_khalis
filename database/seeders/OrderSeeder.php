<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusIds = DB::table('statuses')->pluck('id')->toArray();
        $adminIds = DB::table('users')->where('role', 'admin')->pluck('id')->toArray();

        if (empty($statusIds)) {
            Log::error('No statuses found. Please seed statuses first.');
            return;
        }

        if (empty($adminIds)) {
            Log::error('No admins found. Please seed users with admin role first.');
            return;
        }

        $orders = [
            [
                'nomor' => 'ORD001',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'John Doe',
                'jabatan' => 'Manager',
                'alamat' => '123 Street, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product A, Product B',
                'kuantitas' => 10,
                'harga_satuan' => 150000.00,
                'ongkos_kirim' => 5000.00,
                'total' => 1500000.00,
                'untuk_atas_nama' => 'John Doe',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),
            ],
            [
                'nomor' => 'ORD002',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Jane Smith',
                'jabatan' => 'Supervisor',
                'alamat' => '456 Avenue, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product C',
                'kuantitas' => 5,
                'harga_satuan' => 200000.00,
                'ongkos_kirim' => 10000.00,
                'total' => 1000000.00,
                'untuk_atas_nama' => 'Jane Smith',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(10)->format('Y-m-d H:i:s'),
            ],
            [
                'nomor' => 'ORD003',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Alice Johnson',
                'jabatan' => 'Director',
                'alamat' => '789 Road, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product X',
                'kuantitas' => 20,
                'harga_satuan' => 250000.00,
                'ongkos_kirim' => 10000.00,
                'total' => 5000000.00,
                'untuk_atas_nama' => 'Alice Johnson',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD004',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Bob Brown',
                'jabatan' => 'Coordinator',
                'alamat' => '101 Main St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product B',
                'kuantitas' => 15,
                'harga_satuan' => 150000.00,
                'ongkos_kirim' => 7500.00,
                'total' => 2275000.00,
                'untuk_atas_nama' => 'Bob Brown',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD005',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Charlie White',
                'jabatan' => 'Assistant',
                'alamat' => '202 Side St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product D',
                'kuantitas' => 8,
                'harga_satuan' => 180000.00,
                'ongkos_kirim' => 8000.00,
                'total' => 1480000.00,
                'untuk_atas_nama' => 'Charlie White',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD006',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Diana Green',
                'jabatan' => 'Specialist',
                'alamat' => '303 Hill St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product E',
                'kuantitas' => 12,
                'harga_satuan' => 210000.00,
                'ongkos_kirim' => 12000.00,
                'total' => 2556000.00,
                'untuk_atas_nama' => 'Diana Green',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD007',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Evan Black',
                'jabatan' => 'Technician',
                'alamat' => '404 River St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product F',
                'kuantitas' => 7,
                'harga_satuan' => 160000.00,
                'ongkos_kirim' => 9000.00,
                'total' => 1129000.00,
                'untuk_atas_nama' => 'Evan Black',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD008',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Frank Blue',
                'jabatan' => 'Consultant',
                'alamat' => '505 Park St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product G',
                'kuantitas' => 9,
                'harga_satuan' => 220000.00,
                'ongkos_kirim' => 11000.00,
                'total' => 1990000.00,
                'untuk_atas_nama' => 'Frank Blue',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD009',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Grace Yellow',
                'jabatan' => 'Executive',
                'alamat' => '606 Lake St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product H',
                'kuantitas' => 6,
                'harga_satuan' => 240000.00,
                'ongkos_kirim' => 13000.00,
                'total' => 1463000.00,
                'untuk_atas_nama' => 'Grace Yellow',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
            [
                'nomor' => 'ORD010',
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Hank Red',
                'jabatan' => 'Director',
                'alamat' => '707 Mountain St, City, Country',
                'admin_id' => $adminIds[array_rand($adminIds)],
                'rincian_barang' => 'Product I',
                'kuantitas' => 11,
                'harga_satuan' => 260000.00,
                'ongkos_kirim' => 14000.00,
                'total' => 2880000.00,
                'untuk_atas_nama' => 'Hank Red',
                'nip' => Str::random(18),
                'status_id' => 1,
                'finish_date' => now()->addDays(7)->format('Y-m-d H:i:s'),

            ],
        ];
        Log::info('Inserting orders data: ', $orders);

        DB::table('orders')->insert($orders);

        Log::info('Orders data inserted successfully.');
    }
}
