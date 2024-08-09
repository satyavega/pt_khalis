<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Surat Pesanan
                        <i class="fas fa-angle-right right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>&nbsp;&nbsp;Input Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>&nbsp;&nbsp;Riwayat</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        @foreach ($orders as $item)
                        <a href="{{ route('admin.orders.print.index', ['order' => $item->id]) }}" class="nav-link" target="_blank">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>&nbsp;&nbsp;Laporan</p>
                        @endforeach
                        <a href="{{ route('admin.pdf') }}" class="btn btn-primary">Generate PDF</a>

                        </a>
                    </li> --}}

                </ul>
            </li>
            {{-- kesepakatan harga --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Kesepakatan Harga
                        <i class="fas fa-angle-right right"></i> <!-- Mengubah arah ikon dropdown ke kanan -->
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.agreements.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>&nbsp;&nbsp;Input</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.agreements.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>&nbsp;&nbsp;Riwayat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.agreements.pdf') }}" class="nav-link" target="_blank">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>&nbsp;&nbsp;Laporan</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- penyerahan pekerjaan --}}
            {{-- <li class="nav-item">
                <a href="{{ route('admin.handovers.index') }}" class="nav-link {{ request()->routeIs('admin.handovers.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Penyerahan Pekerjaan</p>
                </a>
            </li> --}}
            {{-- faktur --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Faktur Penjualan
                        <i class="fas fa-angle-right right"></i> <!-- Mengubah arah ikon dropdown ke kanan -->
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.invoices.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>&nbsp;&nbsp;Input Faktur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.invoices.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>&nbsp;&nbsp;Riwayat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.invoices.pdf') }}" class="nav-link" target="_blank">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>&nbsp;&nbsp;Laporan Faktur</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- Bap --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        BAP
                        <i class="fas fa-angle-right right"></i> <!-- Mengubah arah ikon dropdown ke kanan -->
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.bap.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>&nbsp;&nbsp;Input</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bap.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>&nbsp;&nbsp;Riwayat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bap.pdf') }}" class="nav-link" target="_blank">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>&nbsp;&nbsp;Laporan</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- BAST --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        BAST
                        <i class="fas fa-angle-right right"></i> <!-- Mengubah arah ikon dropdown ke kanan -->
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.bast.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>&nbsp;&nbsp;Input</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bast.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>&nbsp;&nbsp;Riwayat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bast.pdf') }}" class="nav-link" target="_blank">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>&nbsp;&nbsp;Laporan</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- Permohonan bayar --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        Permohonan Bayar
                        <i class="fas fa-angle-right right"></i> <!-- Mengubah arah ikon dropdown ke kanan -->
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.payment-requests.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>&nbsp;&nbsp;Input</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.payment-requests.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>&nbsp;&nbsp;Riwayat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.payment-requests.pdf') }}" class="nav-link" target="_blank">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>&nbsp;&nbsp;Laporan</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
