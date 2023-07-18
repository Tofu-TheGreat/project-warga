<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function profile()
    {
        return view('pages.profile')->with('title', 'Profile');
    }

    public function ubah_password()
    {
        return view('pages.ubah-password')->with('title', 'Ubah-Password');
    }

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
    public function dashboard()
    {
        $rt = User::select('*')->where('peran', 'rt')->count();
        $datart = User::select('*')->where('peran', 'rt')->limit(5)->get();
        $datawarga = Warga::get();
        $warga = Warga::all()->count();
        $pekerjaan = Pekerjaan::all()->count();
        return view('admin.pages.dashboard', compact('rt', 'warga', 'pekerjaan', 'datart', 'datawarga'))->with('title', 'Dashboard');
    }
    public function show_warga($id_user)
    {
        $warga = User::find($id_user)
            ->warga()
            ->where('id_user', $id_user)
            ->get();
        $count = User::find($id_user)
            ->warga()
            ->where('id_user', $id_user)
            ->count();

        $nomor = User::select('nomor')
            ->where('id_user', $id_user)
            ->get();
        $pekerjaan = Pekerjaan::select('*')
            ->get();
        $rt = User::where('peran', 'rt')
            ->get();
        return view('admin.pages.data_warga.data_warga', compact('warga', 'pekerjaan', 'rt', 'nomor', 'count'))->with('title', 'Data Warga');
    }
    public function show_warga_all()
    {
        $warga = Warga::all();
        $count = Warga::all()
            ->count();


        $pekerjaan = Pekerjaan::select('*')
            ->get();
        $rt = User::where('peran', 'rt')
            ->get();
        return view('admin.pages.data_warga.data_warga_all', compact('warga', 'pekerjaan', 'rt', 'count'))->with('title', 'Data Warga');
    }

    public function detail_warga($id_warga)
    {
        $warga = Warga::where('id_warga', $id_warga)
            ->get();

        foreach ($warga as $wargaBaru) {
            $pekerjaan = Pekerjaan::where('id_pekerjaan', $wargaBaru['id_pekerjaan'])->get();
            foreach ($pekerjaan as $pekerjaanWarga1) {
                $pekerjaanWarga = $pekerjaanWarga1["nama_pekerjaan"];
            }
        }

        return view('admin.pages.data_warga.detail_warga', compact('warga', 'pekerjaanWarga'))->with('title', 'Detail Warga');
    }
    public function edit_warga($id_warga)
    {
        $warga = Warga::where('id_warga', $id_warga)
            ->get();
        $pekerjaan = Pekerjaan::all();
        $rt = User::where('peran', 'rt')
            ->get();
        return view('admin.pages.data_warga.edit_warga', compact('warga', 'pekerjaan', 'rt'))->with('title', 'Edit Warga');
    }


    //END
    //Halaman menampilkan kumpulan pekerjaan
    public function show_pekerjaan()
    {
        $pekerjaan = Pekerjaan::select('*')
            ->get();
        $count = Pekerjaan::select('*')
            ->count();
        return view('admin.pages.data_pekerjaan.data_pekerjaan', compact('pekerjaan', 'count'))->with('title', 'Data Pekerjaan');
    }

    //END
    //Halaman menampilkan detail pekerjaan
    public function detail_pekerjaan($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::where('id_pekerjaan', $id_pekerjaan)
            ->get();
        return view('admin.pages.data_pekerjaan.detail_pekerjaan', compact('pekerjaan'))->with('title', 'Detail Pekerjaan');
    }

    //END
    //Halaman menampilkan detail pekerjaan
    public function edit_pekerjaan($id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::where('id_pekerjaan', $id_pekerjaan)
            ->get();
        return view('admin.pages.data_pekerjaan.edit_pekerjaan', compact('pekerjaan'))->with('title', 'Edit Pekerjaan');
    }

    //END
    //Halaman menampilkan rt
    public function show_rt()
    {
        $user = User::select('*')
            ->where('peran', 'rt')
            ->get();
        $count = User::select('*')
            ->where('peran', 'rt')
            ->count();
        return view('admin.pages.data_rt.data_rt', compact('user', 'count'))->with('title', 'Data RT');
    }
    //END
    //Halaman menampilkan detail rt
    public function detail_rt($id_user)
    {
        $user = User::where('id_user', $id_user)
            ->where('peran', 'rt')
            ->get();
        return view('admin.pages.data_rt.detail_rt', compact('user'))->with('title', 'Detail RT');
    }
    //END
    //Halaman menampilkan detail rt
    public function edit_rt($id_user)
    {
        $this->authorize('rw');
        $user = User::where('id_user', $id_user)
            ->where('peran', 'rt')
            ->get();
        return view('admin.pages.data_rt.edit_rt', compact('user'))->with('title', 'Edit RT');
    }
    //END


}
