<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('id_vehicle')->autoIncrement();
            $table->string('no_polisi')->unique();
            $table->string('kepemilikan_kendaraan');
            $table->string('jenis_kendaraan');
            $table->string('status_kendaraan');
            $table->date('tanggal_service_terakhir');
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id_booking')->autoIncrement();
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->string('lokasi_pemesan');
            $table->string('jenis_kendaraan');
            $table->string('no_polisi');
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_penggunaan');
            $table->date('tanggal_pengembalian');
            $table->string('nama_driver');
            $table->string('approval1');
            $table->string('status_approval1');
            $table->string('approval2');
            $table->string('status_approval2');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('approvals', function (Blueprint $table) {
            $table->id('id_approval')->autoIncrement();
            $table->unsignedBigInteger('id_booking');
            $table->foreign('id_booking')->references('id_booking')->on('bookings');
            $table->string('status_approval');
            $table->date('tanggal_approval');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('driver', function (Blueprint $table) {
            $table->id('id_driver')->autoIncrement(); 
            $table->string('nama_driver');
            $table->string('no_hp');
            $table->string('status_driver');
            $table->timestamps();
        });

        Schema::create('history', function (Blueprint $table) {
            $table->id('id_history')->autoIncrement();
            $table->unsignedBigInteger('id_booking');
            $table->foreign('id_booking')->references('id_booking')->on('bookings');
            $table->unsignedBigInteger('id_driver');
            $table->foreign('id_driver')->references('id_driver')->on('driver');
            $table->string('nama_driver');
            $table->string('lokasi_driver');
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_penggunaan');
            $table->date('tanggal_pengembalian');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('service', function (Blueprint $table) {
            $table->id('id_service')->autoIncrement();
            $table->unsignedBigInteger('id_vehicle');
            $table->foreign('id_vehicle')->references('id_vehicle')->on('vehicles');
            $table->date('tanggal_service');
            $table->string('jenis_service');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('fuel_history', function (Blueprint $table) {
            $table->id('id_fuel')->autoIncrement();
            $table->unsignedBigInteger('id_vehicle');
            $table->foreign('id_vehicle')->references('id_vehicle')->on('vehicles');
            $table->date('tanggal_isi');
            $table->string('jenis_bbm');
            $table->string('jumlah');
            $table->string('harga');
            $table->string('total');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
