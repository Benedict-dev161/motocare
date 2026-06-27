<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_checks', function (Blueprint $table) {
            $table->id();

            // Data motor
            $table->string('motor_name');
            $table->unsignedSmallInteger('year');
            $table->string('fuel_type');
            $table->unsignedInteger('current_km');

            // Oli mesin
            $table->date('last_engine_oil_date');
            $table->unsignedInteger('last_engine_oil_km');

            // Oli gardan
            $table->date('last_gear_oil_date')->nullable();
            $table->unsignedInteger('last_gear_oil_km')->nullable();

            // Servis berkala
            $table->date('last_service_date')->nullable();
            $table->unsignedInteger('last_service_km')->nullable();

            // CVT
            $table->date('last_cvt_date')->nullable();
            $table->unsignedInteger('last_cvt_km')->nullable();

            // Filter udara
            $table->date('last_air_filter_date')->nullable();
            $table->unsignedInteger('last_air_filter_km')->nullable();

            // Busi
            $table->date('last_spark_plug_date')->nullable();
            $table->unsignedInteger('last_spark_plug_km')->nullable();

            // Rem
            $table->date('last_brake_check_date')->nullable();
            $table->unsignedInteger('last_brake_check_km')->nullable();

            // Ban
            $table->date('last_tire_check_date')->nullable();
            $table->unsignedInteger('last_tire_check_km')->nullable();

            // Bengkel dan catatan
            $table->string('workshop_name')->nullable();
            $table->unsignedBigInteger('last_service_cost')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_checks');
    }
};
