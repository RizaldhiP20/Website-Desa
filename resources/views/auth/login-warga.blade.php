<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Warga - Desa Rejosari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        /* Background with village illustration */
        .login-wrapper {
            position: relative;
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, #7ba1b5 0%, #5a8a9e 50%, #4a7a8d 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Animated village background */
        .village-bg {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60%;
            background: linear-gradient(to bottom, transparent 0%, #4a7a8d 20%, #5d8a4a 40%, #6b9d5a 60%, #7ab06a 100%);
            z-index: 1;
        }

        /* Houses illustration */
        .house {
            position: absolute;
            bottom: 20%;
            opacity: 0.6;
        }

        .house-1 {
            left: 10%;
            width: 150px;
            height: 120px;
            background: linear-gradient(to bottom, #c44d4d 0%, #c44d4d 60%, #8b3636 60%);
            clip-path: polygon(0 30%, 50% 0, 100% 30%, 100% 100%, 0 100%);
            filter: blur(2px);
        }

        .house-2 {
            right: 15%;
            width: 180px;
            height: 140px;
            background: linear-gradient(to bottom, #d97c4d 0%, #d97c4d 55%, #a65a36 55%);
            clip-path: polygon(0 35%, 50% 5%, 100% 35%, 100% 100%, 0 100%);
            filter: blur(2px);
        }

        .house-3 {
            left: 35%;
            bottom: 25%;
            width: 120px;
            height: 100px;
            background: linear-gradient(to bottom, #8b6d4d 0%, #8b6d4d 50%, #6d5438 50%);
            clip-path: polygon(0 40%, 50% 10%, 100% 40%, 100% 100%, 0 100%);
            filter: blur(2px);
        }

        /* Trees */
        .tree {
            position: absolute;
            bottom: 25%;
        }

        .tree-1 {
            left: 25%;
            width: 60px;
            height: 100px;
            background: linear-gradient(to bottom, #5a8a4d 0%, #5a8a4d 60%, #6d5438 60%);
            border-radius: 50% 50% 0 0;
            filter: blur(1.5px);
            opacity: 0.7;
        }

        .tree-2 {
            right: 30%;
            width: 50px;
            height: 85px;
            background: linear-gradient(to bottom, #6b9d5a 0%, #6b9d5a 65%, #7d6345 65%);
            border-radius: 50% 50% 0 0;
            filter: blur(1.5px);
            opacity: 0.6;
        }

        /* Login Container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px 35px;
            backdrop-filter: blur(10px);
        }

        /* Logo and Header */
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-img {
            margin-bottom: 15px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 800; /* Bold */
            color: #1e293b;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .subtitle {
            font-size: 0.9rem;
            color: #6c757d; /* Grey */
            margin-bottom: 2px;
            font-weight: 500;
            text-transform: uppercase;
        }
        
        .district {
            font-size: 0.85rem;
            color: #adb5bd; /* Lighter Grey */
            font-weight: 400;
        }

        /* Form Styles */
        .form-floating > .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
        }
        
        .form-floating > .form-control:focus {
            border-color: #198754; /* Green Focus */
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
        
        .form-floating > label {
            color: #6c757d;
        }

        /* Login Button */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(22, 163, 74, 0.3);
        }

        /* Footer Links */
        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .login-footer a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            margin-top: 15px;
            transition: all 0.2s;
        }

        .back-link:hover {
            color: #1e293b;
        }

        .back-link i {
            margin-right: 5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                padding: 30px 25px;
            }

            .house, .tree {
                display: none;
            }

            .village-bg {
                height: 50%;
            }

            h1 {
                font-size: 1.3rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Village Background -->
        <div class="village-bg"></div>
        
        <!-- Houses -->
        <div class="house house-1"></div>
        <div class="house house-2"></div>
        <div class="house house-3"></div>
        
        <!-- Trees -->
        <div class="tree tree-1"></div>
        <div class="tree tree-2"></div>

        <!-- Login Container -->
        <div class="login-container">
            <div class="login-card">
                <!-- Logo and Header -->
                <div class="logo-container">
                    <img src="{{ asset('assets/images/logo-lamongan.png') }}" alt="Logo Lamongan" width="80" class="logo-img">
                    <h1>DESA REJOSARI</h1>
                    <p class="subtitle">KECAMATAN DEKET</p>
                    <p class="district">KABUPATEN LAMONGAN</p>
                </div>

                <!-- Error Alert -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.attempt') }}" method="POST" id="loginForm">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required maxlength="16" value="{{ old('nik') }}">
                        <label for="nik">No. Induk Kependudukan (NIK)</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK" required maxlength="16">
                        <label for="no_kk">No. Kartu Keluarga (KK)</label>
                    </div>

                    <button type="submit" class="btn-login">
                        MASUK
                    </button>
                </form>

                <!-- Footer -->
                <div class="login-footer">
                    <p class="mb-2">Belum terdaftar? <a href="#">Hubungi Admin Desa</a></p>
                    <p class="mb-2 text-secondary">Login sebagai <a href="{{ route('login.admin') }}" class="text-secondary">Admin</a></p>
                    <a href="{{ route('landing') }}" class="back-link">
                        <i class="bi bi-arrow-left"></i> Kembali ke beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-format input to numbers only
        document.getElementById('nik').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').substring(0, 16);
        });

        document.getElementById('no_kk').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').substring(0, 16);
        });
    </script>
</body>
</html>