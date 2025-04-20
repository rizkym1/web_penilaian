<x-guest-layout>
    <style>
        body {
            background-color: #FDF6EC;
            font-family: 'Comic Neue', cursive;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .register-card {
            background-color: #FFF;
            border: 3px solid #FFB84C;
            border-radius: 20px;
            padding: 2rem 2.5rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .register-title {
            font-size: 26px;
            font-weight: bold;
            color: #FF6B6B;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-weight: bold;
            color: #333;
            font-size: 16px;
        }
        .form-control {
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 15px;
            border: 1px solid #ccc;
            width: 100%;
        }
        .btn-register {
            background-color: #FFD93D;
            border: none;
            color: #333;
            border-radius: 12px;
            padding: 10px 0;
            font-weight: bold;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-register:hover {
            background-color: #FFC107;
        }
        .text-center {
            text-align: center;
        }
        .login-link {
            margin-top: 1rem;
            font-size: 14px;
        }
        .login-link a {
            color: #4D96FF;
            font-weight: bold;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Google Font Lucu -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">

    <div class="register-container">
        <div class="register-card">
            <div class="register-title">🎒 Daftar Akun</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">👦 Nama Lengkap</label>
                    <input id="name" type="text" name="name" :value="old('name')" class="form-control" required autofocus>
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">📧 Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" class="form-control" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">🔐 Password</label>
                    <input id="password" type="password" name="password" class="form-control" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">🔁 Ulangi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <!-- Tombol Daftar -->
                <div class="mb-3">
                    <button type="submit" class="btn-register">🎉 Daftar Sekarang</button>
                </div>

                <!-- Sudah punya akun -->
                <div class="text-center login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
