<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <header class="flex justify-between items-center mb-6">
            <span class="text-sm font-semibold tracking-wider text-gray-700">LOGO</span>
            <a href="{{ route('home') }}" aria-label="Retour" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
        </header>

        <!-- Button -->
        <div class="text-center mb-6">
            <h1 class="inline-block bg-yellow-400 text-black text-sm font-semibold py-2 px-6 rounded-full shadow-sm">
                Mes réservations
            </h1>
        </div>

        <!-- Messages flash -->
        @if (session('success'))
            <div class="bg-green-100 rounded-lg p-4 mb-6 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 rounded-lg p-4 mb-6 text-red-700 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        @if (session('info'))
            <div class="bg-blue-100 rounded-lg p-4 mb-6 text-blue-700 border border-blue-300">
                {{ session('info') }}
            </div>
        @endif

        <!-- No reservations message -->
        @if($reservations->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg mb-4">Vous n'avez pas encore de réservations</p>
                <a href="{{ route('rooms.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-6 rounded-full">
                    Parcourir les chambres
                </a>
            </div>
        @endif

        <!-- Reservations List -->
        <div class="space-y-6">
            @foreach($reservations as $reservation)
                <div class="border-2 border-blue-500 rounded-lg bg-gray-50 p-4 md:p-6 shadow-md">
                    <div class="flex flex-col md:flex-row gap-4 md:gap-6">
                        <!-- Image -->
                        <div class="md:w-1/3 flex-shrink-0">
                            <img src="{{ asset('storage/' . $reservation->room->images) }}" 
                                alt="{{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}" 
                                class="rounded-lg w-full h-48 md:h-full object-cover">
                        </div>

                        <!-- Details -->
                        <div class="md:w-2/3 flex flex-col justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 mb-1">
                                    {{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}
                                </h2>
                                <p class="text-sm text-gray-600 leading-relaxed mb-4">
                                    {{ Str::limit($reservation->room->description, 150) }}
                                </p>
                                
                                <!-- Status Badge -->
                                <div class="mb-2">
                                    @if($reservation->status === 'cancelled')
                                        <span class="inline-block bg-red-100 text-red-700 text-xs px-2 py-1 rounded-full">
                                            Annulée
                                        </span>
                                    @elseif($reservation->payment && $reservation->payment->status === 'paid')
                                        <span class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">
                                            Confirmée - Payée
                                        </span>
                                    @else
                                        <span class="inline-block bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-full">
                                            En attente de paiement
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                                <!-- Left side: Dates & Price -->
                                <div class="flex flex-row sm:flex-col gap-4 sm:gap-0 w-full sm:w-auto justify-between">
                                    <!-- Dates -->
                                    <div class="text-sm mb-2">
                                        <p class="font-medium text-gray-700">Check-in: <span class="text-blue-600 font-semibold">{{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}</span></p>
                                        <p class="font-medium text-gray-700">Check-out: <span class="text-blue-600 font-semibold">{{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}</span></p>
                                    </div>
                                    <!-- Price -->
                                    <div class="text-right sm:text-left">
                                        <p class="text-3xl font-bold text-gray-900">{{ $reservation->price }} MAD</p>
                                        <p class="text-sm text-gray-700 font-medium">
                                            @if($reservation->room->type == 'private')
                                                Privée / <span class="text-gray-400 font-normal">{{ $reservation->nights }} nuit(s)</span>
                                            @else
                                                Dortoir / <span class="text-gray-400 font-normal">{{ $reservation->nights }} nuit(s)</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <!-- Right side: Actions -->
                                <div class="w-full sm:w-auto flex flex-col gap-2">
                                    <a href="{{ route('reservations.show', $reservation->id) }}" class="bg-teal-500 text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-teal-600 transition duration-200 text-center">
                                        Voir les détails
                                    </a>
                                    
                                    @if($reservation->status !== 'cancelled' && (!$reservation->payment || $reservation->payment->status !== 'paid'))
                                        <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-black text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-gray-800 transition duration-200 w-full">
                                                Annuler la réservation
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $reservations->links() }}
        </div>
    </div>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        // Additional JavaScript if needed
    </script> 
</body>
</html>