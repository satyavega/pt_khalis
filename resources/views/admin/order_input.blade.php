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
                    <h1 class="m-0 text-dark">Input Surat Pesanan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('warning') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.orders.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="nomor" id="nomor" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Penerima</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nama" id="nama" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rincian_barang" class="col-sm-2 col-form-label">Rincian Barang</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="rincian_barang" id="rincian_barang" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kuantitas" class="col-sm-2 col-form-label">Kuantitas</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="number" id="kuantitas" name="kuantitas" class="form-control" value="1" min="1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan (Rp)</label>
                                    <div class="col-sm-4">
                                        <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" min="1" step="0.01" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ongkos_kirim" class="col-sm-2 col-form-label">Ongkos Kirim (Rp)</label>
                                    <div class="col-sm-4">
                                        <input type="number" id="ongkos_kirim" name="ongkos_kirim" class="form-control" min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total" class="col-sm-2 col-form-label">Total (Rp)</label>
                                    <div class="col-sm-4">
                                        <input type="number" id="total" name="total" class="form-control" min="0" step="0.01" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="untuk_atas_nama" class="col-sm-2 col-form-label">Untuk Atas Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="untuk_atas_nama" id="untuk_atas_nama" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nip" id="nip" class="form-control" required>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="status_id">Status</label>
                                    <select id="status_id" name="status_id" class="form-control">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-2">
                                        <button type="submit" id="add-order" class="btn btn-primary">Tambah Pesanan</button>
                                    </div>
                                </div>
                            </form>

                            {{-- <table id="tbl-input-order" class="table mt-2 dt-responsive nowrap" style="width: 100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Uraian</th>
                                        <th>Kuantitas</th>
                                        <th>Harga Satuan</th>
                                        <th>Ongkos Kirim</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($sessionOrder))
                                        @foreach ($sessionOrder as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order['description'] }}</td>
                                                <td>{{ $order['quantity'] }}</td>
                                                <td>{{ $order['unit_price'] }}</td>
                                                <td>{{ $order['shipping_cost'] }}</td>
                                                <td>{{ $order['total'] }}</td>
                                                <td>
                                                    <a href="{{ route('admin.transactions.session.destroy', ['rowId' => $order['rowId']]) }}"
                                                        class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table> --}}
                            @if (isset($sessionOrder))
                                <button id="btn-pay" class="btn btn-success" data-toggle="modal"
                                    data-target="#paymentModal">Bayar</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection

{{-- @section('modals')
    <x-admin.modals.payment-modal :$serviceTypes :vouchers="$vouchers ?? []" :totalPrice="$totalPrice ?? '0'" :show="isset($sessionOrder)" />
@endsection --}}

@section('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl-input-order').DataTable({
                "searching": false,
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false
            });
        });
    </script>

    @if (session('id_order'))
        <script type="text/javascript">
            window.open('{{ route('admin.transactions.print.index', ['order' => session('id_order')]) }}', '_blank');
        </script>
    @endif
@endsection
