<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Laporan Kesehatan') . ' - Tgl ' . \Carbon\Carbon::parse($laporanKesehatan->tanggal_laporan)->format('d/m/Y') }}
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

        /* Form Content */
        .form-content {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .dark .form-content {
            background: #1f2937;
        }

        /* Title dengan icon */
        .form-title {
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

        .dark .form-title {
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
            margin: 2rem 0 1.5rem 0;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #E5E7EB;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dark .section-header {
            color: #D1D5DB;
            border-bottom-color: #4B5563;
        }

        .section-header.indigo {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }

        .dark .section-header.indigo {
            color: #60a5fa;
            border-bottom-color: #60a5fa;
        }

        .section-header.red {
            color: #ef4444;
            border-bottom-color: #ef4444;
        }

        .dark .section-header.red {
            color: #f87171;
            border-bottom-color: #f87171;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dark .form-label {
            color: #D1D5DB;
        }

        .label-icon {
            color: #3b82f6;
            font-size: 0.9rem;
        }

        .dark .label-icon {
            color: #60a5fa;
        }

        /* Input Styling */
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            border: 2px solid #E5E7EB;
            transition: all 0.3s ease;
            font-size: 1rem;
            color: #1F2937;
            background-color: #F9FAFB;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .dark .form-input, .dark .form-select, .dark .form-textarea {
            background-color: #374151;
            border-color: #4B5563;
            color: #F3F4F6;
        }

        .dark .form-input:focus, .dark .form-select:focus, .dark .form-textarea:focus {
            border-color: #60a5fa;
            background-color: #1f2937;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        }

        /* Error Message */
        .error-message {
            color: #DC2626;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dark .error-message {
            color: #F87171;
        }

        /* Alert Box */
        .alert-error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 2px solid #ef4444;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .dark .alert-error {
            background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 100%);
            border-color: #dc2626;
        }

        .alert-title {
            font-weight: 700;
            color: #991b1b;
            font-size: 1.1rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dark .alert-title {
            color: #fca5a5;
        }

        .alert-list {
            list-style: disc;
            padding-left: 24px;
            color: #991b1b;
        }

        .dark .alert-list {
            color: #fca5a5;
        }

        /* Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-grid-full {
            grid-column: 1 / -1;
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
        }

        .dark .custom-table tbody tr {
            border-bottom-color: #374151;
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
            padding: 32px;
            color: #6B7280;
        }

        .dark .empty-state {
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
            border: none;
            cursor: pointer;
        }

        .btn-submit {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-cancel {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(107, 114, 128, 0.3);
        }

        .btn-cancel:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(107, 114, 128, 0.4);
        }

        /* Button Container */
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
            padding-top: 1.5rem;
            margin-top: 1.5rem;
            border-top: 2px solid #E5E7EB;
        }

        .dark .action-buttons {
            border-top-color: #4B5563;
        }

        /* Divider */
        .section-divider {
            border: none;
            border-top: 2px dashed #d1d5db;
            margin: 2rem 0;
        }

        .dark .section-divider {
            border-top-color: #4b5563;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-content {
                padding: 20px;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .section-header {
                font-size: 1.1rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
            }

            .custom-table {
                font-size: 0.875rem;
            }

            .custom-table thead th,
            .custom-table tbody td {
                padding: 12px 16px;
            }
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            margin: 0 -4px;
        }
    </style>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="data-card">
                <div class="form-content">
                    <h3 class="form-title">
                        <i class="fas fa-edit title-icon"></i>
                        <span>Edit Laporan Kesehatan</span>
                    </h3>

                    @if ($errors->any())
                        <div class="alert-error">
                            <div class="alert-title">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>Validasi Gagal!</span>
                            </div>
                            <ul class="alert-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('laporan-kesehatan.update', $laporanKesehatan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <h4 class="section-header indigo">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Data Induk Laporan</span>
                        </h4>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="tanggal_laporan" class="form-label">
                                    <i class="fas fa-calendar-alt label-icon"></i>
                                    Tanggal Laporan
                                </label>
                                <input 
                                    type="date" 
                                    name="tanggal_laporan" 
                                    id="tanggal_laporan" 
                                    value="{{ old('tanggal_laporan', \Carbon\Carbon::parse($laporanKesehatan->tanggal_laporan)->format('Y-m-d')) }}" 
                                    required 
                                    class="form-input">
                                @error('tanggal_laporan')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fasilitas_kesehatan_id" class="form-label">
                                    <i class="fas fa-hospital label-icon"></i>
                                    Fasilitas Pencatat
                                </label>
                                <select 
                                    name="fasilitas_kesehatan_id" 
                                    id="fasilitas_kesehatan_id" 
                                    required 
                                    class="form-select">
                                    <option value="">-- Pilih Fasilitas Kesehatan --</option>
                                    @foreach($fasilitas as $f)
                                        <option value="{{ $f->id }}" {{ old('fasilitas_kesehatan_id', $laporanKesehatan->fasilitas_kesehatan_id) == $f->id ? 'selected' : '' }}>
                                            {{ $f->nama_faskes }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('fasilitas_kesehatan_id')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="jenis_kegiatan" class="form-label">
                                    <i class="fas fa-tasks label-icon"></i>
                                    Jenis Kegiatan
                                </label>
                                <input 
                                    type="text" 
                                    name="jenis_kegiatan" 
                                    id="jenis_kegiatan" 
                                    value="{{ old('jenis_kegiatan', $laporanKesehatan->jenis_kegiatan) }}" 
                                    required 
                                    class="form-input"
                                    placeholder="Masukkan jenis kegiatan">
                                @error('jenis_kegiatan')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group form-grid-full">
                                <label for="deskripsi_laporan" class="form-label">
                                    <i class="fas fa-align-left label-icon"></i>
                                    Deskripsi/Ringkasan Laporan
                                </label>
                                <textarea 
                                    name="deskripsi_laporan" 
                                    id="deskripsi_laporan" 
                                    rows="4" 
                                    required 
                                    class="form-textarea"
                                    placeholder="Masukkan deskripsi atau ringkasan laporan">{{ old('deskripsi_laporan', $laporanKesehatan->deskripsi_laporan) }}</textarea>
                                @error('deskripsi_laporan')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <hr class="section-divider">

                        <h4 class="section-header red">
                            <i class="fas fa-virus"></i>
                            <span>Detail Kasus Penyakit Tercatat (Read Only)</span>
                        </h4>
                        
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
                                            Penduduk
                                        </th>
                                        <th>
                                            <i class="fas fa-hashtag mr-2"></i>
                                            Kasus
                                        </th>
                                        <th>
                                            <i class="fas fa-info-circle mr-2"></i>
                                            Keterangan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($laporanKesehatan->detailPenyakit as $detail)
                                        <tr>
                                            <td>{{ $detail->kategoriPenyakit->nama_penyakit ?? 'N/A' }}</td>
                                            <td>{{ $detail->penduduk->nama_lengkap ?? 'N/A' }}</td>
                                            <td>{{ $detail->jumlah_kasus }}</td>
                                            <td>{{ $detail->keterangan ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="empty-state">
                                                <i class="fas fa-folder-open" style="font-size: 2rem; opacity: 0.5;"></i>
                                                <p style="margin-top: 8px;">Tidak ada detail kasus tercatat.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="action-buttons">
                            <a href="{{ route('laporan-kesehatan.index') }}" class="btn-action btn-cancel">
                                <i class="fas fa-times"></i>
                                <span>Batal</span>
                            </a>
                            <button type="submit" class="btn-action btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Perbarui Laporan</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>