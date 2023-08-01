<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;


class RwController extends Controller
{

    //ADD RT START
    public function create_rt(Request $request)
    {
        $this->authorize('rw');
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
            dd($user);
            $user->save();
            return redirect()->intended('/datart');
            // dd($user);
        }
    }
    //END

    //UPDATE RT START
    public function edit_rt(Request $request)
    {
        $this->authorize('rw');
        $res = $request->validate([
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
        ]);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);




            // Hapus foto lama jika ada
            $user = User::where('id_user', $request->id_user)->first();
            // Hapus foto lama jika ada
            if ($user->foto != null) {
                $fotoPath = public_path('image_save/') . $user->foto;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $nama_foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image_save'), $nama_foto);

            $user = User::where('id_user', $request->id_user)
                ->update([
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
                ]);

            // dd($user);
        } else {
            $user = User::where('id_user', $request->id_user)
                ->update([
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
                ]);

            // dd($user);
        }
        return redirect()->intended('/datart');
    }
    //END

    //DELETE RT START
    public function delete_rt(Request $request, $id_user)
    {
        $this->authorize('rw');
        $user = User::where('id_user', $request->id_user)->first();
        // Hapus foto lama jika ada
        if ($user->foto != null) {
            $fotoPath = public_path('image_save/') . $user->foto;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $user = User::where('id_user', $id_user)
            ->delete();

        return redirect()->intended('/datart');
    }
    //END
    //DELETE RT START
    public function delete_rt_detail(Request $request, $id_user)
    {
        $this->authorize('rw');
        $user = User::where('id_user', $request->id_user)->first();
        // Hapus foto lama jika ada
        if ($user->foto != null) {
            $fotoPath = public_path('image_save/') . $user->foto;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $user = User::where('id_user', $id_user)
            ->delete();

        return redirect()->intended('/datart');
    }
    //END

    public function edit_profile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|max:16',
            'alamat' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'nomor' => 'required',
            'peran' => 'required',
            'status_perkawinan' => 'required',
            'status_kependudukan' => 'required',
            'kewarganegaraan' => 'required',
            'nomor_telpon' => 'required',

        ]);
        $cek = Hash::check($request->password_lama, auth()->user()->password);

        if ($request->password_lama != null) {
            if ($cek) {
                if ($request->password_baru != null) {
                    $auth_user = auth()->user(); // Mengambil user saat ini dari autentikasi Anda. Pastikan user telah diautentikasi sebelumnya.

                    $request->validate([
                        'password_lama' => ['required', function ($attribute, $value, $fail) use ($auth_user) {
                            if (!Hash::check($value, $auth_user->password)) {
                                $fail('Password lama tidak cocok dengan password yang tersimpan.');
                            }
                        }]
                    ]);
                    if ($request->hasFile('foto')) {
                        $request->validate([
                            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        ]);
                        // Hapus foto lama jika ada
                        $user = User::where('id_user', $request->id_user)->first();
                        // Hapus foto lama jika ada
                        if ($user->foto != null) {
                            $fotoPath = public_path('image_save/') . $user->foto;
                            if (file_exists($fotoPath)) {
                                unlink($fotoPath);
                            }
                        }

                        $nama_foto = time() . '.' . $request->foto->extension();
                        $request->foto->move(public_path('image_save'), $nama_foto);

                        $user = User::where('id_user', $request->id_user)
                            ->update([
                                'nama_lengkap' => $request->nama_lengkap,
                                'nik' =>   $request->nik,
                                'alamat' => $request->alamat,
                                'agama' => $request->agama,
                                'tanggal_lahir' => $request->tanggal_lahir,
                                'jenis_kelamin' => $request->jenis_kelamin,
                                'nomor' => $request->nomor,
                                'peran' => $request->peran,
                                'status_perkawinan' => $request->status_perkawinan,
                                'status_kependudukan' => $request->status_kependudukan,
                                'kewarganegaraan' => $request->kewarganegaraan,
                                'nomor_telpon' => $request->nomor_telpon,
                                'password' => Hash::make($request->password_baru),
                                'foto' => $nama_foto,
                            ]);
                    } else {
                        $user = User::where('id_user', $request->id_user)
                            ->update([
                                'nama_lengkap' => $request->nama_lengkap,
                                'nik' =>   $request->nik,
                                'alamat' => $request->alamat,
                                'agama' => $request->agama,
                                'tanggal_lahir' => $request->tanggal_lahir,
                                'jenis_kelamin' => $request->jenis_kelamin,
                                'nomor' => $request->nomor,
                                'peran' => $request->peran,
                                'status_perkawinan' => $request->status_perkawinan,
                                'status_kependudukan' => $request->status_kependudukan,
                                'kewarganegaraan' => $request->kewarganegaraan,
                                'nomor_telpon' => $request->nomor_telpon,
                                'password' => Hash::make($request->password_baru)
                            ]);
                    }

                    return redirect()->intended('/profile');
                } else {
                    if ($request->hasFile('foto')) {
                        $request->validate([
                            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        ]);
                        // Hapus foto lama jika ada
                        $user = User::where('id_user', $request->id_user)->first();
                        // Hapus foto lama jika ada
                        if ($user->foto != null) {
                            $fotoPath = public_path('image_save/') . $user->foto;
                            if (file_exists($fotoPath)) {
                                unlink($fotoPath);
                            }
                        }

                        $nama_foto = time() . '.' . $request->foto->extension();
                        $request->foto->move(public_path('image_save'), $nama_foto);

                        $user = User::where('id_user', $request->id_user)
                            ->update([
                                'nama_lengkap' => $request->nama_lengkap,
                                'nik' =>   $request->nik,
                                'alamat' => $request->alamat,
                                'agama' => $request->agama,
                                'tanggal_lahir' => $request->tanggal_lahir,
                                'jenis_kelamin' => $request->jenis_kelamin,
                                'nomor' => $request->nomor,
                                'peran' => $request->peran,
                                'status_perkawinan' => $request->status_perkawinan,
                                'status_kependudukan' => $request->status_kependudukan,
                                'kewarganegaraan' => $request->kewarganegaraan,
                                'nomor_telpon' => $request->nomor_telpon,
                                'foto' => $nama_foto,
                            ]);
                    } else {
                        $user = User::where('id_user', $request->id_user)
                            ->update([
                                'nama_lengkap' => $request->nama_lengkap,
                                'nik' =>   $request->nik,
                                'alamat' => $request->alamat,
                                'agama' => $request->agama,
                                'tanggal_lahir' => $request->tanggal_lahir,
                                'jenis_kelamin' => $request->jenis_kelamin,
                                'nomor' => $request->nomor,
                                'peran' => $request->peran,
                                'status_perkawinan' => $request->status_perkawinan,
                                'status_kependudukan' => $request->status_kependudukan,
                                'kewarganegaraan' => $request->kewarganegaraan,
                                'nomor_telpon' => $request->nomor_telpon,

                            ]);
                    }
                    return redirect()->intended('/profile');
                }
            } else {
                return back()->with('error', 'Password Lama Salah !!');
            }
        } else {
            return back()->with('error', 'Password Lama Harus di isi');
        }
    }
}
