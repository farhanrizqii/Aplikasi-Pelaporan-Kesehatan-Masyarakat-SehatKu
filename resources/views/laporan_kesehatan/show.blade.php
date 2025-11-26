<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Laporan Kesehatan') . ' - ' . \Carbon\Carbon::parse($laporanKesehatan->tanggal_laporan)->format('d/m/Y') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Data Card */
        .data-card {
            background: linear-gradient(135deg, #ffffff 0%, #f7f9fc 100%);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 30px; 
            transition: all 0.3s ease;
        }

        .dark .data-card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        /* Detail Content */
        .detail-content {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .dark .detail-content {
            background: #1f2937;
        }

        /* Title dengan icon */
        .detail-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #3b82f6;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dark .detail-title {
            color: #F3F4F6;
            border-bottom-color: #60a5fa;
        }

        .title-icon {
            color: #3b82f6;
            font-size: 1.5rem;
        }

        .dark .title-icon {
            color: #60a5fa;
        }

        /* Summary Box */
        .summary-box {
            background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
            border: 2px solid #3b82f6;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 2rem;
        }

        .dark .summary-box {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border-color: #60a5fa;
        }

        .summary-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dark .summary-title {
            color: #93C5FD;
        }

        .summary-icon {
            color: #3b82f6;
            font-size: 1.2rem;
        }

        .dark .summary-icon {
            color: #60a5fa;
        }

        /* Summary Grid */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .summary-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .summary-label {
            font-weight: 700;
            color: #1e40af;
            font-size: 0.875rem;
        }

        .dark .summary-label {
            color: #93C5FD;
        }

        .summary-value {
            color: #1F2937;
            font-size: 0.95rem;
        }

        .dark .summary-value {
            color: #E5E7EB;
        }

        .summary-description {
            grid-column: 1 / -1;
            margin-top: 0.5rem;
            padding-top: 1rem;
            border-top: 1px solid #93C5FD;
        }

        .dark .summary-description {
            border-top-color: #1e40af;
        }

        /* Detail Section */
        .detail-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #dc2626;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #dc2626;
        }

        .dark .section-title {
            color: #f87171;
            border-bottom-color: #f87171;
        }

        .section-icon {
            font-size: 1.2rem;
        }

        /* Table Styles */
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .custom-table thead {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .custom-table thead th {
            padding: 16px 24px;
            text-align: left;
            font-size: 0.875rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .custom-table tbody {
            background-color: white;
        }

        .dark .custom-table tbody {
            background-color: #1f2937;
        }

        .custom-table tbody tr {
            border-bottom: 1px solid #E5E7EB;
            transition: all 0.2s ease;
        }

        .dark .custom-table tbody tr {
            border-bottom-color: #374151;
        }

        .custom-table tbody tr:hover {
            background-color: #F9FAFB;
        }

        .dark .custom-table tbody tr:hover {
            background-color: #374151;
        }

        .custom-table tbody tr:last-child {
            border-bottom: none;
        }

        .custom-table tbody td {
            padding: 16px 24px;
            color: #1F2937;
            font-size: 0.95rem;
        }

        .dark .custom-table tbody td {
            color: #E5E7EB;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #6B7280;
        }

        .dark .empty-state {
            color: #9CA3AF;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        /* Buttons */
        .btn-action {
            border-radius: 10px;
            padding: 12px 24px; 
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-back {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(107, 114, 128, 0.3);
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(107, 114, 128, 0.4);
        }

        /* Button Container */
        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            padding-top: 1.5rem;
            margin-top: 1.5rem;
            border-top: 2px solid #E5E7EB;
        }

        .dark .action-buttons {
            border-top-color: #4B5563;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .detail-content {
                padding: 20px;
            }

            .detail-title {
                font-size: 1.5rem;
            }

            .custom-table {
                font-size: 0.875rem;
            }

            .custom-table thead th,
            .custom-table tbody td {
                padding: 12px 16px;
            }

            .action-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }

        /* Overflow wrapper for table on mobile */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            margin: 0 -4px;
        }
    </style>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="data-card">
                <div class="detail-content">
                    <h3 class="detail-title">
                        <i class="fas fa-file-medical-alt title-icon"></i>
                        <span>Laporan Kesehatan</span>
                    </h3>

                    <!-- Summary Box -->
                    <div class="summary-box">
                        <h4 class="summary-title">
                            <i class="fas fa-clipboard-list summary-icon"></i>
                            <span>Ringkasan Laporan</span>
                        </h4>
                        
                        <div class="summary-grid">
                            <div class="summary-item">
                                <span class="summary-label">Tanggal Laporan:</span>
                                <span class="summary-value">{{ \Carbon\Carbon::parse($laporanKesehatan->tanggal_laporan)->format('d F Y') }}</span>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">Fasilitas Pencatat:</span>
                                <span class="summary-value">{{ $laporanKesehatan->fasilitas->nama_fasilitas ?? 'N/A' }}</span>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">Jenis Kegiatan:</span>
                                <span class="summary-value">{{ $laporanKesehatan->jenis_kegiatan }}</span>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">Dicatat Oleh:</span>
                                <span class="summary-value">{{ $laporanKesehatan->user->name ?? 'N/A' }}</span>
                            </div>

                            <div class="summary-item summary-description">
                                <span class="summary-label">Deskripsi:</span>
                                <span class="summary-value">{{ $laporanKesehatan->deskripsi_laporan }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Kasus Section -->
                    <div class="detail-section">
                        <h4 class="section-title">
                            <i class="fas fa-virus section-icon"></i>
                            <span>Detail Kasus Penyakit</span>
                        </h4>
                        
                        @if($laporanKesehatan->detailPenyakit->isEmpty())
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                                <p>Tidak ada detail penyakit yang tercatat dalam laporan ini.</p>
                            </div>
                        @else
                            <div class="table-wrapper">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i class="fas fa-disease mr-2"></i>
                                                Penyakit
                                            </th>
                                            <th>
                                                <i class="fas fa-user mr-2"></i>
                                                Penduduk Terkait
                                            </th>
                                            <th>
                                                <i class="fas fa-hashtag mr-2"></i>
                                                Jumlah Kasus
                                            </th>
                                            <th>
                                                <i class="fas fa-info-circle mr-2"></i>
                                                Keterangan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laporanKesehatan->detailPenyakit as $detail)
                                            <tr>
                                                <td>{{ $detail->kategoriPenyakit->nama_penyakit ?? 'N/A' }}</td>
                                                <td>{{ $detail->penduduk->nama_lengkap ?? 'Penduduk Dihapus' }}</td>
                                                <td>{{ $detail->jumlah_kasus }}</td>
                                                <td>{{ $detail->keterangan ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ route('laporan-kesehatan.edit', $laporanKesehatan) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>
                            <span>Edit Data</span>
                        </a>
                        <a href="{{ route('laporan-kesehatan.index') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Daftar Laporan</span>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>