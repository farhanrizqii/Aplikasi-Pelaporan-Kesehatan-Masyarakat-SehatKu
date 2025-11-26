<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catat Riwayat Kesehatan Baru') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Override Font */
        body, * {
            font-family: 'Montserrat', sans-serif !important;
        }

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

        /* Info Badge untuk Status */
        .status-info {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 8px;
        }

        .status-info.dirawat {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-info.sembuh {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-info.kronis {
            background-color: #FEE2E2;
            color: #991B1B;
        }

        .status-info.meninggal {
            background-color: #E5E7EB;
            color: #1F2937;
        }

        .dark .status-info.dirawat {
            background-color: #78350F;
            color: #FEF3C7;
        }

        .dark .status-info.sembuh {
            background-color: #064E3B;
            color: #D1FAE5;
        }

        .dark .status-info.kronis {
            background-color: #7F1D1D;
            color: #FEE2E2;
        }

        .dark .status-info.meninggal {
            background-color: #374151;
            color: #E5E7EB;
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

        /* Animation untuk form */
        .form-content {
            animation: slideIn 0.4s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Placeholder styling */
        .form-input::placeholder,
        .form-select::placeholder,
        .form-textarea::placeholder {
            color: #9CA3AF;
            font-style: italic;
        }

        .dark .form-input::placeholder,
        .dark .form-select::placeholder,
        .dark .form-textarea::placeholder {
            color: #6B7280;
        }
    </style>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="data-card">
                <div class="form-content">
                    <h3 class="form-title">
                        <i class="fas fa-notes-medical title-icon"></i>
                        <span>Catat Riwayat Kesehatan Baru</span>
                    </h3>

                    <form action="{{ route('riwayat-kesehatan.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="penduduk_id" class="form-label">
                                <i class="fas fa-user-injured label-icon"></i>
                                Pilih Penduduk <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="penduduk_id" 
                                id="penduduk_id" 
                                required 
                                class="form-select">
                                <option value="">-- Cari dan Pilih Penduduk --</option>
                                @foreach($penduduks as $p)
                                    <option value="{{ $p->id }}" {{ old('penduduk_id') == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama_lengkap }} (NIK: {{ $p->nik }})
                                    </option>
                                @endforeach
                            </select>
                            @error('penduduk_id')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="penyakit_id" class="form-label">
                                <i class="fas fa-disease label-icon"></i>
                                Jenis Penyakit <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="penyakit_id" 
                                id="penyakit_id" 
                                required 
                                class="form-select">
                                <option value="">-- Pilih Jenis Penyakit --</option>
                                @foreach($penyakits as $penyakit)
                                    <option value="{{ $penyakit->id }}" {{ old('penyakit_id') == $penyakit->id ? 'selected' : '' }}>
                                        {{ $penyakit->nama_penyakit }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penyakit_id')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="jenis_pemeriksaan" class="form-label">
                                    <i class="fas fa-stethoscope label-icon"></i>
                                    Jenis Pemeriksaan/Diagnosa <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="jenis_pemeriksaan" 
                                    id="jenis_pemeriksaan" 
                                    value="{{ old('jenis_pemeriksaan', 'Diagnosa Umum') }}" 
                                    required 
                                    class="form-input"
                                    placeholder="Contoh: Diagnosa Umum">
                                @error('jenis_pemeriksaan')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pemeriksaan" class="form-label">
                                    <i class="fas fa-calendar-check label-icon"></i>
                                    Tanggal Pemeriksaan <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    name="tanggal_pemeriksaan" 
                                    id="tanggal_pemeriksaan" 
                                    value="{{ old('tanggal_pemeriksaan', date('Y-m-d')) }}" 
                                    required 
                                    class="form-input">
                                @error('tanggal_pemeriksaan')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_penyakit" class="form-label">
                                <i class="fas fa-heartbeat label-icon"></i>
                                Status Penyakit Saat Ini <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="status_penyakit" 
                                id="status_penyakit" 
                                required 
                                class="form-select">
                                <option value="">-- Pilih Status --</option>
                                <option value="Dirawat" {{ old('status_penyakit') == 'Dirawat' ? 'selected' : '' }}>Dirawat/Aktif</option>
                                <option value="Sembuh" {{ old('status_penyakit') == 'Sembuh' ? 'selected' : '' }}>Sembuh</option>
                                <option value="Kronis" {{ old('status_penyakit') == 'Kronis' ? 'selected' : '' }}>Kronis/Menahun</option>
                                <option value="Meninggal" {{ old('status_penyakit') == 'Meninggal' ? 'selected' : '' }}>Meninggal (Terkait Penyakit)</option>
                            </select>
                            @error('status_penyakit')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan_diagnosa" class="form-label">
                                <i class="fas fa-clipboard-list label-icon"></i>
                                Keterangan Diagnosa
                            </label>
                            <textarea 
                                name="keterangan_diagnosa" 
                                id="keterangan_diagnosa" 
                                rows="4" 
                                class="form-textarea"
                                placeholder="Masukkan keterangan diagnosa atau catatan tambahan...">{{ old('keterangan_diagnosa') }}</textarea>
                            @error('keterangan_diagnosa')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <div class="action-buttons">
                            <a href="{{ route('riwayat-kesehatan.index') }}" class="btn-action btn-cancel">
                                <i class="fas fa-times"></i>
                                <span>Batal</span>
                            </a>
                            <button type="submit" class="btn-action btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Simpan Riwayat</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>