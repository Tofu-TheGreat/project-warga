<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_warga';
    protected $table = 'warga';
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'id_user',
        'agama',
        'tanggal_lahir',
        'jenis_kelamin',
        'foto',
        'id_pekerjaan',
        'status_perkawinan',
        'status_kependudukan',
        'kewarganegaraan',
        'nomor_telpon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id_pekerjaan');
    }
}
