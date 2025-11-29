<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Rejosari</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }
        
        .bg-image {
            background-image: url("{{ asset('assets/images/bg-desa.jpg') }}");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Black overlay with 60% opacity */
        }
        
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 450px;
            padding: 15px;
        }
        
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .card-header {
            background: transparent;
            border-bottom: none;
            padding-top: 30px;
            padding-bottom: 10px;
        }
        
        .logo-img {
            max-height: 80px;
            margin-bottom: 15px;
        }
        
        .system-title {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .village-name {
            font-size: 1.5rem;
            color: #198754; /* Dark Green */
            font-weight: 700;
            margin-bottom: 0;
        }
        
        .form-control {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ced4da;
        }
        
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
        
        .btn-login {
            background-color: #198754;
            border-color: #198754;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            background-color: #146c43;
            border-color: #146c43;
        }
        
        .copyright {
            color: rgba(255,255,255,0.8);
            font-size: 0.8rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="bg-image">
        <div class="overlay"></div>
        
        <div class="login-container">
            <div class="card text-center">
                <div class="card-header">
                    <img src="{{ asset('assets/images/logo-lamongan.png') }}" alt="Logo Lamongan" class="logo-img">
                    <div class="system-title">Sistem Informasi Desa</div>
                    <h2 class="village-name">DESA REJOSARI</h2>
                </div>
                
                <div class="card-body p-4">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 text-start">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label text-muted small fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-envelope text-muted"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email anda">
                            </div>
                        </div>

                        <div class="mb-4 text-start">
                            <label for="password" class="form-label text-muted small fw-bold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-lock text-muted"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password anda">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i> MASUK
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center copyright">
                &copy; 2025 Pemerintah Desa Rejosari - Kabupaten Lamongan
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Brute Force Protection Script -->
    <script>
        // Check if user was previously blocked
        const blockedUntil = localStorage.getItem('login_blocked_until');
        if (blockedUntil) {
            const now = new Date().getTime();
            if (now < parseInt(blockedUntil)) {
                window.location.href = "{{ route('blocked') }}";
            } else {
                localStorage.removeItem('login_blocked_until');
            }
        }
    </script>
</body>
</html>