<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Exports\RtExport;
use App\Exports\WargaAllExport;
use App\Imports\WargaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\YourExport;

class ExcelController extends Controller
{
    public function export_warga($id_user)
    {
        $export = new YourExport($id_user);
        return Excel::download($export, 'daftar_warga.xlsx');
    }
    public function export_rt()
    {
        return Excel::download(new RtExport, 'daftar_rt.xlsx'); // Gantikan nama_file.xlsx dengan nama file Excel yang ingin diekspor
    }
    public function export_warga_all()
    {
        return Excel::download(new WargaAllExport, 'daftar_warga_all.xlsx'); // Gantikan nama_file.xlsx dengan nama file Excel yang ingin diekspor
    }
    //IMPORT
    public function import_warga(Request $request)
    {
        // dd($request->file('file'));
        $file = $request->file('file');

        Excel::import(new WargaImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }
}
