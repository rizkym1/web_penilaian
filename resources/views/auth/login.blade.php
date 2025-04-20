<x-guest-layout>
    <style>
        body {
            background-color: #FFF7E9;
            font-family: 'Comic Neue', cursive;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            background-color: #FFFBF5;
            border: 3px dashed #FFA447;
            border-radius: 25px;
            padding: 2.5rem;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.7s ease;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(15px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .login-title {
            font-size: 30px;
            font-weight: bold;
            color: #74C0FC;
            text-align: center;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: bold;
            color: #333;
            font-size: 16px;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 15px;
            border: 1px solid #ccc;
            width: 100%;
        }
        .form-check-label {
            font-size: 14px;
            color: #555;
        }
        .btn-login {
            background-color: #FFD93D;
            border: none;
            color: #333;
            border-radius: 12px;
            padding: 10px 0;
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #FFC107;
        }
        .text-center {
            text-align: center;
        }
        .register-text {
            margin-top: 1.5rem;
            font-size: 14px;
        }
        .register-text a {
            color: #FF6B6B;
            font-weight: bold;
            text-decoration: none;
        }
        .register-text a:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Font Lucu -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">

    <div class="login-container">
        <div class="login-card">
            <div class="login-title">🎒 Selamat Datang!</div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">📧 Email</label>
                    <input type="email" id="email" name="email" :value="old('email')" class="form-control" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">🔒 Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3">
                    <label class="form-check-label">
                        <input type="checkbox" name="remember" class="form-check-input">
                        Ingat saya
                    </label>
                </div>

                <!-- Tombol Login -->
                <div class="mb-3">
                    <button type="submit" class="btn-login">🚀 Masuk</button>
                </div>

                <!-- Register Link -->
                <div class="text-center register-text">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
