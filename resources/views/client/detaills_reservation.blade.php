<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de votre réservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header Navigation -->
    <header class="bg-black text-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <a href="{{ route('client.home') }}">LOGO</a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('client.home') }}" class="hover:text-yellow-400 transition duration-200">Home</a>
                <a href="{{ route('client.home') }}" class="hover:text-yellow-400 transition duration-200">Chambres</a>
                <a href="{{ route('client.activities.index') }}" class="hover:text-yellow-400 transition duration-200">Activités</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-400 transition duration-200">Contact</a>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 items-center">
                <a href="{{ route('client.profile.show') }}" class="hover:text-yellow-400 transition duration-200">Mon profil</a>
                <a href="{{ route('client.my_reservations') }}" class="hover:text-yellow-400 transition duration-200">Mes réservations</a>
                <a href="{{ route('logout') }}" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-bold text-sm hover:bg-yellow-500 transition duration-200">
                    Déconnexion
                </a>
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
            <a href="{{ route('client.home') }}" class="block hover:text-yellow-400 transition duration-200">Home</a>
            <a href="{{ route('client.home') }}" class="block hover:text-yellow-400 transition duration-200">Chambres</a>
            <a href="{{ route('client.activities.index') }}" class="block hover:text-yellow-400 transition duration-200">Activités</a>
            <a href="{{ route('contact') }}" class="block hover:text-yellow-400 transition duration-200">Contact</a>
            <a href="{{ route('client.my_reservations') }}" class="block hover:text-yellow-400 transition duration-200">Mes réservations</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-6 py-12">
        <!-- Flash Messages -->
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

        <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Détails de votre réservation</h1>

            <div class="flex flex-col md:flex-row md:space-x-8">
                <!-- Reservation Details -->
                <div class="w-full md:w-2/3">
                    <div class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-blue-900">Réservation #{{ $reservation->id }}</h2>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                {{ $reservation->status == 'confirmed' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $reservation->status == 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $reservation->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $reservation->status == 'confirmed' ? 'En attente de paiement' : '' }}
                                {{ $reservation->status == 'paid' ? 'Payée' : '' }}
                                {{ $reservation->status == 'cancelled' ? 'Annulée' : '' }}
                            </span>
                        </div>

                        <div class="border-b pb-4">
                            <h3 class="text-lg font-medium text-gray-700 mb-2">Chambre</h3>
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/' . $reservation->room->images) }}" alt="Room" class="w-20 h-20 object-cover rounded-md">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $reservation->room->room_number }}</p>
                                    <p class="text-sm text-gray-600">{{ $reservation->room->description }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-b pb-4">
                            <h3 class="text-lg font-medium text-gray-700 mb-2">Dates de séjour</h3>
                            <div class="flex space-x-12">
                                <div>
                                    <p class="text-sm text-gray-500">Arrivée</p>
                                    <p class="font-semibold text-gray-800">{{ $reservation->check_in->format('d/m/Y') }}</p>
                                    <p class="text-xs text-gray-500">À partir de 14h00</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Départ</p>
                                    <p class="font-semibold text-gray-800">{{ $reservation->check_out->format('d/m/Y') }}</p>
                                    <p class="text-xs text-gray-500">Jusqu'à 11h00</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Durée</p>
                                    <p class="font-semibold text-gray-800">{{ $reservation->check_in->diffInDays($reservation->check_out) }} nuits</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-700 mb-2">Détails du prix</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <p class="text-gray-600">{{ $reservation->room->price }} MAD x {{ $reservation->check_in->diffInDays($reservation->check_out) }} nuits</p>
                                    <p class="text-gray-800">{{ $reservation->price }} MAD</p>
                                </div>
                                <div class="border-t pt-2 mt-2">
                                    <div class="flex justify-between font-semibold">
                                        <p>Total</p>
                                        <p>{{ $reservation->price }} MAD</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div class="w-full md:w-1/3 mt-8 md:mt-0">
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Paiement</h3>
                        
                        @if($payment && $payment->status == 'paid')
                            <div class="bg-green-50 text-green-800 p-4 rounded-md mb-4">
                                <div class="flex">
                                    <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="font-medium">Payé le {{ $payment->payment_date->format('d/m/Y') }}</p>
                                </div>
                                <p class="mt-2 text-sm">Méthode: {{ $payment->payment_method == 'card' ? 'Carte bancaire' : $payment->payment_method }}</p>
                            </div>
                        @else
                            <div class="space-y-4">
                                <p class="text-gray-600">Montant à payer: <span class="font-bold text-gray-800">{{ $reservation->price }} MAD</span></p>
                                
                                <a href="{{ route('payment.checkout', ['reservation' => $reservation->id]) }}" 
                                   class="block w-full bg-green-500 text-white py-3 px-4 rounded-md font-bold text-center hover:bg-green-600 transition duration-200">
                                    Procéder au paiement
                                </a>
                                
                                <div class="text-sm text-gray-500 mt-2">
                                    <p>Paiement sécurisé via Stripe</p>
                                    <div class="flex space-x-2 mt-2">
                                        <img src="{{ asset('images/visa.svg') }}" alt="Visa" class="h-6">
                                        <img src="{{ asset('images/mastercard.svg') }}" alt="Mastercard" class="h-6">
                                    </div>
                                </div>
                            </div>
                            
                            @if($reservation->status == 'confirmed')
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <form action="{{ route('client.reservation.cancel', ['reservation' => $reservation->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-red-600 font-medium hover:text-red-800 transition duration-200">
                                            Annuler la réservation
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endif
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