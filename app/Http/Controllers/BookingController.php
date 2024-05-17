<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\DriverModel;
use App\Models\VehicleModel;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = BookingModel::all();
        $manager = UserModel::where('role', 'manager')->get();
        $director = UserModel::where('role', 'director')->get();
        $driver = DriverModel::where('status_driver', 'Tersedia')->get();
        $vehicles = VehicleModel::where('status_kendaraan', 'tersedia')->get();
        return view('booking', compact('bookings', 'manager', 'director', 'driver', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'lokasi_pemesan' => 'required',
            'no_polisi' => 'required',
            'kepemilikan_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'tanggal_pemesanan' => 'required',
            'tanggal_penggunaan' => 'required',
            'tanggal_pengembalian' => 'required',
            'nama_driver' => 'required',
            'approval1' => 'required',
            'status_approval1' => 'required',
            'approval2' => 'required',
            'status_approval2' => 'required',
            'keterangan' => 'required'
        ]);

        BookingModel::create($request->all());
        if ($request){
            return redirect('bookings')->with(['success' => 'Data booking berhasil disimpan']);
        } else {
            return redirect('bookings')->with(['error' => 'Data booking gagal disimpan']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'lokasi_pemesan' => 'required',
            'no_polisi' => 'required',
            'kepemilikan_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'tanggal_pemesanan' => 'required',
            'tanggal_penggunaan' => 'required',
            'tanggal_pengembalian' => 'required',
            'approval1' => 'required',
            'status_approval1' => 'required',
            'approval2' => 'required',
            'status_approval2' => 'required',
            'keterangan' => 'required'
        ]);

        $booking = BookingModel::find($id);
        $booking->update($request->all());
        if ($booking) {
            return redirect('bookings')->with(['success' => 'Data booking berhasil diupdate']);
        } else {
            return redirect('bookings')->with(['error' => 'Data booking gagal diupdate']);
        }
    }

    public function destroy($id)
    {
        $booking = BookingModel::find($id);
        $booking->delete();
        if ($booking) {
            return redirect('bookings')->with('success', 'Booking deleted successfully');
        } else {
            return redirect('bookings')->with('error', 'Booking not found');
        }
    }

    public function getDetailVehicle(Request $request)
    {
        $no_polisi = $request->no_polisi;
        // $vehicle = VehicleModel::where('no_polisi', $no_polisi)->first();
        // where no_polisi and status_kendaraan tersedia
        $vehicle = VehicleModel::where('no_polisi', $no_polisi)->where('status_kendaraan', 'tersedia')->first();

        if ($vehicle) {
            $data = [
                'kepemilikan_kendaraan' => $vehicle->kepemilikan_kendaraan,
                'jenis_kendaraan' => $vehicle->jenis_kendaraan,
            ];

            return response()->json($data);
        }

        return response()->json(['message' => 'Data not found'], 404);
    }
}
