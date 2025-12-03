<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variabel Warna */
        :root {
            --primary-blue: #3b5998;
            --secondary-green: #1cc88a;
            --light-bg: #eef1f6;
            --card-header: #4e73df; /* Biru Primer yang Cerah */
        }
        
        /* === Background Body === */
        body {
            background: var(--light-bg); 
            min-height: 100vh;
            padding-top: 70px; /* Ruang untuk Navbar fixed/sticky */
            padding-bottom: 50px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* === Navbar Kustom === */
        .navbar-custom {
            background-color: var(--primary-blue);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand-custom {
            color: white !important;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8) !important;
            margin: 0 10px;
            font-weight: 500;
            transition: color 0.3s, border-bottom 0.3s;
        }
        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: white !important;
            border-bottom: 2px solid var(--secondary-green);
        }

        /* Tombol Logout di Navbar */
        .btn-logout-custom {
            background-color: #f7786b; 
            border-color: #f7786b;
            color: white;
            transition: all 0.3s;
        }
        .btn-logout-custom:hover {
            background-color: #e55c4e;
            border-color: #e55c4e;
            color: white;
        }

        /* === Card Utama === */
        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* === Header Card Kustom === */
        .card-header-custom {
            background-color: var(--card-header); 
            color: white;
            padding: 1.5rem;
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
        }
        
        /* === Tabel Style === */
        .table thead th {
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: white; 
            background-color: var(--primary-blue);
            border-bottom: 2px solid var(--primary-blue);
            font-size: 0.9rem;
        }
        
        .table td { vertical-align: middle; font-size: 0.9rem; }
        .table tbody tr:hover { background-color: #f7f9fc; }
        
        /* Tombol Transaksi */
        .btn-add-pinjam {
            background-color: var(--secondary-green);
            border-color: var(--secondary-green);
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(28, 200, 138, 0.3);
        }

        /* Tombol Aksi */
        .btn-return {
            background-color: #1aae7d; /* Warna Hijau Gelap untuk Kembali */
            border-color: #1aae7d;
            color: white;
        }
        .btn-danger {
             /* Menjaga konsistensi warna merah Bootstrap */
             font-weight: 600;
        }

        /* Status Badge */
        .badge-pinjam { background-color: #ffc107; color: #343a40; font-weight: 600; }
        .badge-kembali { background-color: var(--secondary-green); color: white; font-weight: 600; }


        /* === Responsive Data Card (Untuk tampilan mobile) === */
        @media (max-width: 767.98px) {
             .table thead { display: none; }
             .table, .table tbody, .table tr, .table td { display: block; width: 100%; }
             .table tr { margin-bottom: 15px; border: 1px solid #dee2e6; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); }
             .table td { text-align: right !important; padding-left: 50% !important; position: relative; border: none; }
             .table td::before {
                content: attr(data-label); position: absolute; left: 10px; width: 45%; padding-right: 10px;
                white-space: nowrap; font-weight: 700; text-align: left; color: #495057;
            }
            /* Styling khusus untuk kolom Aksi di mobile */
            .table td:last-child { 
                text-align: center !important; padding-left: 10px !important; border-top: 1px solid #eee;
                display: flex; justify-content: center; gap: 5px; 
            }
            .table td:nth-last-child(2) { /* Status */
                text-align: center !important; 
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid container">
        <a class="navbar-brand navbar-brand-custom" href="{{ url('/') }}">
            <i class="fas fa-graduation-cap me-2"></i> Perpustakaan Kampus
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color: white;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ url('/') }}"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ url('buku') }}"><i class="fas fa-book-open me-1"></i> Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ url('anggota') }}"><i class="fas fa-users me-1"></i> Daftar Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" aria-current="page" href="#"><i class="fas fa-exchange-alt me-1"></i> pinjam</a>
                </li>
            </ul>
            <a class="btn btn-logout-custom px-3 py-1" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <div class="card shadow-lg rounded-4">
        <div class="card-header-custom text-center">
            <h3 class="mb-0 fw-bold">🔁 Data Transaksi Peminjaman</h3>
        </div>

        <div class="card-body p-4 p-md-5">

            <div class="d-flex justify-content-end mb-4">
                <a href="{{ url('pinjam/add') }}" class="btn btn-add-pinjam px-4 py-2 shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Peminjaman
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-sm align-middle">
                    <thead class="text-center">
                        <tr>
                            <th width="5%">ID</th>
                            <th>Anggota (ID)</th>
                            <th>Buku (ID)</th>
                            <th width="15%">Tgl Pinjam</th>
                            <th width="15%">Tgl Kembali</th>
                            <th width="10%">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($query as $row)
                        <tr>
                            <td data-label="ID Pinjam" class="fw-bold text-center">{{ $row->ID_Pinjam }}</td>
                            <td data-label="ID Anggota">{{ $row->ID_Anggota }}</td>
                            <td data-label="ID Buku">{{ $row->ID_Buku }}</td>
                            <td data-label="Tgl Pinjam" class="text-center">{{ $row->tgl_pinjam }}</td>
                            <td data-label="Tgl Kembali" class="text-center">
                                {{ $row->tgl_kembali ?? '-' }}
                            </td>
                            <td data-label="Status" class="text-center">
                                @if($row->tgl_kembali)
                                    <span class="badge badge-kembali">Dikembalikan</span>
                                @else
                                    <span class="badge badge-pinjam">Dipinjam</span>
                                @endif
                            </td>
                            <td data-label="Aksi" class="text-center">
                                
                                {{-- Jika belum dikembalikan, tampilkan tombol kembali/edit --}}
                                @if(!$row->tgl_kembali)
                                    <a href="{{ url('pinjam/kembali/'.$row->ID_Pinjam) }}" class="btn btn-return btn-sm me-2" title="Proses Pengembalian">
                                        <i class="fas fa-check"></i> Kembali
                                    </a>
                                @else
                                    <a href="{{ url('pinjam/edit/'.$row->ID_Pinjam) }}" class="btn btn-warning btn-sm me-2" title="Edit Data">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                @endif

                                <form action="{{ url('pinjam/delete/'.$row->ID_Pinjam) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data transaksi ID {{ $row->ID_Pinjam }}?')" 
                                            class="btn btn-danger btn-sm" title="Hapus Transaksi">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-clipboard-list fa-2x d-block mb-2"></i>
                                <span class="d-block">Tidak ada data transaksi peminjaman saat ini.</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $query->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>