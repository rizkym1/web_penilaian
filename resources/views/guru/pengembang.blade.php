@extends('layouts.sbadmin')

@section('content')
<style>
    :root {
        --primary-color: #439fb7;
        --secondary-color: #f0ad4e;
        --light-yellow: #ffffe0;
    }
    
    .rubrik-container {
        background-color: #f2ff4f;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        position: relative;
        overflow: hidden;
    }
    
    .rubrik-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .rubrik-header h1 {
        color: #439fb7;
        font-weight: bold;
        font-size: 2.4rem;
        margin-bottom: 5px;
        text-transform: uppercase;
    }
    
    .rubrik-header h2 {
        color: #439fb7;
        font-weight: bold;
        font-size: 2.4rem;
        margin-bottom: 20px;
    }
    
    .rubrik-header p {
        font-size: 1.2rem;
        line-height: 1.5;
    }
    
    .tim-box {
        background-color: #439fb7;
        color: #000000;
        font-weight: bold;
        border-radius: 8px;
        display: inline-block;
        padding: 8px 20px;
        margin-bottom: 15px;
        font-size: 1.3rem;
    }
    
    .profile-info {
        text-align: center;
        margin-bottom: 25px;
    }
    
    .profile-info .nim {
    font-weight: bold;
    font-size: 1.3rem;
    }
    
    .profile-info .nim {
        font-size: 1.3rem;
    }
    
    .supervisor-section {
        text-align: center;
        margin-bottom: 25px;
    }
    
    .supervisor-section .title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 1.3rem;
    }
    
    .supervisor-section .supervisor {
        font-weight: bold;
        font-size: 1.2rem;
        line-height: 1.8;
    }
    
    .footer-info {
        text-align: center;
        margin-top: 25px;
    }
    
    .footer-info p {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 1.25rem;
        margin-bottom: 8px;
        color: #439fb7;
    }
    
    .logo-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    
    .logo {
        width: 80px;
        height: 80px;
    }
    
    @media (max-width: 768px) {
        .rubrik-header h1 {
            font-size: 1.8rem;
        }
        
        .rubrik-header h2 {
            font-size: 1.3rem;
        }
        
        .rubrik-header p {
            font-size: 1.1rem;
        }
        
        .tim-box {
            font-size: 1.2rem;
        }
        
        .profile-info .name {
            font-size: 1.2rem;
        }
        
        .profile-info .nim {
            font-size: 1.2rem;
        }
        
        .supervisor-section .title {
            font-size: 1.2rem;
        }
        
        .supervisor-section .supervisor {
            font-size: 1.1rem;
        }
        
        .footer-info p {
            font-size: 1.1rem;
        }
        
        .logo {
            width: 60px;
            height: 60px;
        }
    }
</style>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rubrik Penilaian</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-10 col-lg-12 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body p-0">
                <div class="rubrik-container">
                    <div class="logo-container">
                        <img src="{{ asset('img/Logo_Almamater_UPI.svg') }}" alt="Logo UPI" class="logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="Logo Pendidikan" class="logo">
                    </div>
                    
                    <div class="rubrik-header">
                        <h1>RUBRIK PENILAIAN<br>MENULIS TEKS EKSPLANASI</h1>
                        <h2>KELAS V SEKOLAH DASAR</h2>
                        
                        <p>Website Rubrik Penilaian Menulis Teks Eksplanasi ini dikembangkan sebagai bagian dari tugas akhir dalam rangka penyelesaian studi pada Program Magister Pendidikan Guru Sekolah Dasar</p>
                    </div>
                    
                    <div class="profile-info">
                        <div class="tim-box">TIM PENGEMBANG</div>
                        <div class="nim">ERMA ROSMAWATI</div>
                        <div class="nim">NIM. 2307977</div>
                    </div>
                    
                    <div class="supervisor-section">
                        <div class="title">Dosen Pembimbing:</div>
                        <div class="supervisor">Dr. Seni Apriliya, M. Pd.</div>
                        <div class="supervisor">Prof. Dr. Heri Yusuf Muslihin, M. Pd.</div>
                    </div>
                    
                    <div class="footer-info">
                        <p>MAGISTER PENDIDIKAN GURU SEKOLAH DASAR</p>
                        <p>UNIVERSITAS PENDIDIKAN INDONESIA</p>
                        <p>KAMPUS TASIKMALAYA</p>
                        <p>2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection