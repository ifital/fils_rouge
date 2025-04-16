<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Blue Waves</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .signup-container {
            background-image: url('https://images.unsplash.com/photo-1502680390469-be75c86b636f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .input-field {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
            margin-bottom: 16px;
        }
        .signup-button {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
            border-radius: 20px;
            padding: 10px 40px;
            transition: all 0.3s ease;
        }
        .signup-button:hover {
            background-color: #f5cb00;
            transform: translateY(-2px);
        }
        .label {
            color: white;
            font-size: 14px;
            margin-bottom: 4px;
        }
    </style>
</head>
<body class="m-0 p-0">
    <div class="signup-container flex items-center justify-center">
        <div class="w-full max-w-md p-8">
            <!-- Logo en haut à gauche -->
            <div class="text-white text-xl font-medium absolute top-8 left-8">
                logo
            </div>
            
            <div class="mt-12 text-center">
                <h2 class="text-3xl font-bold text-white mb-2">sign up</h2>
                <p class="text-white mb-6">If you have account? <a href="{{ route('login') }}" class="text-yellow-300 hover:underline">Login</a></p>
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

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label for="name" class="block label">first name:</label>
                    <input type="text" name="name" id="name" class="input-field" required>
                </div>

                <div class="mb-2">
                    <label for="email" class="block label">Email:</label>
                    <input type="email" name="email" id="email" class="input-field" required>
                </div>

                <div class="mb-2">
                    <label for="password" class="block label">password:</label>
                    <input type="password" name="password" id="password" class="input-field" required>
                </div>

                <div class="mb-2">
                    <label for="phone" class="block label">number phone:</label>
                    <input type="text" name="phone" id="phone" class="input-field" required>
                </div>

                <!-- Les champs supplémentaires peuvent être masqués sur cette version simplifiée -->
                <input type="hidden" name="nationality" id="nationality" value="">
                <input type="hidden" name="password_confirmation" id="password_confirmation">
                
                <div class="flex justify-center mt-6">
                    <button type="submit" class="signup-button">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>