<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = VehicleModel::all();
        return view('vehicles-management', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|unique:vehicles',
            'kepemilikan_kendaraan' => 'required', 
            'jenis_kendaraan' => 'required',
            'status_kendaraan' => 'required',
            'tanggal_service_terakhir' => 'required',
        ]);

        VehicleModel::create($request->all());
        if ($request){
            return redirect('vehicles')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect('vehicles')->with(['error' => 'Data gagal disimpan']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_polisi' => 'required',
            'kepemilikan_kendaraan' => 'required', 
            'jenis_kendaraan' => 'required',
            'status_kendaraan' => 'required',
            'tanggal_service_terakhir' => 'required',
        ]);

        $vehicle = VehicleModel::find($id);
        dd($vehicle, $request->all());
        $vehicle->update($request->all());
        if ($vehicle) {
            return redirect('vehicles')->with(['success' => 'Data berhasil diupdate']);
        } else {
            return redirect('vehicles')->with(['error' => 'Data gagal diupdate']);
        }
    }

    public function destroy($id)
    {
        $vehicle = VehicleModel::find($id);
        if ($vehicle) {
            $vehicle->delete();
            return redirect('vehicles')->with('success', 'Vehicle deleted successfully');
        } else {
            return redirect('vehicles')->with('error', 'Vehicle not found');
        }
    }
}
