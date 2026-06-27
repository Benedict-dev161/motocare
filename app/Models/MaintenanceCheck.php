<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceCheck extends Model
{
    protected $fillable = [
        'motor_name',
        'year',
        'fuel_type',
        'current_km',

        'last_engine_oil_date',
        'last_engine_oil_km',

        'last_gear_oil_date',
        'last_gear_oil_km',

        'last_service_date',
        'last_service_km',

        'last_cvt_date',
        'last_cvt_km',

        'last_air_filter_date',
        'last_air_filter_km',

        'last_spark_plug_date',
        'last_spark_plug_km',

        'last_brake_check_date',
        'last_brake_check_km',

        'last_tire_check_date',
        'last_tire_check_km',

        'workshop_name',
        'last_service_cost',
        'notes',
    ];

    protected $casts = [
        'last_engine_oil_date' => 'date',
        'last_gear_oil_date' => 'date',
        'last_service_date' => 'date',
        'last_cvt_date' => 'date',
        'last_air_filter_date' => 'date',
        'last_spark_plug_date' => 'date',
        'last_brake_check_date' => 'date',
        'last_tire_check_date' => 'date',
    ];
}
