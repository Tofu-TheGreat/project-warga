<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RwController extends Controller
{

    //ADD RT START
    public function create_rt(Request $request)
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
            'peran' => 'rt',
            'kewarganegaraan' => $request->kewarganegaraan,
            'nomor_telpon' => $request->nomor_telpon,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
    }
    //END

    //UPDATE RT START
    public function edit_rt(Request $request)
    {
        $user = User::where('id', $request->id)
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'status_perkawinan' => $request->status_perkawinan,
                'status_kependudukan' => $request->status_kependudukan,
                'peran' => 'rt',
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
                'password' => $request->password,
            ]);
        //return
    }
    //END

    //DELETE RT START
    public function delete_rt(Request $request)
    {
        $user = User::where('id', $request->id)
            ->delete();
    }
    //END
}
