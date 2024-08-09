<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use PDF;
use App\Helpers\Terbilang;

class PrintOrderController extends Controller
{
    /**
     * Print order
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Order $order)
    {
        // Ambil order berdasarkan ID yang diberikan
        $total = $order->total;
        $order = Order::findOrFail($order->id);
        $nomor = $order->nomor;
        $date = (new \DateTime($order->tanggal))->format('d-m-Y');
        $totalName = Terbilang::toTerbilang($total) . " Rupiah";

        // Load view untuk PDF dengan data order
        $pdf = PDF::loadView('admin.order_pdf', [
            'order' => $order,
            'totalName' => $totalName,
            'nomor' => $nomor,
            'date' => $date,
        ]);
        // Return PDF
        return $pdf->stream('order_' . $order->id . '.pdf');
    }
    public function showOrder($orderId)
{
    $order = Order::find($orderId);
    $total = $order->total;
    $totalName = Terbilang::toTerbilang($total) . " Rupiah";

    return view('order.show', compact('order', 'totalName'));
}
}
