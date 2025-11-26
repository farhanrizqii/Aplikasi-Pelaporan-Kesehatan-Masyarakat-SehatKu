<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Kegiatan Posyandu') }}
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
            white-space: pre-wrap;
        }

        .dark .keterangan-content {
            color: #9CA3AF;
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
                        <i class="fas fa-calendar-check title-icon"></i>
                        <span>{{ $kegiatanPosyandu->jenis_kegiatan }}</span>
                    </h3>

                    <div class="detail-grid">
                        <!-- Column 1 -->
                        <div class="detail-info">
                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-hashtag"></i>
                                    ID Kegiatan
                                </span>
                                <span class="detail-value">{{ $kegiatanPosyandu->id }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-clipboard-list"></i>
                                    Jenis Kegiatan
                                </span>
                                <span class="detail-value">{{ $kegiatanPosyandu->jenis_kegiatan }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-calendar-day"></i>
                                    Tanggal Pelaksanaan
                                </span>
                                <span class="detail-value">{{ \Carbon\Carbon::parse($kegiatanPosyandu->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="detail-info">
                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Wilayah Pelaksana
                                </span>
                                <span class="detail-value">
                                    {{ $kegiatanPosyandu->wilayah->kelurahan ?? 'N/A' }} 
                                    @if($kegiatanPosyandu->wilayah)
                                        (RT/RW: {{ $kegiatanPosyandu->wilayah->rt }}/{{ $kegiatanPosyandu->wilayah->rw }})
                                    @endif
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-users"></i>
                                    Jumlah Peserta
                                </span>
                                <span class="detail-value">{{ $kegiatanPosyandu->jumlah_peserta ?? '-' }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-clock"></i>
                                    Dibuat Pada
                                </span>
                                <span class="detail-value">{{ $kegiatanPosyandu->created_at->isoFormat('D MMMM YYYY, HH:mm') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Keterangan Box -->
                    <div class="keterangan-box">
                        <div class="keterangan-title">
                            <i class="fas fa-info-circle"></i>
                            <span>Keterangan:</span>
                        </div>
                        <div class="keterangan-content">
                            {{ $kegiatanPosyandu->keterangan ?? 'Tidak ada keterangan.' }}
                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('kegiatan-posyandu.edit', $kegiatanPosyandu) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>
                            <span>Edit Data</span>
                        </a>
                        <a href="{{ route('kegiatan-posyandu.index') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Daftar</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>