<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Hash;



class RtController extends Controller
{
    //ADD Pekerjaan
    public function create_pekerjaan(Request $request)
    {
        $request->validate([

            'nama_pekerjaan' => 'required'
        ]);

        $pekerjaan = new Pekerjaan([
            'nama_pekerjaan' => $request->nama_pekerjaan
        ]);
        //return
    }
    //END
    //UPDATE Pekerjaan
    public function edit_pekerjaan(Request $request)
    {
        $pekerjaan = Pekerjaan::where('id', $request->id)
            ->update([
                'nama_pekerjaan' => $request->nama_pekerjaan
            ]);
        //return
    }
    //END
    //DELETE Pekerjaan
    public function delete_pekerjaan(Request $request)
    {
        $pekerjaan = Pekerjaan::where('id', $request->id)
            ->delete();
        //return
    }
    //END


    //ADD warga
    public function create_warga(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|max:16',
            'alamat' => 'required',
            'id_user' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'id_pekerjaan' => 'required',
            'status_perkawinan' => 'required',
            'status_kependudukan' => 'required',
            'kewarganegaraan' => 'required',
            'nomor_telpon' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $nama_foto = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('image_save'), $nama_foto);
            $user = new Warga([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'id_user' => $request->id_user,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_pekerjaan' => $request->id_pekerjaan,
                'status_perkawinan' => $request->status_perkawinan,
                'status_kependudukan' => $request->status_kependudukan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
                'foto' => $nama_foto,
            ]);
            $user->save();
            return redirect()->intended('/data_warga');
            // dd($user);
        } else {
            $warga = new Warga([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'id_user' => $request->id_user,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_pekerjaan' => $request->id_pekerjaan,
                'status_perkawinan' => $request->status_perkawinan,
                'status_kependudukan' => $request->status_kependudukan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
            ]);
            $warga->save();
            return redirect()->intended('/data_warga');
        }

        //return
    }
    //END
    //UPDATE warga 
    public function edit_warga(Request $request)
    {
        $warga = Warga::where('id', $request->id)
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'id_user' => $request->id_user,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'status_perkawinan' => $request->status_perkawinan,
                'status_kependudukan' => $request->status_kependudukan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
            ]);
        //return
    }
    //END
    //DELETE RT START
    public function delete_warga(Request $request)
    {
        $warga = Warga::where('id', $request->id)
            ->delete();
        //return
    }
    //END
}
