<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'agama',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_pekerjaan',
        'status_perkawinan',
        'status_kependudukan',
        'peran',
        'kewarganegaraan',
        'nomor_telpon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}