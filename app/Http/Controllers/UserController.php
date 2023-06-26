<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register_admin(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|max:16',
            'alamat' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'id_pekerjaan' => 'required',
            'status_perwakinan' => 'required',
            'status_kependudukan' => 'required',
            'peran' => 'required',
            'kewarganegaraan' => 'required',
            'nomor_telpon' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
    }
}
