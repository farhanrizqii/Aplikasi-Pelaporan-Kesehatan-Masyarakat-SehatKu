<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - SehatKu</title>

     <!-- Favicon SehatKu - TAMBAHKAN DI SINI -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cdefs%3E%3ClinearGradient id='grad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:%230066FF'/%3E%3Cstop offset='100%25' style='stop-color:%230052CC'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='100' height='100' rx='22' fill='url(%23grad)'/%3E%3Cpath d='M50 75L30 55C25 50 25 42 30 37C35 32 43 32 48 37L50 39L52 37C57 32 65 32 70 37C75 42 75 50 70 55L50 75Z' fill='white'/%3E%3Cpath d='M30 45L35 50L40 40L45 55L50 45L55 50L60 45L65 50L70 45' stroke='white' stroke-width='3' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* Menggunakan style dasar yang konsisten */
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #eef2f6; /* Warna background yang konsisten */
            color: #333;
            display: flex;
            align-items: center; 
            justify-content: center; 
            min-height: 100vh;
        }

        /* Card Lupa Password (Dikecilkan, mirip dengan card login) */
        .password-reset-card {
            background: linear-gradient(135deg, #ffffff 0%, #f7f9fc 100%); 
            border-radius: 14px; 
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(0, 0, 0, 0.05);
            padding: 30px;
            max-width: 400px; /* Lebar maksimum yang ringkas */
            width: 90%;
            text-align: center;
        }
        
        /* Judul/Logo di Atas Form */
        .header-reset {
            margin-bottom: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header-reset .logo-icon {
            font-size: 3.5em;
            color: #007bff; /* Warna biru SehatKu */
            margin-bottom: 8px;
        }
        .header-reset .title {
            font-size: 1.6em;
            font-weight: 700;
            color: #333;
        }
        .header-reset .description {
            font-size: 0.9em;
            color: #5a6270;
            line-height: 1.5;
            margin-top: 15px; /* Jarak deskripsi dari ikon/judul */
        }

        /* Styling Form */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #5a6270;
            font-size: 0.85em;
        }
        .form-group input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #c9d2db;
            border-radius: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95em;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #007bff; 
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
        }

        /* Tombol Kirim Link */
        .btn-reset {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%; /* Tombol Full Width */
            font-size: 0.9em;
            margin-top: 10px;
        }
        .btn-reset:hover {
            background-color: #0056b3;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }
        
        /* Link Kembali ke Login */
        .back-to-login {
            font-size: 0.85em;
            color: #5a6270;
            text-decoration: none;
            display: block;
            margin-top: 20px;
            transition: color 0.3s;
        }
        .back-to-login:hover {
            color: #007bff;
        }

        /* Pesan Status */
        .status-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            font-size: 0.9em;
            text-align: left;
        }
        .error-message {
            font-size: 0.75em;
            color: #dc3545;
            margin-top: 3px;
        }
    </style>
</head>
<body>
    {{-- Status Sesi (Menggantikan <x-auth-session-status>) --}}
    @if (session('status'))
        <div class="password-reset-card status-message">
            {{ session('status') }}
        </div>
    @endif

    <div class="password-reset-card">
        <div class="header-reset">
            <i class="fas fa-key logo-icon"></i> 
            <span class="title">Lupa Password Anda?</span>
            <p class="description">Jangan khawatir. Cukup masukkan alamat email Anda dan kami akan mengirimkan tautan reset password kepada Anda.</p>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- Email Address --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <button type="submit" class="btn-reset">
                <i class="fas fa-envelope"></i> Kirim Tautan Reset
            </button>
        </form>

        <a class="back-to-login" href="{{ route('login') }}">
            <i class="fas fa-arrow-left"></i> Kembali ke Halaman Login
        </a>
    </div>
</body>
</html>