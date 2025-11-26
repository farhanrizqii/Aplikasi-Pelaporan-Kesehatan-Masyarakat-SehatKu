<?php

namespace App\Exports;

use App\Models\RiwayatKesehatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RiwayatKesehatanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    /**
     * Ambil semua data riwayat kesehatan dengan relasi
     */
    public function collection()
    {
        return RiwayatKesehatan::with(['penduduk', 'kategoriPenyakit'])
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->get();
    }
    
    /**
     * Header kolom Excel
     */
    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama Penduduk',
            'Wilayah',
            'Usia',
            'Penyakit',
            'Tanggal Pemeriksaan',
            'Jenis Pemeriksaan',
            'Status/Hasil',
            'Keterangan Diagnosa/Tindakan'
        ];
    }
    
    /**
     * Mapping data ke baris Excel
     */
    public function map($riwayat): array
    {
        static $no = 0;
        $no++;
        
        return [
            $no,
            $riwayat->penduduk->nik ?? 'N/A',
            $riwayat->penduduk->nama_lengkap ?? 'N/A',
            $riwayat->penduduk->wilayah->kelurahan ?? 'N/A',
            $riwayat->penduduk->usia ?? '-',
            $riwayat->kategoriPenyakit->nama_penyakit ?? 'Tidak Dikenal',
            \Carbon\Carbon::parse($riwayat->tanggal_pemeriksaan)->format('d/m/Y'),
            $riwayat->jenis_pemeriksaan ?? '-',
            $riwayat->hasil ?? '-',
            $riwayat->tindakan ?? '-'
        ];
    }

    /**
     * Styling untuk Excel
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header (baris 1)
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['rgb' => 'FFFFFF']
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '007bff']
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    /**
     * Lebar kolom
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,   // No
            'B' => 18,  // NIK
            'C' => 25,  // Nama Penduduk
            'D' => 20,  // Wilayah
            'E' => 8,   // Usia
            'F' => 25,  // Penyakit
            'G' => 18,  // Tanggal Pemeriksaan
            'H' => 20,  // Jenis Pemeriksaan
            'I' => 15,  // Status/Hasil
            'J' => 35,  // Keterangan
        ];
    }
}