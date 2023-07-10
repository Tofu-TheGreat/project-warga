<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function create_pekerjaan(Request $request)
    {
        $request->validate([
            'nama_pekerjaan' => 'required'
        ]);
        $pekerjaan = new Pekerjaan([
            'nama_pekerjaan' => $request->nama_pekerjaan
        ]);
        $pekerjaan->save();
        return redirect()->intended('/data_pekerjaan');
    }
    public function edit_pekerjaan(Request $request)
    {
        $request->validate([
            'nama_pekerjaan' => 'required'
        ]);
        $pekerjaan = Pekerjaan::where('id_pekerjaan', $request->id_pekerjaan)
            ->update([
                'nama_pekerjaan' => $request->nama_pekerjaan
            ]);

        return redirect()->intended('/data_pekerjaan');
    }
    public function delete_pekerjaan(Request $request, $id_pekerjaan)
    {
        $pekerjaan = Pekerjaan::where('id_pekerjaan', $id_pekerjaan)
            ->delete();

        return redirect()->intended('/data_pekerjaan');
    }
}
