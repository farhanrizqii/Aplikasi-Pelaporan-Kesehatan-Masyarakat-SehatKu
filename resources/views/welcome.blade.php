<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SehatKu - Sistem Informasi Kesehatan Desa</title>

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cdefs%3E%3ClinearGradient id='grad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:%23007bff'/%3E%3Cstop offset='100%25' style='stop-color:%230056b3'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='100' height='100' rx='22' fill='url(%23grad)'/%3E%3Cpath d='M50 75L30 55C25 50 25 42 30 37C35 32 43 32 48 37L50 39L52 37C57 32 65 32 70 37C75 42 75 50 70 55L50 75Z' fill='white'/%3E%3Cpath d='M30 45L35 50L40 40L45 55L50 45L55 50L60 45L65 50L70 45' stroke='white' stroke-width='3' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0066FF;
            --primary-dark: #0052CC;
            --primary-light: #E6F0FF;
            --accent: #00D4FF;
            --text-dark: #0A1628;
            --text-body: #475569;
            --text-muted: #64748B;
            --bg-primary: #FFFFFF;
            --bg-secondary: #F8FAFC;
            --border: #E2E8F0;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #F8FAFC 0%, #E6F0FF 100%);
            color: var(--text-body);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            width: 100%;
            padding: 24px 48px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header nav {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 16px;
        }

        .auth-link {
            text-decoration: none;
            color: var(--text-body);
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .auth-link:hover {
            background-color: var(--bg-secondary);
            color: var(--primary);
        }

        /* Main Container */
        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 100px;
        }

        /* Hero Card */
        .hero-card {
            background: var(--bg-primary);
            border-radius: 32px;
            box-shadow: var(--shadow-xl), 0 0 0 1px rgba(0, 0, 0, 0.05);
            max-width: 1400px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            padding: 60px 80px;
            align-items: center;
            position: relative;
            overflow: visible;
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(0, 102, 255, 0.03) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Content Section */
        .content-section {
            position: relative;
            z-index: 1;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 14px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
            letter-spacing: 0.3px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.1;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        h1 .highlight {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 18px;
            line-height: 1.5;
        }

        .description {
            font-size: 0.92rem;
            color: var(--text-body);
            line-height: 1.6;
            margin-bottom: 26px;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: 11px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 8px 16px -4px rgba(0, 102, 255, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -4px rgba(0, 102, 255, 0.5);
        }

        .btn-secondary {
            background: var(--bg-primary);
            color: var(--primary);
            border: 2px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background: var(--bg-secondary);
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Visual Section */
        .visual-section {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 18px 10px;
            min-height: 380px;
        }

        .logo-container {
            position: relative;
            animation: float 6s ease-in-out infinite;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            width: 100%;
            max-width: 280px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .logo-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(0, 102, 255, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
            50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.8; }
        }

        .logo-icon {
            position: relative;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px -12px rgba(0, 102, 255, 0.4),
                        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo-icon:hover {
            transform: scale(1.05) rotate(-5deg);
            box-shadow: 0 26px 52px -12px rgba(0, 102, 255, 0.5);
        }

        .logo-icon i {
            font-size: 100px;
            color: white;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .logo-text {
            font-size: 3.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
            text-align: center;
            position: relative;
            word-break: keep-all;
            white-space: nowrap;
        }

        /* Decorative Elements */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 102, 255, 0.1) 0%, rgba(0, 212, 255, 0.1) 100%);
            animation: float 8s ease-in-out infinite;
        }

        .circle-1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 60px;
            height: 60px;
            bottom: 15%;
            right: 10%;
            animation-delay: 2s;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-card {
                grid-template-columns: 1fr;
                gap: 28px;
                padding: 32px 25px;
                width: 84%;
            }

            .visual-section {
                order: -1;
                min-height: 360px;
                padding: 16px 10px;
            }

            h1 {
                font-size: 2.2rem;
            }

            .logo-text {
                font-size: 3.2rem;
            }

            .logo-container {
                max-width: 260px;
            }

            .logo-icon {
                width: 145px;
                height: 145px;
            }

            .logo-icon i {
                font-size: 72px;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 16px 18px;
            }

            .container {
                padding: 20px 12px;
            }

            .hero-card {
                padding: 30px 20px;
                border-radius: 20px;
                width: 90%;
            }

            h1 {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 0.98rem;
            }

            .description {
                font-size: 0.92rem;
            }

            .logo-icon {
                width: 120px;
                height: 120px;
                border-radius: 28px;
            }

            .logo-icon i {
                font-size: 60px;
            }

            .logo-text {
                font-size: 2.6rem;
            }

            .visual-section {
                padding: 16px 8px;
                min-height: 310px;
            }

            .logo-container {
                max-width: 210px;
                gap: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 16px 8px;
            }

            .hero-card {
                padding: 24px 15px;
                width: 92%;
            }

            h1 {
                font-size: 1.75rem;
            }

            .subtitle {
                font-size: 0.92rem;
                margin-bottom: 16px;
            }

            .description {
                font-size: 0.88rem;
                margin-bottom: 22px;
            }

            .button-group {
                flex-direction: column;
                gap: 11px;
            }

            .btn {
                width: 100%;
                padding: 12px 18px;
                font-size: 13px;
            }

            .logo-icon {
                width: 100px;
                height: 100px;
                border-radius: 24px;
            }

            .logo-icon i {
                font-size: 50px;
            }

            .logo-text {
                font-size: 2.2rem;
            }

            .visual-section {
                padding: 14px 5px;
                min-height: 270px;
            }

            .logo-container {
                max-width: 180px;
                gap: 14px;
            }

            .badge {
                font-size: 10.5px;
                padding: 6px 11px;
                margin-bottom: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <nav>
            <a href="/login" class="auth-link">Login</a>
            <a href="/register" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                <span>Daftar</span>
            </a>
        </nav>
    </div>

    <div class="container">
        <div class="hero-card">
            <div class="decorative-circle circle-1"></div>
            <div class="decorative-circle circle-2"></div>
            
            <div class="content-section">
                <div class="badge">
                    <i class="fas fa-sparkles"></i>
                    <span>Platform Kesehatan Digital</span>
                </div>
                
                <h1>
                    Sistem Informasi<br>
                    <span class="highlight">Kesehatan Desa</span>
                </h1>
                
                <p class="subtitle">
                    Rekap Riwayat Kesehatan Terintegrasi
                </p>
                
                <p class="description">
                    SehatKu memudahkan perangkat desa dan petugas kesehatan untuk merekap, mengelola, dan menganalisis riwayat kesehatan warga secara efisien dan akurat.
                </p>
                
                <div class="button-group">
                    <a href="/login" class="btn btn-primary">
                        <i class="fas fa-lock"></i>
                        <span>Masuk Sistem</span>
                    </a>
                    <a href="/about" class="btn btn-secondary">
                        <i class="fas fa-info-circle"></i>
                        <span>Tentang Kami</span>
                    </a>
                </div>
            </div>
            
            <div class="visual-section">
                <div class="logo-container">
                    <div class="logo-bg"></div>
                    <div class="logo-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="logo-text">SehatKu</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>