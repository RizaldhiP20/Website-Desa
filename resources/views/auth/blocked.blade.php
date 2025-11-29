<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Dibatasi - Portal Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #dc3545; /* Danger Red */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
        }
        .blocked-card {
            background: #dc3545;
            padding: 40px;
            border-radius: 20px;
            /* box-shadow: 0 20px 60px rgba(0,0,0,0.3); */
            text-align: center;
            max-width: 500px;
            width: 90%;
            border: 2px solid rgba(255,255,255,0.2);
        }
        .icon-wrapper {
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.2);
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            margin-bottom: 25px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(255, 255, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
        }
        h1 {
            color: white;
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 2rem;
        }
        p {
            color: rgba(255,255,255,0.9);
            margin-bottom: 30px;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .timer-box {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            color: white;
            margin-bottom: 30px;
            display: inline-block;
            border: 1px solid rgba(255,255,255,0.3);
            font-size: 1.2rem;
        }
        .btn-back {
            background: white;
            color: #dc3545;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-back:hover {
            background: #f8f9fa;
            color: #b02a37;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .btn-back.disabled {
            background: rgba(255,255,255,0.5);
            color: rgba(220, 53, 69, 0.7);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="blocked-card">
        <div class="icon-wrapper">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h1>Akses Dibatasi</h1>
        <p>Terlalu banyak percobaan login gagal.<br>Demi keamanan, akses Anda dibatasi sementara.</p>
        
        @if(session('retry_after'))
            <div class="timer-box" id="timerBox">
                <i class="bi bi-hourglass-split me-2"></i>
                Silakan tunggu <span id="countdown">{{ session('retry_after') }}</span> detik
            </div>
        @else
            <div class="alert alert-light text-danger fw-bold">
                Sesi kadaluarsa. Silakan kembali ke login.
            </div>
        @endif

        <div>
            <a href="{{ route('admin.login') }}" class="btn btn-back disabled" id="btnBack">
                Kembali
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const retryAfter = parseInt("{{ session('retry_after', 0) }}");
            const countdownEl = document.getElementById('countdown');
            const btnBack = document.getElementById('btnBack');
            const timerBox = document.getElementById('timerBox');

            if (retryAfter > 0) {
                let timeLeft = retryAfter;
                
                const timer = setInterval(() => {
                    timeLeft--;
                    if (countdownEl) countdownEl.innerText = timeLeft;
                    
                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        if (btnBack) {
                            btnBack.classList.remove('disabled');
                            btnBack.innerText = "Coba Lagi";
                        }
                        if (timerBox) {
                            timerBox.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Silakan Coba Lagi';
                            timerBox.style.background = 'rgba(255,255,255,0.2)';
                            timerBox.style.borderColor = '#fff';
                        }
                    }
                }, 1000);
            } else {
                // If no session time, enable button immediately
                if (btnBack) {
                    btnBack.classList.remove('disabled');
                    btnBack.innerText = "Coba Lagi";
                }
            }
        });
    </script>
</body>
</html>
