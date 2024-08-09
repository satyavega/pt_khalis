<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor',
        'tanggal',
        'nama',
        'jabatan',
        'alamat',
        'admin_id',
        'rincian_barang',
        'kuantitas',
        'harga_satuan',
        'ongkos_kirim',
        'total',
        'untuk_atas_nama',
        'nip',
        'status_id',
        'finish_date'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
