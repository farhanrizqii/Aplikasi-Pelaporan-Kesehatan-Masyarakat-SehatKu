<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Laporan Kesehatan Baru') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Data Card - Konsisten dengan wilayah */
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

        /* Section Title */
        .section-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #1F2937;
            margin: 2rem 0 1.5rem 0;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #E5E7EB;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dark .section-title {
            color: #F3F4F6;
            border-bottom-color: #4B5563;
        }

        .section-title.indigo {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }

        .dark .section-title.indigo {
            color: #60a5fa;
            border-bottom-color: #60a5fa;
        }

        .section-title.red {
            color: #ef4444;
            border-bottom-color: #ef4444;
        }

        .dark .section-title.red {
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

        .alert-message {
            color: #7f1d1d;
            margin-bottom: 12px;
        }

        .dark .alert-message {
            color: #fecaca;
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

        .form-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        /* Detail Row Card */
        .detail-row {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 2px solid #f59e0b;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .detail-row:hover {
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.2);
        }

        .dark .detail-row {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-color: #d97706;
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

        .btn-add {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
            margin-bottom: 24px;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
        }

        .btn-remove {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
            width: 100%;
        }

        .btn-remove:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(239, 68, 68, 0.4);
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
            .form-grid, .form-grid-4 {
                grid-template-columns: 1fr;
            }

            .form-content {
                padding: 20px;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.2rem;
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="data-card">
                <div class="form-content">
                    <h3 class="form-title">
                        <i class="fas fa-file-medical title-icon"></i>
                        <span>Buat Laporan Kesehatan Baru</span>
                    </h3>

                    @if ($errors->any())
                        <div class="alert-error">
                            <div class="alert-title">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>Validasi Gagal!</span>
                            </div>
                            <p class="alert-message">Tolong periksa input berikut:</p>
                            <ul class="alert-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('laporan-kesehatan.store') }}" method="POST">
                        @csrf
                        
                        <h4 class="section-title indigo">
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
                                    value="{{ old('tanggal_laporan', date('Y-m-d')) }}" 
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
                                        <option value="{{ $f->id }}" {{ old('fasilitas_kesehatan_id') == $f->id ? 'selected' : '' }}>
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
                                    value="{{ old('jenis_kegiatan') }}" 
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
                                    placeholder="Masukkan deskripsi atau ringkasan laporan">{{ old('deskripsi_laporan') }}</textarea>
                                @error('deskripsi_laporan')
                                    <p class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <hr class="section-divider">

                        <h4 class="section-title red">
                            <i class="fas fa-virus"></i>
                            <span>Detail Kasus Penyakit Tercatat</span>
                        </h4>
                        
                        <div id="detail-container">
                            <div class="detail-row" data-index="0">
                                <div class="form-grid-4">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-disease label-icon"></i>
                                            Penyakit
                                        </label>
                                        <select name="detail[0][kategori_penyakit_id]" class="form-select" required>
                                            <option value="">-- Pilih Penyakit --</option>
                                            @foreach($penyakits as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_penyakit }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-user label-icon"></i>
                                            Penduduk Terkait
                                        </label>
                                        <select name="detail[0][penduduk_id]" class="form-select" required>
                                            <option value="">-- Pilih Penduduk --</option>
                                            @foreach($penduduks as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_lengkap }} ({{ $p->nik }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-hashtag label-icon"></i>
                                            Jumlah Kasus
                                        </label>
                                        <input type="number" name="detail[0][jumlah_kasus]" value="1" min="1" required class="form-input">
                                    </div>

                                    <div class="form-group" style="display: flex; align-items: flex-end;">
                                        <button type="button" class="remove-detail-row btn-action btn-remove">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </div>
                                    
                                    <div class="form-group" style="grid-column: 1 / -1;">
                                        <label class="form-label">
                                            <i class="fas fa-info-circle label-icon"></i>
                                            Keterangan Khusus
                                        </label>
                                        <input 
                                            type="text" 
                                            name="detail[0][keterangan]" 
                                            placeholder="Contoh: Lokasi temuan, tindakan awal" 
                                            class="form-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-detail-button" class="btn-action btn-add">
                            <i class="fas fa-plus-circle"></i>
                            <span>Tambah Kasus Penyakit</span>
                        </button>
                        
                        <div class="action-buttons">
                            <a href="{{ route('laporan-kesehatan.index') }}" class="btn-action btn-cancel">
                                <i class="fas fa-times"></i>
                                <span>Batal</span>
                            </a>
                            <button type="submit" class="btn-action btn-submit">
                                <i class="fas fa-save"></i>
                                <span>Simpan Laporan</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Kloning template baris detail (baris pertama)
            var detailTemplate = $('.detail-row[data-index="0"]').clone();
            var indexCounter = 1;

            // Kosongkan input di template agar baris baru bersih
            detailTemplate.find('select, input[type="number"], input[type="text"]').val('');

            // 1. Fungsi untuk menambahkan baris detail
            $('#add-detail-button').click(function() {
                var newRow = detailTemplate.clone();
                
                // Perbarui atribut name dan data-index
                newRow.attr('data-index', indexCounter);
                newRow.find('select, input').each(function() {
                    var name = $(this).attr('name');
                    if (name) {
                        // Ganti [0] dengan indeks baru ([1], [2], dst.)
                        $(this).attr('name', name.replace(/\[\d+\]/g, '[' + indexCounter + ']'));
                    }
                    // Kosongkan nilai input baru
                    $(this).val('');
                });
                
                // Tampilkan tombol Hapus pada baris baru
                newRow.find('.remove-detail-row').show();
                
                $('#detail-container').append(newRow);
                indexCounter++;
            });

            // 2. Fungsi untuk menghapus baris detail
            $('#detail-container').on('click', '.remove-detail-row', function() {
                // Hapus baris detail yang relevan
                if ($('#detail-container').children('.detail-row').length > 1) {
                    $(this).closest('.detail-row').remove();
                } else {
                    alert('Minimal harus ada satu detail kasus yang tercatat.');
                }
            });
            
            // 3. Sembunyikan tombol hapus pada baris pertama saat inisialisasi
            $('.detail-row[data-index="0"]').find('.remove-detail-row').hide();
        });
    </script>
</x-app-layout>