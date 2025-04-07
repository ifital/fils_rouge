<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <div class="w-full max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Créer un compte</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-medium">Nom complet</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-medium">Téléphone</label>
                <input type="text" name="phone" id="phone" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="nationality" class="block font-medium">Nationalité</label>
                <input type="text" name="nationality" id="nationality" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="password" class="block font-medium">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                S'inscrire
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            Déjà inscrit ? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
        </p>
    </div>
</body>
</html>
