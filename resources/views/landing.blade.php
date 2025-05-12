<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrik Penilaian Menulis Teks Eksplanasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f855;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        
        .main-title {
            color: #22bbd4;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            line-height: 1.3;
        }
        
        .logo {
            max-width: 120px;
            margin: 20px 0;
            display: block;
        }
        
        .blue-box {
            background-color: #22bbd4;
            color: black;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
        }
        
        .orange-box {
            background-color: #ffa439;
            color: black;
            border-radius: 25px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
            font-size: 1.4rem;
            font-weight: bold;
        }
        
        .footer-text {
            color: #22bbd4;
            text-align: center;
            font-size: 1.4rem;
            margin-top: 30px;
            line-height: 1.3;
        }
        
        .small-house {
            max-width: 60px;
            margin-left: auto;
            margin-bottom: 30px;
            display: block;
        }
        
        @media (max-width: 768px) {
            .main-title {
                font-size: 1.5rem;
            }
            
            .blue-box {
                font-size: 1.5rem;
            }
            
            .orange-box {
                font-size: 1.2rem;
            }
            
            .footer-text {
                font-size: 1.2rem;
            }
            
            .logo {
                max-width: 80px;
            }
            
            .small-house {
                max-width: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <!-- Logo -->
                <div class="text-start d-flex align-items-center gap-2">
                    <img src="{{ asset('img/Logo_Almamater_UPI.svg') }}" alt="Logo" class="logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo">
                </div>
                
                <!-- Main Title -->
                <h1 class="main-title">RUBRIK PENILAIAN<br>MENULIS TEKS EKSPLANASI<br>KELAS V SEKOLAH DASAR</h1>
                
                <!-- Blue Box -->
                <div class="blue-box">
                    TIM PENGEMBANG
                </div>
                
                <!-- Orange Boxes -->
                <div class="orange-box">
                    ERMA ROSMAWATI<br>
                    NIM. 2307977
                </div>
                
                <div class="orange-box">
                    DR. SENI APRILIYA, M. Pd.
                </div>
                
                <div class="orange-box">
                    PROF. DR. HERI YUSUF MUSLIHIN, M. Pd.
                </div>
                
                <!-- Footer Text -->
                <div class="footer-text">
                    MAGISTER PENDIDIKAN GURU SEKOLAH DASAR<br>
                    UNIVERSITAS PENDIDIKAN INDONESIA<br>
                    KAMPUS TASIKMALAYA<br>
                    2025
                </div>
                
                <!-- Small House Icon - Clickable for Login -->
                <a href="{{ route('login') }}" title="Login">
                    <img src="{{ asset('img/rumah.png') }}" alt="House Icon" class="small-house mt-3">
                </a>
            </div>
        </div>
    </div>
<footer class="mt-auto">
        <div class="text-center py-3" style="background-color: #f8f9fa; color: #333; font-size: 0.9rem;">
            © Erma Rosmawati - Universitas Pendidikan Indonesia 2025
        </div>
    </footer>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>