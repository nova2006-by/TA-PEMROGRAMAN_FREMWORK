<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">Edit Data Peminjaman</h4>
        </div>

        <div class="card-body">

            <form action="{{ url('pinjam/update/'.$pinjam->ID_Pinjam) }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Anggota</label>
                    <select name="ID_Anggota" class="form-select" required>
                        @foreach ($optanggota as $id => $nama)
                            <option value="{{ $id }}" {{ $pinjam->ID_Anggota == $id ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Buku</label>
                    <select name="ID_Buku" class="form-select" required>
                        @foreach ($optbuku as $id => $judul)
                            <option value="{{ $id }}" {{ $pinjam->ID_Buku == $id ? 'selected' : '' }}>
                                {{ $judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" value="{{ $pinjam->tgl_pinjam }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kembali" value="{{ $pinjam->tgl_kembali }}" required>
                </div>

                <button class="btn btn-success">💾 Update</button>
                <a href="{{ url('pinjam') }}" class="btn btn-secondary">⬅ Kembali</a>

            </form>

        </div>

    </div>
</div>

</body>
</html>
