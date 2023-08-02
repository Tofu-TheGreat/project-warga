<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Warga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WargaImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Warga(
            [
                'id_warga' => $row['id_warga'],
                'nama_lengkap' => $row['nama_lengkap'],
                'nik' => $row['nik'],
                'alamat' => $row['alamat'],
                'agama' => $this->transformAgama($row['agama']),
                'tanggal_lahir' => $row['tanggal_lahir'],
                'jenis_kelamin' => $this->transformJenisKelamin($row['jenis_kelamin']),
                'status_perkawinan' => $this->transformStatusKawin($row['status_perkawinan']),
                'status_kependudukan' => $this->transformStatusKependudukan($row['status_kependudukan']),
                'kewarganegaraan' => $this->transformKewarganegaraan($row['kewarganegaraan']),
                'nomor_telpon' => $row['nomor_telpon'],
                'id_user' => $row['id_user'],
                'id_pekerjaan' => $row['id_pekerjaan'],
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
