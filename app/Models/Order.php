<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Events\OrderStatusUpdated;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor', 'tanggal', 'nama', 'jabatan', 'alamat', 'rincian_barang', 'kuantitas',
        'harga_satuan', 'ongkos_kirim', 'total', 'untuk_atas_nama', 'nip', 'statuses_id'
    ];
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function updateStatus($status_id)
    {
        // Update status_id dan simpan perubahan
        $this->status_id = $status_id;
        $this->save();

        // Memicu event OrderStatusUpdated
        event(new OrderStatusUpdated($this));
    }
    protected $dispatchesEvents = [
        'updated' => OrderStatusUpdated::class,
    ];

}
