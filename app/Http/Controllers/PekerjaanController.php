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
}
