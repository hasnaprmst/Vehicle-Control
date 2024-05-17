<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\DriverModel;
use App\Models\VehicleModel;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = BookingModel::all();
        // nama user yang login

        $manager = UserModel::where('role', 'manager')->get();
        $director = UserModel::where('role', 'director')->get();
        $driver = DriverModel::where('status_driver', 'Tersedia')->get();
        $vehicles = VehicleModel::where('status_kendaraan', 'tersedia')->get();
        return view('dashboard', compact('bookings', 'manager', 'director', 'driver', 'vehicles'));
    }

    public function getData()
    {
        $driver = DriverModel::all();
        $driver_available = DriverModel::where('status_driver', 'Tersedia')->count();
        $driver_unavailable = DriverModel::where('status_driver', 'Tidak Tersedia')->count();

        $data = [
            'driver_available' => $driver_available,
            'driver_unavailable' => $driver_unavailable
        ];
    }
}
