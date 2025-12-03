<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-warning text-dark text-center py-3 rounded-top-4">
                    <h4 class="mb-0">Edit Buku</h4>
                </div>

                <div class="card-body p-4">

                    <form action="{{ url('buku/save') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $query->ID_Buku }}">
                        <input type="hidden" name="is_update" value="{{ $is_update }}">

                        <!-- Judul -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Buku</label>
                            <input type="text" name="Judul" class="form-control"
                                   value="{{ $query->Judul }}" maxlength="100"
                                   placeholder="Masukkan judul buku">
                        </div>

                        <!-- Pengarang -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pengarang</label>
                            <input type="text" name="Pengarang" class="form-control"
                                   value="{{ $query->Pengarang }}" maxlength="150"
                                   placeholder="Nama Pengarang">
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="Kategori" class="form-select">
                                @foreach ($optkategori as $key => $value)
                                    <option value="{{ $key }}" {{ $query->Kategori == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ url('buku') }}" class="btn btn-secondary px-4">Kembali</a>
                            <button type="submit" class="btn btn-warning px-4">Simpan Perubahan</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
