<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Riwayat Kesehatan') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Data Card - Konsisten dengan wilayah/show */
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

        /* Section Headers */
        .section-header {
            font-size: 1.25rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #E5E7EB;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dark .section-header {
            color: #D1D5DB;
            border-bottom-color: #4B5563;
        }

        .section-icon {
            color: #3b82f6;
            font-size: 1.1rem;
        }

        .dark .section-icon {
            color: #60a5fa;
        }

        /* Detail Info Items */
        .detail-info {
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
            margin-bottom: 2rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 16px;
            background-color: #F9FAFB;
            border-radius: 8px;
            border-left: 4px solid #3b82f6;
            transition: all 0.2s ease;
        }

        .detail-item:hover {
            background-color: #EFF6FF;
            transform: translateX(4px);
        }

        .dark .detail-item {
            background-color: #374151;
            border-left-color: #60a5fa;
        }

        .dark .detail-item:hover {
            background-color: #1e3a8a;
        }

        .detail-label {
            font-weight: 700;
            color: #6B7280;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dark .detail-label {
            color: #9CA3AF;
        }

        .detail-value {
            font-size: 1.125rem;
            color: #1F2937;
            font-weight: 600;
        }

        .dark .detail-value {
            color: #F3F4F6;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .status-dirawat {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            color: white;
        }

        .status-sembuh {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
        }

        .status-kronis {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            color: white;
        }

        .status-meninggal {
            background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
            color: white;
        }

        /* Grid Layout */
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Keterangan Box */
        .keterangan-box {
            background: linear-gradient(135deg, #F9FAFB 0%, #F3F4F6 100%);
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 20px;
            margin-top: 1.5rem;
            grid-column: 1 / -1;
        }

        .dark .keterangan-box {
            background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
            border-color: #4B5563;
        }

        .keterangan-title {
            font-weight: 700;
            color: #374151;
            font-size: 1rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dark .keterangan-title {
            color: #D1D5DB;
        }

        .keterangan-content {
            color: #6B7280;
            font-size: 0.95rem;
            line-height: 1.6;
            font-style: italic;
        }

        .dark .keterangan-content {
            color: #9CA3AF;
        }

        /* Buttons - Konsisten dengan wilayah */
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
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .detail-content {
                padding: 20px;
            }

            .detail-title {
                font-size: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .detail-item {
                padding: 12px;
            }
        }
    </style>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="data-card">
                <div class="detail-content">
                    <h3 class="detail-title">
                        <i class="fas fa-notes-medical title-icon"></i>
                        <span>{{ $riwayatKesehatan->penduduk->nama_lengkap ?? 'N/A' }}</span>
                    </h3>

                    <div class="detail-grid">
                        <!-- Section Diagnosa & Status -->
                        <div>
                            <h4 class="section-header">
                                <i class="fas fa-stethoscope section-icon"></i>
                                <span>Diagnosa & Status</span>
                            </h4>
                            
                            <div class="detail-info">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-virus"></i>
                                        Penyakit
                                    </span>
                                    <span class="detail-value">{{ $riwayatKesehatan->kategoriPenyakit->nama_penyakit ?? 'Tidak Dikenal' }}</span>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-heartbeat"></i>
                                        Status Saat Ini
                                    </span>
                                    <span class="detail-value">
                                        <span class="status-badge status-{{ strtolower($riwayatKesehatan->hasil) }}">
                                            {{ $riwayatKesehatan->hasil }}
                                        </span>
                                    </span>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-clipboard-check"></i>
                                        Jenis Pemeriksaan
                                    </span>
                                    <span class="detail-value">{{ $riwayatKesehatan->jenis_pemeriksaan ?? '-' }}</span>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-calendar-check"></i>
                                        Tanggal Pemeriksaan
                                    </span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($riwayatKesehatan->tanggal_pemeriksaan)->format('d F Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Section Data Penduduk -->
                        <div>
                            <h4 class="section-header">
                                <i class="fas fa-user section-icon"></i>
                                <span>Data Penduduk</span>
                            </h4>
                            
                            <div class="detail-info">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-id-card"></i>
                                        NIK
                                    </span>
                                    <span class="detail-value">{{ $riwayatKesehatan->penduduk->nik ?? '-' }}</span>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Wilayah
                                    </span>
                                    <span class="detail-value">{{ $riwayatKesehatan->penduduk->wilayah->kelurahan ?? '-' }}</span>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">
                                        <i class="fas fa-birthday-cake"></i>
                                        Usia
                                    </span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($riwayatKesehatan->penduduk->tanggal_lahir)->age ?? '-' }} Tahun</span>
                                </div>
                            </div>
                        </div>

                        <!-- Keterangan Box -->
                        <div class="keterangan-box">
                            <div class="keterangan-title">
                                <i class="fas fa-info-circle"></i>
                                <span>Keterangan Diagnosa/Tindakan:</span>
                            </div>
                            <div class="keterangan-content">
                                {{ $riwayatKesehatan->tindakan ?? '— Tidak ada keterangan tindakan tercatat —' }}
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('riwayat-kesehatan.edit', $riwayatKesehatan) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>
                            <span>Edit Data</span>
                        </a>
                        <a href="{{ route('riwayat-kesehatan.index') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Daftar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>