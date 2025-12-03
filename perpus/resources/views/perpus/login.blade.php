<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silahkan Login - Perpustakaan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-4">

        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-header bg-primary text-white text-center rounded-top-4 py-3">
                <h3 class="mb-0">Login Perpustakaan</h3>
            </div>

            <div class="card-body p-4">

                <form action="{{ url('login') }}" method="POST">
                    @csrf

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Username</label>
                        <input type="text" name="username" class="form-control"
                               placeholder="Masukkan username">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Masukkan password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">
                        Login
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
