<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails de réservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-6 py-12">
    <!-- Affichage des messages -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if(session('info'))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
            <p>{{ session('info') }}</p>
        </div>
    @endif

    @if(session('warning'))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
            <p>{{ session('warning') }}</p>
        </div>
    @endif

    @if(!isset($reservation))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p>Erreur: Aucune information de réservation trouvée.</p>
        <a href="{{ route('client.my_reservations') }}" class="underline">Retour à mes réservations</a>
    </div>
    @else
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Détails de votre réservation</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Informations sur la chambre -->
            <div>
                <h2 class="text-xl font-semibold text-blue-900 mb-4">Chambre réservée</h2>
                
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $reservation->room->images) }}" alt="{{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}" 
                         class="w-full h-48 object-cover rounded-lg shadow">
                </div>
                
                <div class="mb-4">
                    <p class="text-lg font-medium">{{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}</p>
                    <p class="text-gray-600">{{ $reservation->room->description }}</p>
                </div>
            </div>
            
            <!-- Détails de la réservation -->
            <div>
                <h2 class="text-xl font-semibold text-blue-900 mb-4">Informations de séjour</h2>
                
                <div class="space-y-3">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-700">Check-in: {{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-700">Check-out: {{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700">Durée: {{ \Carbon\Carbon::parse($reservation->check_in)->diffInDays(\Carbon\Carbon::parse($reservation->check_out)) }} nuits</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="text-gray-700">Prix total: <span class="font-semibold">{{ $reservation->price }} MAD</span></span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700">Statut: 
                            @if(isset($payment) && $payment && $payment->status === 'paid')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Payé</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">En attente de paiement</span>
                            @endif
                        </span>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="mt-8 space-y-4">
                    @if(!isset($payment) || !$payment || $payment->status !== 'paid')
                        <a href="{{ route('client.payment.checkout', $reservation->id) }}" class="block w-full bg-teal-500 text-white text-center py-3 rounded-md font-bold text-lg hover:bg-teal-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Payer maintenant
                        </a>
                    @endif
                    
                    @if($reservation->status !== 'cancelled' && (!isset($payment) || !$payment || $payment->status !== 'paid'))
                        <form action="{{ route('client.reservation.cancel', $reservation->id) }}" method="POST" class="block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-md font-bold text-lg hover:bg-red-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Annuler la réservation
                            </button>
                        </form>
                    @endif
                    
                    <a href="{{ route('client.my_reservations') }}" class="block w-full bg-gray-300 text-gray-800 text-center py-3 rounded-md font-bold text-lg hover:bg-gray-400 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                        Retour à mes réservations
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</body>
</html>