<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Ajouter Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 max-w-lg bg-white shadow-lg rounded-lg mt-10">
        <h2 class="text-2xl font-bold text-center mb-6">Inscription</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nom -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror" required>
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmation mot de passe -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('password_confirmation') border-red-500 @enderror" required>
                @error('password_confirmation')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Téléphone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('phone') border-red-500 @enderror" value="{{ old('phone') }}" required>
                @error('phone')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nationalité -->
            <div class="mb-4">
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationalité</label>
                <input type="text" name="nationality" id="nationality" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('nationality') border-red-500 @enderror" value="{{ old('nationality') }}">
                @error('nationality')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rôle -->
            <div class="mb-6">
                <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
                <select name="role" id="role" class="mt-1 block w-full px-4 py-2 border rounded-lg @error('role') border-red-500 @enderror" required>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                    <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                </select>
                @error('role')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">S'inscrire</button>
        </form>

        <p class="mt-3 text-center text-sm">Déjà inscrit ? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Se connecter ici</a></p>
    </div>
</body>
</html>
