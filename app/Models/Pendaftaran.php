<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'NIK', // tambahkan NIK jika ada kolom NIK di database
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'kota',
        'alamat',
        'hobi',
        'foto',
    ];
}
