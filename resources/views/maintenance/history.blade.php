<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Perawatan - MotoCare</title>

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
            max-width: 1100px;
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

        .alert-success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-weight: 600;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
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

        .btn-add {
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
        }

        .btn-add:hover {
            background: #1d4ed8;
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
            white-space: nowrap;
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

        .motor-name {
            font-weight: 700;
            color: #111827;
        }

        .empty {
            padding: 40px;
            text-align: center;
            color: #6b7280;
        }

        .action-group {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn-view,
        .btn-delete {
            border: none;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-view {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-view:hover {
            background: #bfdbfe;
        }

        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 18px 24px;
            }

            .nav-links a {
                margin-left: 12px;
                font-size: 14px;
            }

            .header h1 {
                font-size: 28px;
            }

            .table-header {
                align-items: flex-start;
            }
            .logo {
                font-size: 22px;
            }
            
            .logo-icon {
                width: 34px;
                height: 34px;
                font-size: 16px;
            }
            
            .nav-links {
                gap: 6px;
            }
            
            .nav-links a {
                font-size: 13px;
                padding: 8px 10px;
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
            <div class="badge">Histori Input Perawatan</div>

            <h1>Histori Data Perawatan Motor</h1>

            <p>
                Halaman ini menampilkan data perawatan motor yang terakhir diinput.
                Kamu dapat melihat kembali hasil perhitungan atau menghapus data yang sudah tidak diperlukan.
            </p>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="table-card">
            <div class="table-header">
                <div>
                    <h2>Daftar Histori</h2>
                    <p>Data ditampilkan dari input terbaru ke input terlama.</p>
                </div>

                <a href="{{ route('maintenance.create') }}" class="btn-add">+ Input Baru</a>
            </div>

            @if ($maintenanceChecks->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Motor</th>
                                <th>Tahun</th>
                                <th>Bahan Bakar</th>
                                <th>KM Saat Ini</th>
                                <th>Ganti Oli Mesin Terakhir</th>
                                <th>Servis Terakhir</th>
                                <th>Bengkel</th>
                                <th>Biaya</th>
                                <th>Tanggal Input</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($maintenanceChecks as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>
                                        <div class="motor-name">{{ $item->motor_name }}</div>
                                    </td>

                                    <td>{{ $item->year }}</td>

                                    <td>{{ $item->fuel_type }}</td>

                                    <td>{{ number_format($item->current_km, 0, ',', '.') }} km</td>

                                    <td>
                                        {{ $item->last_engine_oil_date ? $item->last_engine_oil_date->format('d-m-Y') : '-' }}
                                        <br>
                                        {{ number_format($item->last_engine_oil_km, 0, ',', '.') }} km
                                    </td>

                                    <td>
                                        {{ $item->last_service_date ? $item->last_service_date->format('d-m-Y') : '-' }}
                                        <br>
                                        {{ $item->last_service_km ? number_format($item->last_service_km, 0, ',', '.') . ' km' : '-' }}
                                    </td>

                                    <td>{{ $item->workshop_name ?? '-' }}</td>

                                    <td>
                                        {{ $item->last_service_cost ? 'Rp ' . number_format($item->last_service_cost, 0, ',', '.') : '-' }}
                                    </td>

                                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>

                                    <td>
                                        <div class="action-group">
                                            <a href="{{ route('maintenance.result', $item->id) }}" class="btn-view">
                                                Lihat
                                            </a>

                                            <form action="{{ route('maintenance.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data histori ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-delete">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    Belum ada data histori. Silakan input data perawatan motor terlebih dahulu.
                </div>
            @endif
        </section>
    </main>

</body>
</html>