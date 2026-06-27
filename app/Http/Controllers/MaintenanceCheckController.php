<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceCheck;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenanceCheckController extends Controller
{
    public function create()
    {
        return view('maintenance.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'motor_name' => 'required|string|max:100',
            'year' => 'required|integer|min:2000|max:2100',
            'fuel_type' => 'required|string|max:20',
            'current_km' => 'required|integer|min:0|max:999999',

            'last_engine_oil_date' => 'required|date',
            'last_engine_oil_km' => 'required|integer|min:0|lte:current_km',

            'last_gear_oil_date' => 'nullable|date',
            'last_gear_oil_km' => 'nullable|integer|min:0|lte:current_km',

            'last_service_date' => 'nullable|date',
            'last_service_km' => 'nullable|integer|min:0|lte:current_km',

            'last_cvt_date' => 'nullable|date',
            'last_cvt_km' => 'nullable|integer|min:0|lte:current_km',

            'last_air_filter_date' => 'nullable|date',
            'last_air_filter_km' => 'nullable|integer|min:0|lte:current_km',

            'last_spark_plug_date' => 'nullable|date',
            'last_spark_plug_km' => 'nullable|integer|min:0|lte:current_km',

            'last_brake_check_date' => 'nullable|date',
            'last_brake_check_km' => 'nullable|integer|min:0|lte:current_km',

            'last_tire_check_date' => 'nullable|date',
            'last_tire_check_km' => 'nullable|integer|min:0|lte:current_km',

            'workshop_name' => 'nullable|string|max:100',
            'last_service_cost' => 'nullable|integer|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        $maintenanceCheck = MaintenanceCheck::create($validated);

        return redirect()->route('maintenance.result', $maintenanceCheck->id);
    }

    public function result($id)
    {
        $maintenanceCheck = MaintenanceCheck::findOrFail($id);

        $results = $this->calculateMaintenance($maintenanceCheck);

        return view('maintenance.result', compact('maintenanceCheck', 'results'));
    }

    public function history()
    {
        $maintenanceChecks = MaintenanceCheck::latest()->get();
        return view('maintenance.history', compact('maintenanceChecks'));
    }

    public function destroy($id)
    {
        $maintenanceCheck = MaintenanceCheck::findOrFail($id);
        $maintenanceCheck->delete();

        return redirect()
            ->route('maintenance.history')
            ->with('success', 'Data histori berhasil dihapus.');
    }

    private function calculateMaintenance(MaintenanceCheck $check): array
    {
        $items = [
            [
                'name' => 'Ganti Oli Mesin',
                'last_date' => $check->last_engine_oil_date,
                'last_km' => $check->last_engine_oil_km,
                'interval_km' => 2500,
                'interval_month' => 2,
                'warning_km' => 500,
                'benefit' => 'Menjaga pelumasan mesin, mengurangi gesekan, dan mencegah mesin cepat kasar.',
            ],
            [
                'name' => 'Ganti Oli Gardan',
                'last_date' => $check->last_gear_oil_date,
                'last_km' => $check->last_gear_oil_km,
                'interval_km' => 8000,
                'interval_month' => 6,
                'warning_km' => 1000,
                'benefit' => 'Melumasi gear transmisi belakang agar suara gardan tetap halus dan tidak cepat aus.',
            ],
            [
                'name' => 'Servis Berkala',
                'last_date' => $check->last_service_date,
                'last_km' => $check->last_service_km,
                'interval_km' => 4000,
                'interval_month' => 4,
                'warning_km' => 700,
                'benefit' => 'Memastikan kondisi mesin, rem, ban, kelistrikan, dan komponen utama tetap aman.',
            ],
            [
                'name' => 'Servis CVT',
                'last_date' => $check->last_cvt_date,
                'last_km' => $check->last_cvt_km,
                'interval_km' => 8000,
                'interval_month' => 6,
                'warning_km' => 1000,
                'benefit' => 'Membersihkan debu CVT dan menjaga tarikan motor tetap halus.',
            ],
            [
                'name' => 'Cek / Ganti Filter Udara',
                'last_date' => $check->last_air_filter_date,
                'last_km' => $check->last_air_filter_km,
                'interval_km' => 4000,
                'interval_month' => 3,
                'warning_km' => 500,
                'benefit' => 'Menjaga udara masuk tetap bersih agar pembakaran stabil dan motor tidak boros.',
            ],
            [
                'name' => 'Ganti Busi',
                'last_date' => $check->last_spark_plug_date,
                'last_km' => $check->last_spark_plug_km,
                'interval_km' => 8000,
                'interval_month' => 6,
                'warning_km' => 1000,
                'benefit' => 'Menjaga pembakaran tetap stabil, mencegah brebet, dan memudahkan starter.',
            ],
            [
                'name' => 'Cek Rem',
                'last_date' => $check->last_brake_check_date,
                'last_km' => $check->last_brake_check_km,
                'interval_km' => 4000,
                'interval_month' => 3,
                'warning_km' => 500,
                'benefit' => 'Menjaga pengereman tetap aman dan mencegah kampas rem habis tanpa disadari.',
            ],
            [
                'name' => 'Cek Ban',
                'last_date' => $check->last_tire_check_date,
                'last_km' => $check->last_tire_check_km,
                'interval_km' => 1000,
                'interval_month' => 1,
                'warning_km' => 200,
                'benefit' => 'Menjaga tekanan dan kondisi ban agar motor stabil, irit, dan aman saat pengereman.',
            ],
        ];

        $results = [];

        foreach ($items as $item) {
            $results[] = $this->buildMaintenanceResult($item, $check->current_km);
        }

        return $results;
    }

    private function buildMaintenanceResult(array $item, int $currentKm): array
    {
        $lastDate = $item['last_date'];
        $lastKm = $item['last_km'];

        $nextKm = $lastKm !== null ? $lastKm + $item['interval_km'] : null;
        $remainingKm = $nextKm !== null ? $nextKm - $currentKm : null;

        $nextDate = null;
        $remainingDays = null;

        if ($lastDate !== null) {
            $nextDate = Carbon::parse($lastDate)->addMonths($item['interval_month']);
            $remainingDays = now()->startOfDay()->diffInDays($nextDate, false);
        }

        if ($lastDate === null && $lastKm === null) {
            $status = 'Belum Ada Data';
            $statusClass = 'unknown';
            $recommendation = 'Belum ada riwayat. Lakukan pengecekan awal agar jadwal perawatan bisa dihitung lebih akurat.';
        } elseif (
            ($remainingKm !== null && $remainingKm <= 0) ||
            ($remainingDays !== null && $remainingDays <= 0)
        ) {
            $status = 'Terlambat';
            $statusClass = 'danger';
            $recommendation = 'Segera lakukan perawatan. Jangan ditunda karena komponen sudah melewati batas interval ideal.';
        } elseif (
            ($remainingKm !== null && $remainingKm <= $item['warning_km']) ||
            ($remainingDays !== null && $remainingDays <= 14)
        ) {
            $status = 'Mendekati Jadwal';
            $statusClass = 'warning';
            $recommendation = 'Siapkan jadwal servis dalam waktu dekat agar perawatan tidak melewati batas ideal.';
        } else {
            $status = 'Aman';
            $statusClass = 'safe';
            $recommendation = 'Kondisi masih aman. Tetap pantau kilometer dan lakukan pengecekan berkala.';
        }

        return [
            'name' => $item['name'],
            'last_date' => $lastDate ? Carbon::parse($lastDate)->format('d-m-Y') : '-',
            'last_km' => $lastKm !== null ? number_format($lastKm, 0, ',', '.') . ' km' : '-',
            'next_date' => $nextDate ? $nextDate->format('d-m-Y') : '-',
            'next_km' => $nextKm !== null ? number_format($nextKm, 0, ',', '.') . ' km' : '-',
            'remaining_km' => $remainingKm !== null ? number_format($remainingKm, 0, ',', '.') . ' km' : '-',
            'remaining_days' => $remainingDays !== null ? $remainingDays . ' hari' : '-',
            'status' => $status,
            'status_class' => $statusClass,
            'recommendation' => $recommendation,
            'benefit' => $item['benefit'],
        ];
    }
}
