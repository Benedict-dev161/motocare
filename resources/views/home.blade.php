<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoCare - Motorcycle Maintenance Reminder</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        html, body {
            overflow-x: hidden;
        }

        body {
            background: #f4f7fb;
            color: #1f2937;
            padding-top: 90px;
        }

        .navbar {
            width: 100%;
            padding: 20px 8%;
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
        }

        .nav-links a {
            text-decoration: none;
            color: #374151;
            margin-left: 25px;
            font-size: 15px;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .hero {
            min-height: 85vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 8%;
            gap: 40px;
        }

        .hero-content {
            max-width: 560px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 18px;
            font-weight: 600;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
            color: #111827;
        }

        .hero h1 span {
            color: #2563eb;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.7;
            color: #4b5563;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-secondary {
            padding: 13px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #ffffff;
            color: #2563eb;
            border: 1px solid #2563eb;
        }

        .btn-secondary:hover {
            background: #eff6ff;
        }

        .hero-card {
            width: 420px;
            background: #ffffff;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.10);
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #111827;
        }

        .status-item {
            margin-bottom: 18px;
        }

        .status-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .status-safe {
            color: #16a34a;
        }

        .status-warning {
            color: #f59e0b;
        }

        .status-danger {
            color: #dc2626;
        }

        .progress {
            width: 100%;
            height: 9px;
            background: #e5e7eb;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 20px;
        }

        .fill-safe {
            width: 45%;
            background: #22c55e;
        }

        .fill-warning {
            width: 78%;
            background: #f59e0b;
        }

        .fill-danger {
            width: 95%;
            background: #ef4444;
        }

        .features {
            padding: 70px 8%;
            background: #ffffff;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-size: 34px;
            color: #111827;
            margin-bottom: 12px;
        }

        .section-title p {
            color: #6b7280;
            font-size: 16px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .feature-card {
            background: #f9fafb;
            padding: 26px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            transition: 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
        }

        .feature-card h3 {
            font-size: 19px;
            margin-bottom: 12px;
            color: #111827;
        }

        .feature-card p {
            color: #4b5563;
            font-size: 15px;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            padding: 25px;
            background: #111827;
            color: #d1d5db;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero h1 {
                font-size: 38px;
            }

            .hero-card {
                width: 100%;
            }

            .buttons {
                justify-content: center;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">MotoCare</div>
        
        <div class="nav-links">
            <a href="#fitur">Fitur</a>
            <a href="{{ route('maintenance.create') }}">Perawatan</a>
            <a href="{{ route('maintenance.history') }}">Histori</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="badge">Motorcycle Maintenance Reminder System</div>

            <h1>
                Pantau Perawatan Motor Lebih Mudah dengan <span>MotoCare</span>
            </h1>

            <p>
                MotoCare adalah aplikasi berbasis web yang membantu pengguna mencatat riwayat servis,
                memantau kilometer motor, dan menghitung jadwal perawatan berikutnya secara otomatis
                berdasarkan jarak tempuh dan interval waktu.
            </p>

            <div class="buttons">
                <a href="{{ route('maintenance.create') }}" class="btn-primary">Mulai Sekarang</a>
                <a href="#fitur" class="btn-secondary">Lihat Fitur</a>
            </div>
        </div>

        <div class="hero-card">
            <div class="card-title">Status Perawatan Motor</div>

            <div class="status-item">
                <div class="status-header">
                    <span>Oli Mesin</span>
                    <span class="status-warning">Mendekati Servis</span>
                </div>
                <div class="progress">
                    <div class="progress-fill fill-warning"></div>
                </div>
            </div>

            <div class="status-item">
                <div class="status-header">
                    <span>Oli Gardan</span>
                    <span class="status-safe">Aman</span>
                </div>
                <div class="progress">
                    <div class="progress-fill fill-safe"></div>
                </div>
            </div>

            <div class="status-item">
                <div class="status-header">
                    <span>Servis CVT</span>
                    <span class="status-safe">Aman</span>
                </div>
                <div class="progress">
                    <div class="progress-fill fill-safe"></div>
                </div>
            </div>

            <div class="status-item">
                <div class="status-header">
                    <span>Filter Udara</span>
                    <span class="status-danger">Perlu Dicek</span>
                </div>
                <div class="progress">
                    <div class="progress-fill fill-danger"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="fitur">
        <div class="section-title">
            <h2>Fitur Utama MotoCare</h2>
            <p>Sistem sederhana untuk membantu pengguna menjaga kondisi motor tetap optimal.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <h3>Data Motor</h3>
                <p>
                    Menyimpan informasi motor seperti merek, tipe, tahun produksi,
                    jenis bahan bakar, dan kilometer saat ini.
                </p>
            </div>

            <div class="feature-card">
                <h3>Riwayat Servis</h3>
                <p>
                    Mencatat semua aktivitas servis, mulai dari ganti oli mesin,
                    oli gardan, servis CVT, hingga penggantian komponen.
                </p>
            </div>

            <div class="feature-card">
                <h3>Reminder Perawatan</h3>
                <p>
                    Menghitung jadwal perawatan berikutnya dan menampilkan status
                    aman, mendekati servis, atau terlambat.
                </p>
            </div>

            <div class="feature-card">
                <h3>Monitoring Kilometer</h3>
                <p>
                    Pengguna dapat memperbarui kilometer motor agar sistem dapat
                    menyesuaikan jadwal servis secara otomatis.
                </p>
            </div>

            <div class="feature-card">
                <h3>Catatan Biaya</h3>
                <p>
                    Menyimpan biaya servis untuk membantu pengguna mengetahui
                    pengeluaran perawatan motor dari waktu ke waktu.
                </p>
            </div>

            <div class="feature-card">
                <h3>Dashboard Ringkas</h3>
                <p>
                    Menampilkan ringkasan kondisi motor dan daftar perawatan yang
                    perlu segera dilakukan.
                </p>
            </div>
        </div>
    </section>

    <footer class="footer">
        © 2026 Bryan.
    </footer>

</body>
</html>