<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pekerjaan';
    protected $table = 'pekerjaan';
    protected $fillable = ['nama_pekerjaan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pekerjaan');
    }
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'id_pekerjaan');
    }
}
