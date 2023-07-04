<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


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
            'nomor' => 'required',
            'status_perkawinan' => 'required',
            'status_kependudukan' => 'required',
            'kewarganegaraan' => 'required',
            'nomor_telpon' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $nama_foto = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('image_save'), $nama_foto);
            $user = new User([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'foto' => $nama_foto,
                'status_perkawinan' => $request->status_perkawinan,
                'status_kependudukan' => $request->status_kependudukan,
                'peran' => $request->peran,
                'nomor' => $request->nomor,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
                'password' => Hash::make($request->password),
            ]);
            $user->save();
            return redirect()->intended('/datart');
            // dd($user);
        } else {
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
                'nomor' => $request->nomor,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
                'password' => Hash::make($request->password),
            ]);
            $user->save();
            return redirect()->intended('/datart');
            // dd($user);
        }
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
                'peran' => 'Rt',
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
