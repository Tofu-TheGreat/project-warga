<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Warga;
use Maatwebsite\Excel\Concerns\ToModel;

class WargaImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return Warga::firstOrCreate(
            // Kolom yang digunakan sebagai kriteria untuk pencocokan data
            ['nik' => $row['NIK']],
            // Data yang akan disimpan
            [
                'id_warga' => $row['ID'],
                'nama_lengkap' => $row['Nama Lengkap'],
                'nik' => $row['NIK'],
                'alamat' => $row['Alamat'],
                'id_user' => $row['RT'],
                'agama' => $row['Agama'],
                'tanggal_lahir' => $row['Tanggal Lahir'],
                'jenis_kelamin' => $row['Jenis Kelamin'],
                'id_pekerjaan' => $row['Nama Pekerjaan'],
                'status_perkawinan' => $row['Status Perkawinan'],
                'status_kependudukan' => $row['Status Kependudukan'],
                'kewarganegaraan' => $row['Kewarganegaraan'],
                'nomor_telpon' => $row['Nomor Telpon'],
                // Tambahkan atribut lain sesuai kebutuhan
            ]
        );
    }
}
