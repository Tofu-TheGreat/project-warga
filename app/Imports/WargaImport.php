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
                'agama' => $this->transformAgama($row['Agama']),
                'tanggal_lahir' => $row['Tanggal Lahir'],
                'jenis_kelamin' => $this->transformJenisKelamin($row['Jenis Kelamin']),
                'status_perkawinan' => $this->transformStatusKawin($row['Status Perkawinan']),
                'status_kependudukan' => $this->transformStatusKependudukan($row['Status Kependudukan']),
                'kewarganegaraan' => $this->transformKewarganegaraan($row['Kewarganegaraan']),
                'nomor_telpon' => $row['Nomor Telpon'],
                // Tambahkan atribut lain sesuai kebutuhan
            ]
        );
    }
    private function transformAgama($agama)
    {
        // Lakukan transformasi sesuai dengan logika yang Anda inginkan
        // Misalnya, jika RT-22 adalah kode '2' di database, maka:
        switch ($agama) {
            case 'Islam':
                return '0';
            case 'Kristen Protestan':
                return '1';
            case 'Kristen Katolik':
                return '2';
            case 'Khonghucu':
                return '3';
            case 'Hindu':
                return '4';
            case 'Buddha':
                return '5';
                // Tambahkan case lain jika ada nilai lain yang perlu diubah
            default:
                return $agama;
        }
    }
    private function transformJenisKelamin($jk)
    {
        // Lakukan transformasi sesuai dengan logika yang Anda inginkan
        // Misalnya, jika RT-22 adalah kode '2' di database, maka:
        switch ($jk) {
            case 'Laki-Laki':
                return 'L';
            case 'Perempuan':
                return 'P';
            case 'Laki Laki':
                return 'L';
                // Tambahkan case lain jika ada nilai lain yang perlu diubah
            default:
                return $jk;
        }
    }
    private function transformStatusKawin($sk)
    {
        // Lakukan transformasi sesuai dengan logika yang Anda inginkan
        // Misalnya, jika RT-22 adalah kode '2' di database, maka:
        switch ($sk) {
            case 'Sudah Menikah':
                return '0';
            case 'Belum Menikah':
                return '1';
            case 'Bercerai':
                return '2';
                // Tambahkan case lain jika ada nilai lain yang perlu diubah
            default:
                return $sk;
        }
    }
    private function transformStatusKependudukan($sk)
    {
        // Lakukan transformasi sesuai dengan logika yang Anda inginkan
        // Misalnya, jika RT-22 adalah kode '2' di database, maka:
        switch ($sk) {
            case 'Menetap':
                return '0';
            case 'Berkunjung':
                return '1';
            default:
                return $sk;
        }
    }
    private function transformKewarganegaraan($kwg)
    {
        // Lakukan transformasi sesuai dengan logika yang Anda inginkan
        // Misalnya, jika RT-22 adalah kode '2' di database, maka:
        switch ($kwg) {
            case 'WNI':
                return '0';
            case 'WNA':
                return '1';
            default:
                return $kwg;
        }
    }
}
