<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverModel extends Model
{
    use HasFactory;
    protected $table = 'driver';
    protected $guarded = ['id_driver'];
    protected $primaryKey = 'id_driver';
    protected $fillable = [
        'nama_driver',
        'no_hp',
        'status_driver'
    ];
}
