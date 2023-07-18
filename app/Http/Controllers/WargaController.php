<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
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
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $nama_foto = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('image_save'), $nama_foto);
            $warga = new Warga([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'id_user' => $request->id_user,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'foto' => $nama_foto,
                'id_pekerjaan' => $request->id_pekerjaan,
                'status_perkawinan' => $request->status_perkawinan,
                'status_kependudukan' => $request->status_kependudukan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nomor_telpon' => $request->nomor_telpon,
            ]);
            $warga->save();
            return back();
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
            return back();
        }

        //return
    }

    public function delete_warga(Request $request, $id_warga)
    {
        $user = Warga::where('id_warga', $request->id_warga)->first();
        // Hapus foto lama jika ada
        if ($user->foto != null) {
            $fotoPath = public_path('image_save/') . $user->foto;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $user = Warga::where('id_warga', $id_warga)
            ->delete();

        return back();
    }

    public function edit_warga(Request $request)
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
            // Hapus foto lama jika ada
            $user = Warga::where('id_warga', $request->id_warga)->first();
            // Hapus foto lama jika ada
            if ($user != null && $user->foto != null) {
                $fotoPath = public_path('image_save/') . $user->foto;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }


            $nama_foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image_save'), $nama_foto);

            $warga = Warga::where('id_warga', $request->id_warga)
                ->update([
                    'nama_lengkap' => $request->nama_lengkap,
                    'nik' => $request->nik,
                    'alamat' => $request->alamat,
                    'id_user' => $request->id_user,
                    'agama' => $request->agama,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'foto' => $nama_foto,
                    'id_pekerjaan' => $request->id_pekerjaan,
                    'status_perkawinan' => $request->status_perkawinan,
                    'status_kependudukan' => $request->status_kependudukan,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'nomor_telpon' => $request->nomor_telpon,
                ]);

            // dd($user);
        } else {
            $warga = Warga::where('id_warga', $request->id_warga)
                ->update([
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

            // dd($user);
        }
        return redirect()->intended('/detail_warga' . '/' . $request->id_warga);
    }
}
