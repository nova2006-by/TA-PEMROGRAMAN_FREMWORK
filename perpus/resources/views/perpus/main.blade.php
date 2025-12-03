<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan 💾</title>

    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variabel Warna Neon */
        :root {
            --neon-color: #00ffcc;
            --neon-glow: rgba(0, 255, 204, 0.4);
            --dark-bg: #0d0d0d;
            --logout-color: #ff4d4d;
        }

        /* === BODY & GENERAL STYLES === */
        body {
            /* Latar belakang gelap dengan gradien halus */
            background: linear-gradient(135deg, var(--dark-bg), #111111, var(--dark-bg));
            min-height: 100vh;
            font-family: 'Share Tech Mono', monospace;
            color: var(--neon-color);
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* === HEADER & TITLE === */
        h1 {
            color: var(--neon-color);
            font-size: 36px;
            padding-top: 50px;
            text-shadow: 0 0 15px var(--neon-color);
        }

        p.intro {
            color: #00ffaa;
            font-size: 18px;
            margin-top: 5px;
            text-shadow: 0 0 8px #00ffaa;
            margin-bottom: 40px;
        }

        /* === MENU CONTAINER === */
        .menu-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 0px auto 50px;
        }

        /* === CARD ITEM === */
        .card {
            width: 280px;
            background: rgba(0, 0, 0, 0.6); /* Sedikit lebih transparan */
            border: 2px solid var(--neon-color);
            border-radius: 20px;
            padding: 30px 25px; /* Padding sedikit lebih besar */
            box-shadow: 0 0 15px var(--neon-glow);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            text-align: center;
            /* Flex untuk mengatur konten di tengah card */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card:hover {
            transform: scale(1.05); /* Skala sedikit dikurangi agar tidak terlalu besar */
            /* Efek neon hover yang lebih intens */
            box-shadow: 0 0 30px var(--neon-color), 0 0 50px var(--neon-color);
        }

        .card h3 {
            color: var(--neon-color);
            text-shadow: 0 0 10px var(--neon-color);
            margin-bottom: 10px;
            font-size: 20px;
        }

        .card p {
            color: var(--neon-color);
            text-shadow: 0 0 5px var(--neon-color);
            font-size: 14px;
            opacity: 0.8;
        }

        /* === LOGOUT BUTTON === */
        .logout-btn {
            display: inline-block;
            margin: 50px 0;
            padding: 12px 35px;
            border: 2px solid var(--logout-color);
            color: var(--logout-color);
            border-radius: 12px;
            font-weight: bold;
            text-shadow: 0 0 10px var(--logout-color);
            transition: all 0.3s ease-in-out;
            text-decoration: none; /* Penting */
            font-size: 16px;
        }

        .logout-btn:hover {
            background: var(--logout-color);
            color: #000;
            /* Efek neon merah */
            box-shadow: 0 0 20px var(--logout-color), 0 0 40px var(--logout-color);
        }
    </style>
</head>
<body>

    <h1>🌐 Main Menu Interface</h1>
    <p class="intro">Aplikasi Perpustakaan FTIK USM</p>

    <div class="menu-container">

        <a href="{{ url('buku') }}">
            <div class="card">
                <h3><i class="fas fa-book-reader"></i> Kelola Buku</h3>
                <p>Manajemen, registrasi, dan inventaris data buku perpustakaan.</p>
            </div>
        </a>

        <a href="{{ url('anggota') }}">
            <div class="card">
                <h3><i class="fas fa-users-cog"></i> Kelola Anggota</h3>
                <p>Registrasi, pembaruan, dan pencatatan data anggota terdaftar.</p>
            </div>
        </a>

        <a href="{{ url('pinjam') }}">
            <div class="card">
                <h3><i class="fas fa-exchange-alt"></i> Transaksi Pinjam</h3>
                <p>Proses peminjaman dan pengembalian buku secara real-time.</p>
            </div>
        </a>

    </div>

    <a class="logout-btn" href="{{ url('logout') }}">
        <i class="fas fa-power-off"></i> SYSTEM LOGOUT
    </a>

</body>
</html>