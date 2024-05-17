<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $guarded = ['id_booking'];
    protected $primaryKey = 'id_booking';
    protected $fillable = [
        'nama_pemesan',
        'no_hp',
        'lokasi_pemesan',
        'no_polisi',
        'kepemilikan_kendaraan', 
        'jenis_kendaraan',
        'tanggal_pemesanan',
        'tanggal_penggunaan',
        'tanggal_pengembalian',
        'nama_driver',
        'approval1',
        'status_approval1',
        'approval2',
        'status_approval2',
        'keterangan'
    ];
}
