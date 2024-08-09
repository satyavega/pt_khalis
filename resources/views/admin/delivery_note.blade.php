<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 20px;
            padding: 15px;
        }
        .header-image {
            width: 100%;
        }
        .signature-space {
            height: 50px;
        }
        .text-center {
            text-align: center;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        .mt-4 {
            margin-top: 1.5rem;
        }
        .border {
            border: 1px solid #000;
        }
        .container {
            width: 100%;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #000;
        }
        .borderless-table td, .borderless-table th {
            border: none;
        }
        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
    </style>
</head>
<body>
    <header class="text-center">
        <div class="row">
            <img src="assets/img/kopSurat.png" class="header-image">
            <div class="d-flex mt-3 justify-content-center">
                <h6 class="text-center">SURAT JALAN</h6>
            </div>
        </div>
    </header>
    <hr>
    <div class="container-fluid">
            <table class="table table-borderless full-width-table">
                <tbody>
                    <tr>
                        <td><strong>Tanggal:</strong></td>
                        <td>23 Juli 2024</td>
                        <td><strong>Tujuan:</strong></td>
                        <td>Bandung Bandung</td>
                    </tr>
                    <tr>
                        <td><strong>No. Surat:</strong></td>
                        <td>001/ABC/2024</td>
                    </tr>

                    <tr>
                        <td><strong>Kendaraan/Nopol:</strong></td>
                        <td>H 333 BJ</td>
                    </tr>
                </tbody>
            </table>
            <p>Dikirimkan barang-barang sebagai berikut:</p>
            <table class="table table-bordered full-width-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ $item['keterangan'] }}</td>
                    </tr>
                    @endforeach --}}
                    <tr>
                        <td>1</td>
                        <td>Laptop</td>
                        <td>2</td>
                        <td>Barang Bekas</td>
                    </tr>

                </tbody>
            </table>
            <div class="container">
                <table class="table borderless-table full-width-table justify-content-beetween">
                    <thead>
                        <tr>
                            <th scope="row" class="text-center">Gudang</th>
                            <th scope="row" class="text-center">Kurir</th>
                            <th scope="row" class="text-center"> </th>
                            <th scope="row" class="text-center"> </th>
                            <th scope="row" class="text-center"> </th>
                            <th scope="row" class="text-center">Diterima Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="mt-3">
                            <td class="text-center">
                                <div class="signature-space"></div>
                                <br><br>
                                <p>________________</p>
                            </td>
                            <td class="text-center">
                                <div class="signature-space"></div>
                                <br><br>
                                <p>___________________</p>
                            </td>
                            <td class="text-center">
                                <div class="signature-space"></div>
                                <p></p>
                            </td>
                            <td class="text-center">
                                <div class="signature-space"></div>
                                <p></p>
                            </td>
                            <td class="text-center">
                                <div class="signature-space"></div>
                                <p></p>
                            </td>
                            <td class="text-center">
                                <div class="signature-space"></div>
                                <br><br>
                                <p>________________</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center"></td> <!-- Baris kosong di tengah -->
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
