@extends('admin.template.main')

@section('css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Admin</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <p>Jumlah Member</p>

                            <h3>{{ $membersCount }}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        {{-- <a href="{{ route('admin.members.index') }}" class="small-box-footer">Lihat member <i
                                class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Jumlah Transaksi</p>

                            <h3>{{ $ordersCount }}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('admin.orders.index') }}" class="small-box-footer">Lihat transaksi <i
                                class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Transaksi Berjalan: </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersPesananDiterima as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Surat Jalan: </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersSuratJalan as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>
                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Penyerahan Pekerjaan: </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersPenyerahanPekerjaan as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Faktur </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersFaktur as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Berita Acara Penyerahan </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersBap as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Berita Acara Serah Terima </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersBast as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Permohonan Pembayaran </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersPermohonanPembayaran as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Surat Permohonan Pembayaran </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersSuratPP as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Kwitansi </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersKwitansi as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Selesai </h3>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersSelesai as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper(substr($order->nomor, 0, 6)) }}</td>
                                            <td>{{ $order->untuk_atas_nama }}</td>

                                            <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if ($order->status_id == 10)
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <select name="status" data-id="{{ $order->id }}" class="select-status">
                                                        @foreach ($status as $s)
                                                            <option value="{{ $s->id }}" {{ $order->status_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).on('change', '.select-status', function() {
    var order_id = $(this).data('id');
    var status_id = $(this).val();

    $.ajax({
        url: '{{ route('admin.updateOrderStatus') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            order_id: order_id,
            status_id: status_id
        },
        success: function(response) {
            if (response.success) {
                location.reload();
            }
        },
        error: function(response) {
            alert('Berhasil.');
            location.reload();
        }
    });
});
</script>
