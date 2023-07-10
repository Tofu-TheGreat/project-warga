<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //Halaman Login
    public function login_page()
    {
        //return
    }
    //END
    //Halaman Register
    public function register_page()
    {
        //return
    }
    //END
    //Halaman menampilkan warga
    public function show_warga($id_user)
    {
        $warga = Warga::where('id_user', $id_user)
            ->get();
    }

    //END
    //Halaman menampilkan kumpulan pekerjaan
    public function show_pekerjaan()
    {
        $pekerjaan = Pekerjaan::select('*')
            ->get();
        return view('admin.pages.data_pekerjaan.data_pekerjaan', compact('pekerjaan'));
    }

    //END
    //Halaman menampilkan rt
    public function show_rt()
    {
        $user = User::select('*')
            ->where('peran', 'rt')
            ->get();
        return view('admin.pages.data_rt.data_rt', compact('user'));
    }
    //END 
    //Halaman menampilkan detail rt
    public function detail_rt($id_user)
    {
        $user = User::where('id_user', $id_user)
            ->where('peran', 'rt')
            ->get();
        return view('admin.pages.data_rt.detail_rt', compact('user'));
    }
    //END
    //Halaman menampilkan detail rt
    public function edit_rt($id_user)
    {
        $user = User::where('id_user', $id_user)
            ->where('peran', 'rt')
            ->get();
        return view('admin.pages.data_rt.edit_rt', compact('user'));
    }
    //END

    //Halaman menampilkan tambah pekerjaan
    public function tambahpekerjaan_page()
    {
        //return
    }
    //END
    //Halaman menampilkan tambah rt
    public function tambahrt_page()
    {
        //return
    }
    //END
    //Halaman menampilkan ubah rt
    public function ubahrt_page()
    {
        //return
    }
    //END
    //Halaman menampilkan tambah warga
    public function tambahwarga_page()
    {
        //return
    }
    //END
    //Halaman menampilkan ubah rt
    public function ubahwarga_page()
    {
        //return
    }
    //END
}
