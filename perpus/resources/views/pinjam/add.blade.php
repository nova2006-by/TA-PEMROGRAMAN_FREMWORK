<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pinjam Buku</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        /* Variabel Warna */
        :root {
            --primary-blue: #3b5998;
            --secondary-green: #1cc88a;
            --light-bg: #eef1f6;
            --card-header: #4e73df;
        }
        
        /* === Background Body === */
        body {
            background: var(--light-bg); 
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* === Card Styling === */
        .card {
            border: none;
            border-radius: 0.75rem; /* Lebih halus dari 0.5rem */
        }
        .card-header-custom {
            background-color: var(--card-header); 
            color: white;
            padding: 1.25rem 1.5rem;
            border-top-left-radius: 0.75rem !important;
            border-top-right-radius: 0.75rem !important;
        }
        
        /* === Alert Styling (Seragam) === */
        .alert-danger {
            border-left: 5px solid #dc3545;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.1);
        }

        /* === Form Elements === */
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }

        /* === Tombol Aksi === */
        .btn-success {
            background-color: var(--secondary-green);
            border-color: var(--secondary-green);
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-success:hover {
            background-color: #1aae7d;
            border-color: #1aae7d;
        }
        .btn-secondary {
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-dark-custom {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="col-md-7 col-lg-6 mx-auto">
        @if ($errors->any())
        <div class="alert alert-danger shadow-sm" role="alert">
            <h6 class="alert-heading mb-2 fw-bold"><i class="fas fa-exclamation-triangle me-2"></i> Validasi Error:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card shadow-lg">
            <div class="card-header-custom">
                <h4 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Form Transaksi Peminjaman</h4>
            </div>

            <div class="card-body p-4 p-md-5">

                <form method="POST" action="{{ url('pinjam/save') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Anggota</label>
                        <select name="ID_Anggota" class="form-select" required>
                            <option value="">- Pilih anggota -</option>
                            @foreach ($optanggota as $key => $value)
                                <option value="{{ $key }}" 
                                    {{ old('ID_Anggota') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Buku</label>
                        <select name="ID_Buku" class="form-select" required>
                            <option value="">- Pilih buku -</option>
                            @foreach ($optbuku as $key => $value)
                                <option value="{{ $key }}" 
                                    {{ old('ID_Buku') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="date" 
                                class="form-control" 
                                name="tgl_pinjam" 
                                value="{{ old('tgl_pinjam') }}" 
                                required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="date" 
                                class="form-control" 
                                name="tgl_kembali" 
                                value="{{ old('tgl_kembali') }}" 
                                required>
                    </div>

                    <div class="d-flex gap-2 mt-4 pt-2">
                        <button type="submit" class="btn btn-success w-50">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-secondary w-50">
                            <i class="fas fa-redo me-1"></i> Batal
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('pinjam') }}" class="btn btn-dark-custom">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Transaksi
            </a>
        </div>

    </div>
</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>