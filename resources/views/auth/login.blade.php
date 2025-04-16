<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Blue Waves</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .login-container {
            background-image: url('https://images.unsplash.com/photo-1502680390469-be75c86b636f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .input-field {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 20px;
            padding: 12px 20px;
            width: 100%;
        }
        .login-button {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
            border-radius: 20px;
            padding: 10px 40px;
            transition: all 0.3s ease;
        }
        .login-button:hover {
            background-color: #f5cb00;
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="m-0 p-0">
    <div class="login-container flex items-center justify-center">
        <div class="w-full max-w-md p-8">
            <!-- Logo en haut à gauche -->
            <div class="text-white text-2xl font-bold absolute top-8 left-8">
                LOGO
            </div>
            
            @if ($errors->any())
                <div class="mb-4 text-red-600 bg-white bg-opacity-70 p-3 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="mt-12">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block font-medium text-white mb-2">Email :</label>
                    <input type="email" name="email" id="email" class="input-field" required autofocus>
                </div>

                <div class="mb-8">
                    <label for="password" class="block font-medium text-white mb-2">password :</label>
                    <input type="password" name="password" id="password" class="input-field" required>
                </div>

                <div class="flex justify-center mt-8">
                    <button type="submit" class="login-button">
                        connexion
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-white text-sm">
                if you dont't have acount ? <a href="{{ route('register') }}" class="text-yellow-300 hover:underline">Sign up</a>
            </p>
        </div>
    </div>
</body>
</html>