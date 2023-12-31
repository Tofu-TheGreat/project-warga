<?php

namespace App\Exports;

use App\Models\Warga;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WargaAllExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Warga::all(); // Gantikan YourModel dengan model yang sesuai    }
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'NIK',
            'Alamat',
            'RT',
            'Agama',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Umur',
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
        return Warga::query();
    }

    public function map($row): array
    {
        // Manipulasi data sebelum ditampilkan di Excel
        return [
            $row->id_warga,
            $row->nama_lengkap,
            $row->nik,
            $row->alamat,
            $row->user->nama_lengkap . " | " . $row->user->nomor,
            $this->convertAgama($row->agama),
            $row->tanggal_lahir,
            ($row->jenis_kelamin === 'L') ? 'Laki-Laki' : 'Perempuan',
            $this->calculateAge($row->tanggal_lahir),
            $row->pekerjaan->nama_pekerjaan,
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
    private function calculateAge($birthdate)
    {
        $tanggalLahir = Carbon::parse($birthdate);
        $umur = $tanggalLahir->diffInYears(Carbon::now());
        return $umur;
    }
}
