<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //Register Create USer Start
    public function register_admin(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|max:16',
            'alamat' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'status_kependudukan' => 'required',
            'peran' => 'required',
            'kewarganegaraan' => 'required',
            'nomor_telpon' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'status_kependudukan' => $request->status_kependudukan,
            'peran' => $request->peran,
            'kewarganegaraan' => $request->kewarganegaraan,
            'nomor_telpon' => $request->nomor_telpon,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
    }
    //END

    //Login start
    public function login(Request $request)
    {
        $credential = $request->validate([
            'nomor_telpon' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credential)) {
            $request->session()->regenerate();
            if (auth()->user()->peran == 'rw') {
                // dd();
                return redirect()->intended('/datart');
            } else if (auth()->user()->peran == 'rt') {
                //return
            }
        } else {
            return redirect()->intended('/login')
                ->with('error', 'Nomor Telepon atau Password Salah!.');
        }
    }
    //END


}
