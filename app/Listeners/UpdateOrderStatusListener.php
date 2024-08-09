<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdated;
use App\Models\Agreement;
use App\Models\Handover;
use App\Models\Invoice;
use App\Models\Bap;
use App\Models\Bast;
use App\Models\PaymentRequest;
use App\Models\OrderHistory;

class UpdateOrderStatusListener
{
    public function handle(OrderStatusUpdated $event)
    {
        $order = $event->order;

        switch ($order->status_id) {
            case 2: // Surat Jalan
                // Memindahkan data dari orders ke agreements
                Agreement::create($order->toArray());
                // Hapus data dari tabel orders
                $order->delete();
                break;

            case 3: // Penyerahan Pekerjaan
                // Mengambil data dari agreements yang sesuai
                $agreement = Agreement::where('nomor', $order->nomor)->first();
                if ($agreement) {
                    // Memindahkan data dari agreements ke handovers
                    Handover::create($agreement->toArray());
                    // Hapus data dari tabel agreements
                    $agreement->delete();
                }
                break;

            case 4: // Faktur
                // Mengambil data dari handovers yang sesuai
                $handover = Handover::where('nomor', $order->nomor)->first();
                if ($handover) {
                    // Memindahkan data dari handovers ke invoices
                    Invoice::create($handover->toArray());
                    // Hapus data dari tabel handovers
                    $handover->delete();
                }
                break;

            case 5: // BAP
                // Mengambil data dari invoices yang sesuai
                $invoice = Invoice::where('nomor', $order->nomor)->first();
                if ($invoice) {
                    // Memindahkan data dari invoices ke baps
                    Bap::create($invoice->toArray());
                    // Hapus data dari tabel invoices
                    $invoice->delete();
                }
                break;

            case 6: // BAST
                // Mengambil data dari baps yang sesuai
                $bap = Bap::where('nomor', $order->nomor)->first();
                if ($bap) {
                    // Memindahkan data dari baps ke bast
                    Bast::create($bap->toArray());
                    // Hapus data dari tabel baps
                    $bap->delete();
                }
                break;

            case 7: // Permohonan Pembayaran
                // Mengambil data dari bast yang sesuai
                $bast = Bast::where('nomor', $order->nomor)->first();
                if ($bast) {
                    // Memindahkan data dari bast ke payment_requests
                    PaymentRequest::create($bast->toArray());
                    // Hapus data dari tabel bast
                    $bast->delete();
                }
                break;

            case 10: // Selesai
                // Mengambil data dari payment_requests yang sesuai
                $paymentRequest = PaymentRequest::where('nomor', $order->nomor)->first();
                if ($paymentRequest) {
                    // Memindahkan data dari payment_requests ke order_history
                    OrderHistory::create($paymentRequest->toArray());
                    // Hapus data dari tabel payment_requests
                    $paymentRequest->delete();
                }
                break;
        }
    }
}

