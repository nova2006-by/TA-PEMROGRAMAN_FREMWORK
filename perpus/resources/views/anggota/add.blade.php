<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center py-5">

    <div class="card shadow-lg rounded-4 border-0" style="width: 30rem;">
        <div class="card-header bg-primary text-white text-center rounded-top-4 py-3">
            <h3 class="mb-0">Tambah Anggota</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ url('anggota/save') }}" method="post" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="is_update" value="{{ $is_update }}" />

                <div class="mb-3">
                    <label class="form-label">NIM :</label>
                    <input type="text" name="nim" id="nim" class="form-control"
                           value="{{ old('nim') }}" maxlength="150">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama :</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                           value="{{ old('nama') }}" maxlength="150">
                </div>

                <div class="mb-3">
                    <label class="form-label">Progdi :</label>
                    <select name="progdi" id="progdi" class="form-select">
                        @foreach ($optprogdi as $key => $value)
                            <option value="{{ $key }}" {{ old('progdi') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">
                    Simpan
                </button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ url('anggota') }}" class="text-decoration-none">
                    Kembali ke Daftar Anggota
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
