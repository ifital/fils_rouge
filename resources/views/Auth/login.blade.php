<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="w-full max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block font-medium">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Se connecter
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            Pas encore de compte ? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">S'inscrire</a>
        </p>
    </div>
</body>
</html>
