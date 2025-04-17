<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation #{{ $reservation->id }} - Détails</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header Navigation -->
    <header class="bg-black text-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                LOGO
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="hover:text-yellow-400 transition duration-200">Home</a>
                <a href="{{ route('rooms.index') }}" class="hover:text-yellow-400 transition duration-200">Chambres</a>
                <a href="{{ route('activities.index') }}" class="hover:text-yellow-400 transition duration-200">Activités</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-400 transition duration-200">Contact</a>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 items-center">
                <a href="{{ route('profile.show') }}" class="hover:text-yellow-400 transition duration-200">Mon profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-bold text-sm hover:bg-yellow-500 transition duration-200">
                        Déconnexion
                    </button>
                </form>
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </nav>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-black text-center py-4 space-y-2">
            <a href="{{ route('home') }}" class="block hover:text-yellow-400 transition duration-200">Home</a>
            <a href="{{ route('rooms.index') }}" class="block hover:text-yellow-400 transition duration-200">Chambres</a>
            <a href="{{ route('activities.index') }}" class="block hover:text-yellow-400 transition duration-200">Activités</a>
            <a href="{{ route('contact') }}" class="block hover:text-yellow-400 transition duration-200">Contact</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-6 py-12">
        <!-- Affichage des messages flash -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                {{ session('error') }}
            </div>
        @endif

        @if (session('info'))
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6">
                {{ session('info') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6">
                {{ session('warning') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:space-x-10">

            <!-- Left Column: Image and Room Details -->
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <img src="{{ asset('storage/' . $reservation->room->images) }}" 
                     alt="{{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}" 
                     class="w-full h-auto object-cover rounded-lg shadow-lg">
                
                <!-- Room Details -->
                <div class="mt-6 bg-white rounded-lg shadow p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">
                        {{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}
                    </h1>
                    
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-gray-700">{{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir mixte' }}</span>
                    </div>
                    
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <span class="text-gray-700">{{ $reservation->room->space ?? '10' }} m²</span>
                    </div>
                    
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700">Check-in: 14h, Check-out: 11h</span>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg mb-2">Description</h3>
                        <p class="text-gray-700">{{ $reservation->room->description }}</p>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg mb-2">Commodités</h3>
                        <ul class="grid grid-cols-2 gap-2">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">WiFi</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Casiers</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Draps inclus</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Salle de bain commune</span>
                            </li>
                        </ul>
                    </div>          
                </div>
            </div>

            <!-- Right Column: Reservation Details and Payment -->
            <div class="w-full md:w-1/2">
                <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">
                    <h2 class="text-xl font-semibold text-blue-900">Détails de votre réservation</h2>

                    <!-- Reservation Info -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <div>
                                <span class="text-sm text-gray-500">Numéro de réservation</span>
                                <p class="font-medium text-gray-800">#{{ $reservation->id }}</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <span class="text-sm text-gray-500">Arrivée</span>
                                <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }} à partir de 14h00</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <span class="text-sm text-gray-500">Départ</span>
                                <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }} avant 11h00</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <span class="text-sm text-gray-500">Durée du séjour</span>
                                <p class="font-medium text-gray-800">{{ $reservation->nights }} nuit(s)</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div>
                                <span class="text-sm text-gray-500">Montant total</span>
                                <p class="font-medium text-gray-800">{{ $reservation->price }} MAD</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <span class="text-sm text-gray-500">Statut du paiement</span>
                                @if($payment && $payment->status === 'paid')
                                    <p class="font-medium text-green-600">Payé</p>
                                @else
                                    <p class="font-medium text-yellow-600">En attente de paiement</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Payment Actions -->
                    <div class="pt-4 space-y-3">
                        @if($reservation->status === 'confirmed')
                            @if(!$payment || $payment->status !== 'paid')
                                <a href="{{ route('payment.checkout', $reservation->id) }}" class="block w-full bg-teal-500 text-white text-center py-3 rounded-md font-bold text-lg hover:bg-teal-600 transition duration-200 focus:outline-none">
                                    Payer maintenant avec Stripe
                                </a>
                                
                                <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-md font-bold text-lg hover:bg-red-600 transition duration-200 focus:outline-none">
                                        Annuler la réservation
                                    </button>
                                </form>
                            @else
                                <div class="py-3 px-4 bg-green-100 rounded-md text-green-800 text-center">
                                    Votre réservation est confirmée et payée. Nous avons hâte de vous accueillir !
                                </div>
                            @endif
                        @elseif($reservation->status === 'cancelled')
                            <div class="py-3 px-4 bg-red-100 rounded-md text-red-800 text-center">
                                Cette réservation a été annulée.
                            </div>
                        @endif

                        <a href="{{ route('reservations.index') }}" class="block w-full bg-gray-300 text-gray-800 text-center py-3 rounded-md font-bold text-lg hover:bg-gray-400 transition duration-200 focus:outline-none">
                            Retour à mes réservations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        // Mobile menu toggle
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script> 
</body>
</html>