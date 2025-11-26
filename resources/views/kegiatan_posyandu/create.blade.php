<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Jadwal Kegiatan Posyandu') }}
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

        /* Optional Badge */
        .optional-badge {
            background-color: #EFF6FF;
            color: #2563EB;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 6px;
        }

        .dark .optional-badge {
            background-color: #1e3a8a;
            color: #93C5FD;
        }

        /* Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
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
            justify-content: center;
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

        /* Info Box */
        .info-box {
            background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
            border-left: 4px solid #3b82f6;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: start;
            gap: 12px;
        }

        .dark .info-box {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border-left-color: #60a5fa;
        }

        .info-icon {
            color: #3b82f6;
            font-size: 1.2rem;
            margin-top: 2px;
        }

        .dark .info-icon {
            color: #60a5fa;
        }

        .info-text {
            color: #1e40af;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .dark .info-text {
            color: #93C5FD;
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

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
            }
        }
    </style>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="data-card">
                <div class="form-content">
                    <h3 class="form-title">
                        <i class="fas fa-calendar-plus title-icon"></i>
                        <span>Tambah Jadwal Kegiatan Posyandu</span>
                    </h3>

                    <div class="info-box">
                        <i class="fas fa-info-circle info-icon"></i>
                        <p class="info-text">
                            Jadwalkan kegiatan posyandu untuk wilayah tertentu. Pastikan tanggal dan lokasi sudah sesuai dengan rencana pelaksanaan.
                        </p>
                    </div>

                    <form action="{{ route('kegiatan-posyandu.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="wilayah_id" class="form-label">
                                <i class="fas fa-map-marked-alt label-icon"></i>
                                Wilayah Pelaksana
                            </label>
                            <select 
                                name="wilayah_id" 
                                id="wilayah_id" 
                                required 
                                class="form-select">
                                <option value="">-- Pilih Wilayah --</option>
                                @foreach($wilayahs as $wilayah)
                                    <option value="{{ $wilayah->id }}" {{ old('wilayah_id') == $wilayah->id ? 'selected' : '' }}>
                                        {{ $wilayah->kelurahan }} 
                                        @if ($wilayah->rw)
                                            (RW: {{ $wilayah->rw }})
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('wilayah_id')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_kegiatan" class="form-label">
                                <i class="fas fa-clipboard-list label-icon"></i>
                                Nama/Jenis Kegiatan
                            </label>
                            <input 
                                type="text" 
                                name="jenis_kegiatan" 
                                id="jenis_kegiatan" 
                                value="{{ old('jenis_kegiatan') }}" 
                                required 
                                class="form-input"
                                placeholder="Contoh: Posyandu Balita, Imunisasi Campak, dll">
                            @error('jenis_kegiatan')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="tanggal" class="form-label">
                                    <i class="fas fa-calendar-day label-icon"></i>
                                    Tanggal Kegiatan
                                </label>
                                <input 
                                    type="date" 
                                    name="tanggal" 
                                    id="tanggal" 
                                    value="{{ old('tanggal') }}" 
                                    required 
                                    class="form-input">
                                @error('tanggal')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_peserta" class="form-label">
                                    <i class="fas fa-users label-icon"></i>
                                    Jumlah Peserta
                                    <span class="optional-badge">Opsional</span>
                                </label>
                                <input 
                                    type="number" 
                                    name="jumlah_peserta" 
                                    id="jumlah_peserta" 
                                    value="{{ old('jumlah_peserta') }}" 
                                    class="form-input"
                                    placeholder="Estimasi jumlah peserta"
                                    min="0">
                                @error('jumlah_peserta')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="form-label">
                                <i class="fas fa-file-alt label-icon"></i>
                                Keterangan Kegiatan
                                <span class="optional-badge">Opsional</span>
                            </label>
                            <textarea 
                                name="keterangan" 
                                id="keterangan" 
                                rows="4" 
                                class="form-textarea"
                                placeholder="Tambahkan catatan atau informasi penting tentang kegiatan ini...">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <div class="action-buttons">
                            <a href="{{ route('kegiatan-posyandu.index') }}" class="btn-action btn-cancel">
                                <i class="fas fa-times"></i>
                                <span>Batal</span>
                            </a>
                            <button type="submit" class="btn-action btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Simpan Jadwal</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>