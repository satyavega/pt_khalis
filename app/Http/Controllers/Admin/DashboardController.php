<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;

class DashboardController extends Controller
{
    /**
     * Function to show admin dashboard view
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $user = Auth::user();
        $orders = Order::all();
        $status = Status::all();

        $recentOrders = Order::whereNull('finish_date')
            ->with('status')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        $ordersPesananDiterima = Order::where('status_id', 1) // Status "Pesanan Diterima"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersSuratJalan = Order::where('status_id', 2) // Status "Surat Jalan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersPenyerahanPekerjaan = Order::where('status_id', 3) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersFaktur = Order::where('status_id', 4) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersBap = Order::where('status_id', 5) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersBast = Order::where('status_id', 6) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersPermohonanPembayaran = Order::where('status_id', 7) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersSuratPP = Order::where('status_id', 8) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersKwitansi = Order::where('status_id', 9) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $ordersSelesai = Order::where('status_id', 10) // Status "Penyerahan Pekerjaan"
            ->with('status')
            ->orderByDesc('created_at')
            ->get();

        $membersCount = User::where('role', Role::Member)->count();

        $ordersCount = Order::count();

        return view('admin.index', compact(
            'user',
            'orders',
            'status',
            'recentOrders',
            'membersCount',
            'ordersCount',
            'ordersPesananDiterima',
            'ordersSuratJalan',
            'ordersPenyerahanPekerjaan',
            'ordersFaktur',
            'ordersBap',
            'ordersBast',
            'ordersPermohonanPembayaran',
            'ordersSuratPP',
            'ordersKwitansi',
            'ordersSelesai',
        ));
    }
}
