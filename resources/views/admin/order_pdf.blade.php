<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
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
            height: 100px;
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
        .table-borderless th, .table-borderless td {
            border: none !important;
        }
        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
        .table th {
            vertical-align: middle; /* Vertically center the text */
        }
        .text-center {
            text-align: center;
        }
        .header-title {
            text-align: center;
            font-weight: bold;
        }
        .signature-section {
            margin-top: 50px;
            justify-content: space-between;
            display: flex;
            flex: 0 0 40%; /* Kolom sekitar 48% dari lebar kontainer */
            margin: 0 1%;
        }
        .signature-line {
            margin-top: 60px;
            text-align: center;
        }
        hr {
            border-top: 1px solid #000;
            margin: 0;
        }
        .section-title {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body class="ml-0">
    <header class="text-center">
        <div class="row">
            <img src="assets/img/kopSurat.png" class="header-image">
            <div class="d-flex mt-3 justify-content-center">
            </div>
        </div>
    </header>
<div class="container mt-4">
    <div class="row">
        <div class="col-12 header-title">
            <h4>SURAT PESANAN</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">
                <tr>
                    <td rowspan="2" style="vertical-align: middle;">SURAT PESANAN (SP)</td>
                    <td>SATUAN KERJA PEJABAT PENANDATANGAN/PENGESAHAN<br>TANDA BUKTI PERJANJIAN : UPTD PUSKESMAS TEGALBULEUD</td>
                </tr>
                <tr>
                    <td>
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td>NOMOR : {{ $nomor }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>TANGGAL : {{ $date }}</td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>Yang bertanda tangan di bawah ini:</p>
            <table class="table table-borderless">
                <tr>
                    <td>Nama</td>
                    <td>: Pejabat Pembuat Komitmen</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: Pejabat Pembuat Komitmen</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: Jl. Raya Siliwangi No. 10 Desa Buniasih Kecamatan Tegalbuleud</td>
                </tr>
            </table>
            <p>Selanjutnya disebut sebagai Pejabat Penandatangan/Pengesahan Tanda Bukti Perjanjian;</p>
            <table class="table table-borderless">
                <tr>
                    <td>Nama</td>
                    <td>: Ilham Madya Tresna Diharja, ST., S.Pd</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: Jalan Cagak Cibaraija Rt. 034/006 No. 16 Desa Nagrak Kecamatan Cisaat</td>
                </tr>
            </table>
            <p>Sebagai Distributor/Pelaksana Pekerjaan dari Penyedia PT. Khalish Brilliant Persada untuk mengirimkan barang dengan memperhatikan ketentuan-ketentuan sebagai berikut : </p>
            <hr>
            <p class="section-title">Rincian Barang</p>
            <hr>
            <table class="table table-bordered full-width-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Kuantitas</th>
                        <th class="text-center">Harga <br> Satuan (Rp.)</th>
                        <th class="text-center">Ongkos <br> Kirim <br> (Rp.)</th>
                        <th class="text-center">Total (Rp.)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td> <!-- Hanya ada satu order -->
                        <td>{{ $order->nama }}</td>
                        <td>{{ $order->kuantitas }}</td>
                        <td>{{ number_format($order->harga_satuan, 2) }}</td>
                        <td>{{ number_format($order->ongkos_kirim, 2) }}</td>
                        <td>{{ number_format($order->total, 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4" class="text-end">Jumlah Total Berikut (PPN+PPh) </td>
                        <td>{{ number_format($order->total, 2) }}</td>
                    </tr>
            </table>
            <p>TERBILANG: == {{ $totalName }} ==</p>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table table-borderless full-width-table justify-content-beetween mt-5">
            <thead>
                <tr>
                    <th scope="row" class="text-center">Untuk dan atas Nama</th>

                    <th scope="row" class="text-center">Penyedia Barang/Jasa</th>
                </tr>
            </thead>
            <tbody>
                <tr class="mt-3">
                    <td class="text-center">
                        <p class="text-center">UPTD Puskesmas Tegalbuleud<br>Pejabat Pembuat Komitmen</p>
                        <div class="signature-space"></div>
                    </td>
                    <td class="text-center">
                        <p class="text-center">PT. Khalish Brilliant Persada</p>
                        <div class="signature-space"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="text-center signature-line">Gugum Ahmad Suandana, Amk., SKM<br>NIP. 19810512 200801 1 001</p>
                    </td>
                    <td>
                        <p class="text-center signature-line">Ilham Madya Tresna Diharja, ST., S.Pd<br>Direktur Utama</p>
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
