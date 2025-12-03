<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variabel Warna */
        :root {
            --primary-blue: #3b5998;
            --secondary-green: #1cc88a;
            --light-bg: #eef1f6;
            --card-header: #4e73df;
        }
        
        /* === Background Body - Lebih Soft === */
        body {
            background: var(--light-bg); 
            min-height: 100vh;
            padding-top: 70px; 
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

        /* === Card Utama - Lebih Flat === */
        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
        }
        .card:hover {
            transform: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
        }

        /* === Header Card Kustom (Dipertahankan) === */
        .card-header-custom {
            background-color: var(--card-header); 
            color: white;
            padding: 1.5rem;
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
        }
        
        /* === Tabel Style (Dipertahankan) === */
        .table thead th {
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--primary-blue); 
            border-bottom: 2px solid var(--primary-blue);
        }
        
        .table tbody tr:hover {
            background-color: #f7f9fc;
        }
        
        /* Warna Tombol Aksi */
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #343a40;
            font-weight: 600;
        }
        .btn-success {
            background-color: var(--secondary-green);
            border-color: var(--secondary-green);
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(28, 200, 138, 0.3);
        }

        /* === Responsive Data Card (Dipertahankan) === */
        @media (max-width: 767.98px) {
            .table thead { display: none; }
            .table, .table tbody, .table tr, .table td { display: block; width: 100%; }
            .table tr { margin-bottom: 15px; border: 1px solid #dee2e6; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); }
            .table td { text-align: right !important; padding-left: 50% !important; position: relative; border: none; }
            .table td::before {
                content: attr(data-label); position: absolute; left: 10px; width: 45%; padding-right: 10px;
                white-space: nowrap; font-weight: 700; text-align: left; color: #495057;
            }
            .table td:last-child { text-align: center !important; padding-left: 10px !important; border-top: 1px solid #eee; }
        }
        
        /* === Pagination Elegan Kustom (Dipertahankan) === */
        .pagination { justify-content: center; }
        .page-link { padding: 0.6rem 1rem; margin: 0 3px; border-radius: 0.5rem !important; border: 1px solid #dcdcdc; }
        .page-item.active .page-link {
            background: var(--secondary-green) !important; 
            border-color: var(--secondary-green) !important;
            color: #fff !important;
            box-shadow: 0 4px 8px rgba(28, 200, 138, 0.4);
        }
        .page-link:hover {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }
        .pagination-info { text-align: center; margin-top: 15px; color: #6c757d; font-size: 0.9rem; }

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
                    <a class="nav-link nav-link-custom active" aria-current="page" href="#"><i class="fas fa-users me-1"></i> Daftar Anggota</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ url('buku') }}"><i class="fas fa-book-open me-1"></i> Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ url('pinjam') }}"><i class="fas fa-exchange-alt me-1"></i> Transaksi</a>
                </li>
            </ul>
            <a class="btn btn-logout-custom px-3 py-1" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card shadow-lg rounded-4">
        <div class="card-header-custom text-center">
            <h3 class="mb-0 fw-bold">🎓 Daftar Anggota Kampus</h3>
        </div>

        <div class="card-body p-4 p-md-5">

            <div class="d-flex justify-content-end mb-4">
                <a href="{{ url('anggota/add') }}" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                    <i class="fas fa-user-plus me-2"></i> Tambah Anggota
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm align-middle">
                    <thead class="text-center">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="15%">NIM</th>
                            <th width="40%" class="text-start">Nama Lengkap</th>
                            <th width="15%">Progdi</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($query as $row)
                            <tr>
                                <td data-label="ID" class="fw-bold text-center">{{ $row->ID_Anggota }}</td>
                                <td data-label="NIM" class="fw-bold text-center">{{ $row->nim }}</td>
                                <td data-label="Nama Lengkap" class="text-start">{{ $row->nama }}</td>
                                <td data-label="Program Studi" class="text-center">{{ $row->progdi }}</td>
                                <td data-label="Aksi" class="text-center">
                                    <a href="{{ url('anggota/edit/'.$row->ID_Anggota) }}" 
                                        class="btn btn-warning btn-sm me-2" title="Edit Data">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <a href="{{ url('anggota/delete/'.$row->ID_Anggota) }}"
                                        onclick="return confirm('Yakin ingin menghapus data {{ $row->nama }}? Tindakan ini tidak dapat dibatalkan.')"
                                        class="btn btn-danger btn-sm" title="Hapus Data">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-database fa-2x d-block mb-2"></i>
                                    <span class="d-block">Belum ada data anggota yang terdaftar.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($query->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $query->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($query->getUrlRange(1, $query->lastPage()) as $page => $url)
                        @if ($page == $query->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($query->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $query->nextPageUrl() }}" rel="next">Next &raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true">Next &raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
            
            <div class="pagination-info">
                Showing {{ $query->firstItem() }} to {{ $query->lastItem() }} of {{ $query->total() }} results
            </div>

        </div> 
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>