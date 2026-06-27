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
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            backdrop-filter: blur(10px);
        }

        .navbar-inner {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            min-width: 1250px;
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
            .navbar-inner {
                padding: 16px 24px;
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
            .navbar-inner {
                padding: 16px 24px;
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
        .editable-input {
            width: 150px;
            padding: 9px 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 8px;
            outline: none;
        }

        .editable-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .editable-input:disabled {
            background: transparent;
            border-color: transparent;
            color: #374151;
            opacity: 1;
            padding-left: 0;
        }

        .input-label {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 4px;
            font-weight: 700;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit,
        .btn-save {
            border: none;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-edit:hover {
            background: #bfdbfe;
        }

        .btn-save {
            background: #2563eb;
            color: #ffffff;
        }

        .btn-save:hover {
            background: #1d4ed8;
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

        .alert-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 22px;
        }

        .alert-error ul {
            margin-left: 20px;
            margin-top: 8px;
        }

        .current-km-form {
            margin-top: 8px;
        }

        .current-km-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            outline: none;
            margin-bottom: 10px;
        }

        .current-km-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .current-km-input:disabled {
            background: transparent;
            border-color: transparent;
            padding-left: 0;
            color: #111827;
            opacity: 1;
        }

        .current-km-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-km-edit,
        .btn-km-save {
            border: none;
            padding: 8px 11px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-km-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-km-edit:hover {
            background: #bfdbfe;
        }

        .btn-km-save {
            background: #2563eb;
            color: #ffffff;
        }

        .btn-km-save:hover {
            background: #1d4ed8;
        }

    </style>
</head>
<script>
    function enableEdit(button) {
        const row = button.closest('tr');
        const inputs = row.querySelectorAll('.editable-input');
        const saveButton = row.querySelector('.btn-save');

        inputs.forEach(function(input) {
            input.disabled = false;
        });

        button.style.display = 'none';
        saveButton.style.display = 'inline-block';
    }
</script>
<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon">M</span>
                <span>MotoCare</span>
            </a>

            <div class="nav-links">
                <a href="{{ route('maintenance.create') }}" class="{{ request()->routeIs('maintenance.create') || request()->routeIs('maintenance.result') ? 'active' : '' }}">
                    Perawatan
                </a>

                <a href="{{ route('maintenance.history') }}" class="{{ request()->routeIs('maintenance.history') ? 'active' : '' }}">
                    Histori
                </a>
            </div>
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
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        
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

                <form
                    action="{{ route('maintenance.updateCurrentKm', $maintenanceCheck->id) }}"
                    method="POST"
                    class="current-km-form"
                >
                    @csrf
                    @method('PATCH')

                    <input
                        type="number"
                        name="current_km"
                        value="{{ $maintenanceCheck->current_km }}"
                        class="current-km-input"
                        disabled
                        required
                    >

                    <div class="current-km-actions">
                        <button type="button" class="btn-km-edit" onclick="enableCurrentKmEdit(this)">
                            Edit KM
                        </button>
                    
                        <button type="submit" class="btn-km-save" style="display: none;">
                            Simpan
                        </button>
                    </div>
                </form>
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
                            <th>Interval KM</th>
                            <th>Jadwal Berikutnya</th>
                            <th>Sisa KM</th>
                            <th>Sisa Hari</th>
                            <th>Status</th>
                            <th>Rekomendasi</th>
                            <th>Manfaat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>
                                    <div class="maintenance-name">{{ $result['name'] }}</div>
                                </td>
                            
                                <td>
                                    <label class="input-label">Tanggal</label>
                                    <input
                                        type="date"
                                        name="last_date"
                                        value="{{ $result['input_date_value'] }}"
                                        class="editable-input"
                                        form="update-form-{{ $loop->index }}"
                                        disabled
                                    >
                                
                                    <label class="input-label">KM</label>
                                    <input
                                        type="number"
                                        name="last_km"
                                        value="{{ $result['input_km_value'] }}"
                                        class="editable-input"
                                        form="update-form-{{ $loop->index }}"
                                        disabled
                                    >
                                </td>
                            
                                <td>
                                    Setiap {{ $result['interval_km'] }}
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
                            
                                <td>
                                    <form
                                        id="update-form-{{ $loop->index }}"
                                        action="{{ route('maintenance.updateCategory', [
                                            'id' => $maintenanceCheck->id,
                                            'category' => $result['category']
                                        ]) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')
                                
                                        <div class="action-buttons">
                                            <button type="button" class="btn-edit" onclick="enableEdit(this)">
                                                Edit
                                            </button>
                                        
                                            <button type="submit" class="btn-save" style="display: none;">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </td>
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
<script>
    function enableCurrentKmEdit(button) {
        const form = button.closest('form');
        const input = form.querySelector('.current-km-input');
        const saveButton = form.querySelector('.btn-km-save');

        input.disabled = false;
        input.focus();

        button.style.display = 'none';
        saveButton.style.display = 'inline-block';
    }
</script>
</body>
</html>