<?php

namespace App\Exports;

use App\Models\Warga;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;


class RtExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function collection()
    {
        return User::where('peran', 'rt')->get(); // Gantikan YourModel dengan model yang sesuai    }
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'NIK',
            'Alamat',
            'Nomor',
            'Agama',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Nama Pekerjaan',
            'Status Perkawinan',
            'Status Kependudukan',
            'Kewarganegaraan',
            'Nomor Telpon',
            'Tanggal Dibuat',
            'Tanggal Perubahan Terakhir',
            // Add more headings if needed
        ];
    }

    public function query()
    {
        return User::query();
    }

    public function map($row): array
    {
        // Manipulasi data sebelum ditampilkan di Excel
        return [
            $row->id_user,
            $row->nama_lengkap,
            $row->nik,
            $row->alamat,
            $row->nomor,
            $this->convertAgama($row->agama),
            $row->tanggal_lahir,
            ($row->jenis_kelamin === 'L') ? 'Laki-Laki' : 'Perempuan',
            ($row->id_pekerjaan === null) ? 'RT' : 'Tidak ada',
            $this->convertstatusperkawinan($row->status_perkawinan),
            ($row->status_kependudukan === '0') ? 'Menetap' : 'Berkunjung',
            ($row->kewarganegaraan === '0') ? 'WNI' : 'WNA',
            $row->nomor_telpon,
            $row->created_at,
            $row->updated_at,
        ];
    }
    private function convertAgama($agama)
    {
        switch ($agama) {
            case 0:
                return 'Islam';
            case 1:
                return 'Kristen Protestan';
            case 2:
                return 'Kristen Katolik';
            case 3:
                return 'Khonghucu';
            case 4:
                return 'Hindu';
            case 5:
                return 'Buddha';
                // Tambahkan case lain jika ada lebih banyak nilai untuk agama
            default:
                return 'Tidak Diketahui';
        }
    }
    private function convertstatusperkawinan($status_perkawinan)
    {
        switch ($status_perkawinan) {
            case 0:
                return 'Sudah Menikah';
            case 1:
                return 'Belum Menikah';
            case 2:
                return 'Bercerai';
                // Tambahkan case lain jika ada lebih banyak nilai untuk agama
            default:
                return 'Tidak Diketahui';
        }
    }
}
