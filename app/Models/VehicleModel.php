<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $guarded = ['id_vehicle'];
    protected $primaryKey = 'id_vehicle';
    protected $fillable = [
        'no_polisi',
        'kepemilikan_kendaraan',
        'jenis_kendaraan',
        'status_kendaraan',
        'tanggal_service_terakhir'
    ];
}
