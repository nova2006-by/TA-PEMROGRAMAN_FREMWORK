<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0">Form Input Buku</h4>
                </div>

                <div class="card-body p-4">

                    {{-- ERROR VALIDATION --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('buku.save') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="is_update" value="{{ $is_update }}">

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="Judul" class="form-label fw-semibold">Judul Buku</label>
                            <input type="text" class="form-control" name="Judul" id="Judul"
                                   value="{{ old('Judul') }}" maxlength="150" placeholder="Masukkan Judul Buku">
                        </div>

                        <!-- Pengarang -->
                        <div class="mb-3">
                            <label for="Pengarang" class="form-label fw-semibold">Pengarang</label>
                            <input type="text" class="form-control" name="Pengarang" id="Pengarang"
                                   value="{{ old('Pengarang') }}" maxlength="150" placeholder="Nama Pengarang">
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label for="Kategori" class="form-label fw-semibold">Kategori</label>
                            <select class="form-select" name="Kategori" id="Kategori">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($optkategori as $key => $value)
                                    <option value="{{ $key }}" {{ old('Kategori') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ url('buku') }}" class="btn btn-secondary px-4">Kembali</a>
                            <div>
                                <button type="reset" class="btn btn-warning px-4">Batal</button>
                                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
