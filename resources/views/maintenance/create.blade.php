<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Perawatan - MotoCare</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        html, body {
            overflow-x: hidden;
        }

        body {
            background: #f4f7fb;
            color: #111827;
            padding-top: 90px;
        }

        .navbar {
            width: 100%;
            padding: 18px 8%;
            background: rgba(255, 255, 255, 0.96);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            backdrop-filter: blur(10px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 26px;
            font-weight: 800;
            color: #2563eb;
            letter-spacing: -0.5px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: #2563eb;
            color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: 800;
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
        }

        .back-link {
            text-decoration: none;
            color: #374151;
            font-size: 15px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 24px;
        }

        .header {
            margin-bottom: 32px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .header h1 {
            font-size: 36px;
            color: #111827;
            margin-bottom: 12px;
        }

        .header p {
            color: #4b5563;
            font-size: 16px;
            line-height: 1.7;
            max-width: 780px;
        }

        .form-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 34px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .form-section {
            margin-bottom: 34px;
            padding-bottom: 28px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .form-section h2 {
            font-size: 22px;
            margin-bottom: 8px;
            color: #111827;
        }

        .form-section .section-desc {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: span 2;
        }

        label {
            font-size: 14px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            background: #ffffff;
            color: #111827;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        .helper {
            margin-top: 6px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.5;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-secondary {
            padding: 13px 22px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            border: none;
            cursor: pointer;
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

        @media (max-width: 768px) {
            .navbar {
                padding: 18px 24px;
            }

            .container {
                margin: 34px auto;
            }

            .header h1 {
                font-size: 30px;
            }

            .form-card {
                padding: 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: span 1;
            }

            .button-group {
                justify-content: stretch;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                text-align: center;
            }
            .alert-error {
                background: #fee2e2;
                border: 1px solid #fecaca;
                color: #991b1b;
                padding: 16px 18px;
                border-radius: 12px;
                margin-bottom: 24px;
            }

            .alert-error ul {
                margin-left: 20px;
                margin-top: 8px;
            }
            
            .nav-links {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .nav-links a {
                text-decoration: none;
                color: #374151;
                font-size: 15px;
                font-weight: 700;
                padding: 10px 16px;
                border-radius: 10px;
                transition: all 0.2s ease;
            }

            .nav-links a:hover {
                color: #2563eb;
                background: #eff6ff;
            }

            .nav-links a.active {
                color: #ffffff;
                background: #2563eb;
                box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
            }

        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">M</span>
            <span>MotoCare</span>
        </a>
    
        <div class="nav-links">
            <a href="{{ route('home') }}#fitur">
                Fitur
            </a>
        
            <a href="{{ route('maintenance.create') }}" class="{{ request()->routeIs('maintenance.create') ? 'active' : '' }}">
                Perawatan
            </a>
        
            <a href="{{ route('maintenance.history') }}" class="{{ request()->routeIs('maintenance.history') ? 'active' : '' }}">
                Histori
            </a>
        </div>
    </nav>

    <main class="container">
        <div class="header">
            <div class="badge">Input Data Perawatan Motor</div>

            <h1>Masukkan Data Motor dan Riwayat Perawatan</h1>

            <p>
                Isi data berikut agar sistem dapat membantu menghitung jadwal perawatan berikutnya,
                seperti ganti oli mesin, oli gardan, servis CVT, filter udara, busi, rem, dan komponen penting lainnya.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Data belum valid.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-card" action="{{ route('maintenance.store') }}" method="POST">
            @csrf

            <div class="form-section">
                <h2>Data Motor</h2>
                <p class="section-desc">
                    Bagian ini digunakan untuk mencatat identitas motor dan kilometer terbaru.
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="motor_name">Nama Motor</label>
                        <input type="text" id="motor_name" name="motor_name" value="Honda BeAT Sporty CBS" required>
                    </div>

                    <div class="form-group">
                        <label for="year">Tahun Motor</label>
                        <input type="number" id="year" name="year" value="2025" required>
                    </div>

                    <div class="form-group">
                        <label for="fuel_type">Bahan Bakar Harian</label>
                        <select id="fuel_type" name="fuel_type" required>
                            <option value="RON 90">RON 90</option>
                            <option value="RON 92" selected>RON 92</option>
                            <option value="RON 95">RON 95</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="current_km">Kilometer Saat Ini</label>
                        <input type="number" id="current_km" name="current_km" placeholder="Contoh: 7700" required>
                        <div class="helper">Masukkan angka kilometer yang tampil di odometer motor.</div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2>Riwayat Ganti Oli</h2>
                <p class="section-desc">
                    Data ini digunakan untuk menghitung kapan oli mesin dan oli gardan perlu diganti kembali.
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="last_engine_oil_date">Tanggal Terakhir Ganti Oli Mesin</label>
                        <input type="date" id="last_engine_oil_date" name="last_engine_oil_date" required>
                    </div>

                    <div class="form-group">
                        <label for="last_engine_oil_km">Kilometer Saat Terakhir Ganti Oli Mesin</label>
                        <input type="number" id="last_engine_oil_km" name="last_engine_oil_km" placeholder="Contoh: 5000" required>
                    </div>

                    <div class="form-group">
                        <label for="last_gear_oil_date">Tanggal Terakhir Ganti Oli Gardan</label>
                        <input type="date" id="last_gear_oil_date" name="last_gear_oil_date">
                    </div>

                    <div class="form-group">
                        <label for="last_gear_oil_km">Kilometer Saat Terakhir Ganti Oli Gardan</label>
                        <input type="number" id="last_gear_oil_km" name="last_gear_oil_km" placeholder="Contoh: 4000">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2>Riwayat Servis Berkala</h2>
                <p class="section-desc">
                    Bagian ini mencatat servis umum, servis CVT, filter udara, busi, rem, dan ban.
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="last_service_date">Tanggal Terakhir Servis Berkala</label>
                        <input type="date" id="last_service_date" name="last_service_date">
                    </div>

                    <div class="form-group">
                        <label for="last_service_km">Kilometer Saat Terakhir Servis Berkala</label>
                        <input type="number" id="last_service_km" name="last_service_km" placeholder="Contoh: 6000">
                    </div>

                    <div class="form-group">
                        <label for="last_cvt_date">Tanggal Terakhir Servis CVT</label>
                        <input type="date" id="last_cvt_date" name="last_cvt_date">
                    </div>

                    <div class="form-group">
                        <label for="last_cvt_km">Kilometer Saat Terakhir Servis CVT</label>
                        <input type="number" id="last_cvt_km" name="last_cvt_km" placeholder="Contoh: 8000">
                    </div>

                    <div class="form-group">
                        <label for="last_air_filter_date">Tanggal Terakhir Cek/Ganti Filter Udara</label>
                        <input type="date" id="last_air_filter_date" name="last_air_filter_date">
                    </div>

                    <div class="form-group">
                        <label for="last_air_filter_km">Kilometer Saat Terakhir Cek/Ganti Filter Udara</label>
                        <input type="number" id="last_air_filter_km" name="last_air_filter_km" placeholder="Contoh: 4000">
                    </div>

                    <div class="form-group">
                        <label for="last_spark_plug_date">Tanggal Terakhir Ganti Busi</label>
                        <input type="date" id="last_spark_plug_date" name="last_spark_plug_date">
                    </div>

                    <div class="form-group">
                        <label for="last_spark_plug_km">Kilometer Saat Terakhir Ganti Busi</label>
                        <input type="number" id="last_spark_plug_km" name="last_spark_plug_km" placeholder="Contoh: 8000">
                    </div>

                    <div class="form-group">
                        <label for="last_brake_check_date">Tanggal Terakhir Cek Rem</label>
                        <input type="date" id="last_brake_check_date" name="last_brake_check_date">
                    </div>

                    <div class="form-group">
                        <label for="last_brake_check_km">Kilometer Saat Terakhir Cek Rem</label>
                        <input type="number" id="last_brake_check_km" name="last_brake_check_km" placeholder="Contoh: 4000">
                    </div>

                    <div class="form-group">
                        <label for="last_tire_check_date">Tanggal Terakhir Cek Ban</label>
                        <input type="date" id="last_tire_check_date" name="last_tire_check_date">
                    </div>

                    <div class="form-group">
                        <label for="last_tire_check_km">Kilometer Saat Terakhir Cek Ban</label>
                        <input type="number" id="last_tire_check_km" name="last_tire_check_km" placeholder="Contoh: 7000">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2>Informasi Bengkel dan Catatan</h2>
                <p class="section-desc">
                    Bagian ini opsional, tetapi berguna untuk mencatat tempat servis dan kondisi motor.
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="workshop_name">Bengkel Terakhir</label>
                        <input type="text" id="workshop_name" name="workshop_name" placeholder="Contoh: AHASS / Bengkel Shell / Bengkel Umum">
                    </div>

                    <div class="form-group">
                        <label for="last_service_cost">Biaya Servis Terakhir</label>
                        <input type="number" id="last_service_cost" name="last_service_cost" placeholder="Contoh: 85000">
                    </div>

                    <div class="form-group full">
                        <label for="notes">Catatan Kondisi Motor</label>
                        <textarea id="notes" name="notes" placeholder="Contoh: Tarikan masih halus, rem normal, belum servis CVT, oli terakhir pakai Shell Ultra Scooter 10W-30."></textarea>
                    </div>
                </div>
            </div>

            <div class="button-group">
                <a href="/" class="btn-secondary">Batal</a>
                <button type="submit" class="btn-primary">Simpan dan Cek Perawatan</button>
            </div>
        </form>
    </main>

</body>
</html>