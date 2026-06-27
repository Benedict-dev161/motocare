<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Perawatan - MotoCare</title>

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
            text-decoration: none;
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

        .container {
            max-width: 1200px;
            margin: 45px auto;
            padding: 0 24px;
        }

        .header {
            margin-bottom: 28px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 16px;
            font-weight: 700;
        }

        .header h1 {
            font-size: 34px;
            margin-bottom: 12px;
        }

        .header p {
            color: #4b5563;
            font-size: 16px;
            line-height: 1.7;
            max-width: 850px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .summary-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
            border: 1px solid #e5e7eb;
        }

        .summary-card span {
            display: block;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .summary-card strong {
            font-size: 20px;
            color: #111827;
        }

        .table-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .table-header {
            padding: 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .table-header h2 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .table-header p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        th {
            background: #f9fafb;
            color: #374151;
            text-align: left;
            font-size: 13px;
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
            font-size: 14px;
            color: #374151;
            line-height: 1.5;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .maintenance-name {
            font-weight: 700;
            color: #111827;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .safe {
            background: #dcfce7;
            color: #166534;
        }

        .warning {
            background: #fef3c7;
            color: #92400e;
        }

        .danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .unknown {
            background: #e5e7eb;
            color: #374151;
        }

        .action-box {
            margin-top: 28px;
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-secondary {
            padding: 13px 22px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
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

        @media (max-width: 900px) {
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 24px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 28px;
            }

            .action-box {
                justify-content: stretch;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                text-align: center;
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
            <div class="badge">Hasil Perhitungan Perawatan</div>

            <h1>Rekomendasi Perawatan Motor</h1>

            <p>
                Berikut adalah hasil perhitungan berdasarkan kilometer saat ini, tanggal terakhir perawatan,
                dan kilometer saat terakhir servis. Status ini membantu menentukan komponen mana yang masih aman,
                mendekati jadwal servis, atau sudah terlambat.
            </p>
        </div>

        <div class="summary-grid">
            <div class="summary-card">
                <span>Nama Motor</span>
                <strong>{{ $maintenanceCheck->motor_name }}</strong>
            </div>

            <div class="summary-card">
                <span>Tahun</span>
                <strong>{{ $maintenanceCheck->year }}</strong>
            </div>

            <div class="summary-card">
                <span>Bahan Bakar</span>
                <strong>{{ $maintenanceCheck->fuel_type }}</strong>
            </div>

            <div class="summary-card">
                <span>Kilometer Saat Ini</span>
                <strong>{{ number_format($maintenanceCheck->current_km, 0, ',', '.') }} km</strong>
            </div>
        </div>

        <section class="table-card">
            <div class="table-header">
                <h2>Detail Jadwal Perawatan</h2>
                <p>
                    Perhitungan ini memakai interval dasar perawatan motor matic harian:
                    oli mesin 2.500 km, oli gardan 8.000 km, servis berkala 4.000 km,
                    CVT 8.000 km, dan pengecekan ban lebih sering.
                </p>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Perawatan</th>
                            <th>Terakhir</th>
                            <th>Jadwal Berikutnya</th>
                            <th>Sisa KM</th>
                            <th>Sisa Hari</th>
                            <th>Status</th>
                            <th>Rekomendasi</th>
                            <th>Manfaat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>
                                    <div class="maintenance-name">{{ $result['name'] }}</div>
                                </td>

                                <td>
                                    {{ $result['last_date'] }}<br>
                                    {{ $result['last_km'] }}
                                </td>

                                <td>
                                    {{ $result['next_date'] }}<br>
                                    {{ $result['next_km'] }}
                                </td>

                                <td>{{ $result['remaining_km'] }}</td>

                                <td>{{ $result['remaining_days'] }}</td>

                                <td>
                                    <span class="status {{ $result['status_class'] }}">
                                        {{ $result['status'] }}
                                    </span>
                                </td>

                                <td>{{ $result['recommendation'] }}</td>

                                <td>{{ $result['benefit'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <div class="action-box">
            <a href="{{ route('maintenance.create') }}" class="btn-secondary">Cek Motor Lain</a>
            <a href="/" class="btn-primary">Kembali ke Home</a>
        </div>
    </main>

</body>
</html>