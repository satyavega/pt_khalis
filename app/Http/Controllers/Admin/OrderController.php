<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Agreement;
use App\Models\Handover;
use App\Models\Invoice;
use App\Models\Bap;
use App\Models\Bast;
use App\Models\PaymentRequest;
use App\Models\RequestLetter;
use App\Models\Reciept;
use App\Models\OrderHistory;
use App\Models\Status;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Terbilang;


class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Mengambil parameter pengurutan dari request
        $sortField = $request->get('sort_field', 'id'); // Default sorting field
        $sortOrder = $request->get('sort_order', 'asc'); // Default sorting order

        // Validasi kolom yang bisa diurutkan
        $validSortFields = ['id', 'nama', 'total'];
        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'id';
        }

        // Validasi urutan yang valid
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        // Query dengan pengurutan
        $orders = Order::orderBy($sortField, $sortOrder)->paginate(10);

        return view('admin.order_index', compact('orders', 'user', 'sortField', 'sortOrder'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();
        $orders = Order::all();
        $statuses = Status::all();
        // Jika Anda memiliki tampilan untuk membuat order, kembalikan tampilan tersebut
        return view('admin.order_input', compact('user','orders','statuses'));
    }

    /**
     * Store a newly created order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
{
    // Validasi input, tanpa status_id jika tidak diatur oleh pengguna
    $validatedData = $request->validate([
        'nomor' => 'required|unique:orders',
        'tanggal' => 'required|date',
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'alamat' => 'required|string',
        'rincian_barang' => 'required|string',
        'kuantitas' => 'required|integer',
        'harga_satuan' => 'required|numeric',
        'ongkos_kirim' => 'nullable|numeric',
        'total' => 'required|numeric',
        'untuk_atas_nama' => 'required|string|max:255',
        'nip' => 'required|string|max:255',
    ]);

    // Mendapatkan ID pengguna yang sedang login
    $user = Auth::user();

    // Membuat order baru dengan data yang sudah tervalidasi
    $order = Order::create([
        'nomor' => $validatedData['nomor'],
        'tanggal' => $validatedData['tanggal'],
        'nama' => $validatedData['nama'],
        'jabatan' => $validatedData['jabatan'],
        'alamat' => $validatedData['alamat'],
        'admin_id' => $user->id, // Menggunakan ID pengguna yang sedang login
        'rincian_barang' => $validatedData['rincian_barang'],
        'kuantitas' => $validatedData['kuantitas'],
        'harga_satuan' => $validatedData['harga_satuan'],
        'ongkos_kirim' => $validatedData['ongkos_kirim'],
        'total' => $validatedData['total'],
        'untuk_atas_nama' => $validatedData['untuk_atas_nama'],
        'nip' => $validatedData['nip'],
        'status_id' => 1 // Menetapkan status default
    ]);

    // Mengembalikan respons JSON dengan data order yang baru dibuat
    return redirect()->route('admin.index')->with('success', 'Order berhasil dibuat.');
}



    /**
     * Display the specified order.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }

    /**
     * Update the specified order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'nomor' => 'required|unique:orders,nomor,' . $order->id,
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'rincian_barang' => 'required|string',
            'uraian' => 'required|string',
            'kuantitas' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'ongkos_kirim' => 'nullable|numeric',
            'total' => 'required|numeric',
            'untuk_atas_nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
        ]);

        $admin = User::where('role', 'admin')->first();
        $order->update([
            'nomor' => $request->nomor,
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'admin_id' => $admin->id,
            'rincian_barang' => $request->rincian_barang,
            'uraian' => $request->uraian,
            'kuantitas' => $request->kuantitas,
            'harga_satuan' => $request->harga_satuan,
            'ongkos_kirim' => $request->ongkos_kirim,
            'total' => $request->total,
            'untuk_atas_nama' => $request->untuk_atas_nama,
            'nip' => $request->nip,
        ]);

        return response()->json($order);
    }

    /**
     * Remove the specified order from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }

    /**
     * Generate PDF report of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf(Order $order)
    {
        $total = $order->total;
        $orders = Order::all();
        $pdf = PDF::loadView('admin.order_pdf', compact('orders'));

        return $pdf->stream('order.pdf');


    }
    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status_id = $request->status_id;
        $order->save();

        switch ($request->status_id) {
            case 2:
                // Pindahkan data ke tabel agreements
                Agreement::create($order->toArray());
                break;
            case 3:
                // Pindahkan data ke tabel handovers
                Handover::create($order->toArray());
                break;
            case 4:
                // Pindahkan data ke tabel invoices
                Invoice::create($order->toArray());
                break;
            case 5:
                // Pindahkan data ke tabel baps
                Bap::create($order->toArray());
                break;
            case 6:
                // Pindahkan data ke tabel basts
                Bast::create($order->toArray());
                break;
            case 7:
                // Pindahkan data ke tabel payment_requests
                PaymentRequest::create($order->toArray());
                break;
            case 8:
                RequestLetter::create($order->toArray());
                break;
            case 9:
                Reciept::create($order->toArray());
                break;
            case 10:
                // Pindahkan data ke tabel order_histories
                OrderHistory::create($order->toArray());
                break;
        }

        return response()->json(['success' => true]);
    }
    public function showOrder($orderId)
{
    $order = Order::find($orderId);
    $total = $order->total;
    $totalName = Terbilang::toTerbilang($total) . " Rupiah";

    return view('order.show', compact('order', 'totalName'));
}
}


