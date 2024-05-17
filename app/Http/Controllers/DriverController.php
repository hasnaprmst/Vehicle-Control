<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriverModel;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = DriverModel::all();
        return view('drivers-management', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_driver' => 'required',
            'no_hp' => 'required',
            'status_driver' => 'required',
        ]);

        DriverModel::create($request->all());
        if ($request){
            return redirect('drivers')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect('drivers')->with(['error' => 'Data gagal disimpan']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_driver' => 'required',
            'no_hp' => 'required',
            'status_driver' => 'required',
        ]);

        $driver = DriverModel::find($id);
        $driver->update($request->all());
        if ($driver) {
            return redirect('drivers')->with(['success' => 'Data berhasil diupdate']);
        } else {
            return redirect('drivers')->with(['error' => 'Data gagal diupdate']);
        }
    }

    public function destroy($id)
    {
        $driver = DriverModel::find($id);
        if ($driver) {
            $driver->delete();
            return redirect('drivers')->with('success', 'Driver deleted successfully');
        } else {
            return redirect('drivers')->with('error', 'Driver not found');
        }
    }
}
