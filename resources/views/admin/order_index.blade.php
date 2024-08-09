@extends('admin.template.main')

@section('css')
    <link href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat Transaksi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Order Detail</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <a class="text-dark" href="{{ route('admin.orders.index', ['sort_field' => 'id', 'sort_order' => ($sortField == 'id' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}">
                                                No
                                                @if ($sortField == 'id')
                                                    @if ($sortOrder == 'asc')
                                                        <i class="fas fa-arrow-up"></i>
                                                    @else
                                                        <i class="fas fa-arrow-down"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a class="text-dark" href="{{ route('admin.orders.index', ['sort_field' => 'nama', 'sort_order' => ($sortField == 'nama' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}">
                                                Nama Penerima
                                                @if ($sortField == 'nama')
                                                    @if ($sortOrder == 'asc')
                                                        <i class="fas fa-arrow-up"></i>
                                                    @else
                                                        <i class="fas fa-arrow-down"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>Rincian Barang</th>
                                        <th>Kuantitas</th>
                                        <th>Harga Satuan (Rp)</th>
                                        <th>Ongkos Kirim (Rp)</th>
                                        <th>
                                            <a class="text-dark" href="{{ route('admin.orders.index', ['sort_field' => 'total', 'sort_order' => ($sortField == 'total' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}">
                                                Total (Rp)
                                                @if ($sortField == 'total')
                                                    @if ($sortOrder == 'asc')
                                                        <i class="fas fa-arrow-up"></i>
                                                    @else
                                                        <i class="fas fa-arrow-down"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->nama }}</td>
                                            <td>{{ $order->rincian_barang }}</td>
                                            <td>{{ $order->kuantitas }}</td>
                                            <td>{{ number_format($order->harga_satuan, 2) }}</td>
                                            <td>{{ number_format($order->ongkos_kirim, 2) }}</td>
                                            <td>{{ number_format($order->total, 2) }}</td>
                                            <td>
                                                <a href="{{ route('admin.orders.print.index', ['order' => $order->id]) }}" class="badge badge-primary" target="_blank">Cetak</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->appends(['sort_field' => $sortField, 'sort_order' => $sortOrder])->links() }}
                            {{ $orders->links() }}
                        </div>
                    </div>
                    {{-- <nav class="d-flex justify-content-end " aria-label="...">
                        <ul class="pagination">
                            <!-- Tombol Previous -->
                            @if ($orders->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link" tabindex="-1" aria-disabled="true">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $orders->previousPageUrl() }}" tabindex="-1">Previous</a>
                                </li>
                            @endif

                            <!-- Tombol Halaman -->
                            @for ($page = 1; $page <= $totalPages; $page++)
                                <li class="page-item{{ $orders->currentPage() == $page ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $orders->url($page) }}">{{ $page }}</a>
                                </li>
                            @endfor

                            <!-- Tombol Next -->
                            @if ($orders->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $orders->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
