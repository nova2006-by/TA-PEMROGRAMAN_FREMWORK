<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Anggota</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('anggota/save') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $query->ID_Anggota }}">
                    <input type="hidden" name="is_update" value="{{ $is_update }}">

                    <!-- NIM -->
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" 
                               class="form-control" 
                               id="nim" 
                               name="nim" 
                               value="{{ $query->nim }}" 
                               maxlength="100">
                    </div>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" 
                               class="form-control" 
                               id="nama" 
                               name="nama" 
                               value="{{ $query->nama }}" 
                               maxlength="150">
                    </div>

                    <!-- Program Studi -->
                    <div class="mb-3">
                        <label for="progdi" class="form-label">Program Studi</label>
                        <select class="form-select" id="progdi" name="progdi">
                            @foreach ($optProgdi as $key => $value)
                                <option value="{{ $key }}" 
                                        {{ $query->progdi == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ url('anggota') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar Anggota</a>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
