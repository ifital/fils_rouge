<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $room->room_number }} - Détails et Réservation</title>
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

        @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="flex flex-col md:flex-row md:space-x-10">

            <!-- Left Column: Image -->
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <img src="{{ asset('storage/' . $room->images) }}" alt="{{ $room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $room->room_number }}" 
                     class="w-full h-auto object-cover rounded-lg shadow-lg">
                
                <!-- Room Details -->
                <div class="mt-6 bg-white rounded-lg shadow p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">
                        {{ $room->type == 'private' ? 'Chambre privée' : 'Dortoir' }} #{{ $room->room_number }}
                    </h1>
                    
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-gray-700">{{ $room->type == 'private' ? 'Chambre privée' : 'Dortoir mixte' }}</span>
                    </div>
                    
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <span class="text-gray-700">{{ $room->space ?? '10' }} m²</span>
                    </div>
                    
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700">Check-in: 14h, Check-out: 11h</span>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg mb-2">Description</h3>
                        <p class="text-gray-700">{{ $room->description }}</p>
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

            <!-- Right Column: Booking Form -->
            <div class="w-full md:w-1/2">
                <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">
                    <h2 class="text-xl font-semibold text-blue-900">Réservez maintenant</h2>

                    <!-- Price -->
                    <div>
                        <span class="text-4xl font-bold text-teal-500">{{ $room->price }} MAD</span>
                        <span class="text-xl text-gray-500 ml-2">par nuit</span>
                    </div>

                    <form action="{{ route('client.reservation.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        
                        <!-- Duration Selector -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Durée du séjour</label>
                            <div class="flex items-center">
                                <button type="button" id="decrease-nights" class="bg-red-500 text-white p-2 rounded-l-md hover:bg-red-600 transition duration-200 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <input type="number" id="nights" name="nights" value="2" min="1" max="30" class="bg-white text-center px-6 py-2 border-t border-b border-gray-300 flex-grow text-gray-700" readonly>
                                <button type="button" id="increase-nights" class="bg-teal-500 text-white p-2 rounded-r-md hover:bg-teal-600 transition duration-200 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Date Picker -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Dates du séjour</label>
                            <div class="flex items-center border border-gray-300 rounded-md overflow-hidden bg-white">
                                <div class="bg-blue-900 p-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" name="check_in" class="px-4 py-2 text-gray-700 flex-grow" required>
                            </div>
                        </div>

                        <!-- Guest Information -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nombre de personnes</label>
                            <input type="number" name="guests" min="1" max="{{ $room->type == 'private' ? '2' : '8' }}" value="1" class="w-full border border-gray-300 rounded-md px-4 py-2">
                        </div>

                        <!-- Summary -->
                        <p class="text-sm text-gray-500 mb-4">
                            Vous paierez <span class="font-semibold text-gray-700"><span id="total-price">{{ $room->price * 2 }}</span> MAD</span> pour <span id="night-count" class="font-semibold text-gray-700">2 nuits</span>
                        </p>

                        <!-- Confirm Button -->
                        <button type="submit" class="w-full bg-yellow-400 text-black py-3 rounded-md font-bold text-lg hover:bg-yellow-500 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Confirmer la réservation
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- JavaScript for Mobile Menu Toggle and Booking Form -->
    <script>
        // Mobile menu toggle
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Booking duration controls
        const decreaseNights = document.getElementById('decrease-nights');
        const increaseNights = document.getElementById('increase-nights');
        const nightsInput = document.getElementById('nights');
        const nightCount = document.getElementById('night-count');
        const totalPrice = document.getElementById('total-price');
        const pricePerNight = {{ $room->price }};

        function updateNightCount() {
            const nights = parseInt(nightsInput.value);
            nightCount.textContent = nights + (nights === 1 ? ' nuit' : ' nuits');
            totalPrice.textContent = (pricePerNight * nights).toFixed(2);
        }

        if (decreaseNights && increaseNights && nightsInput) {
            decreaseNights.addEventListener('click', () => {
                const currentValue = parseInt(nightsInput.value);
                if (currentValue > 1) {
                    nightsInput.value = currentValue - 1;
                    updateNightCount();
                }
            });

            increaseNights.addEventListener('click', () => {
                const currentValue = parseInt(nightsInput.value);
                if (currentValue < 30) {
                    nightsInput.value = currentValue + 1;
                    updateNightCount();
                }
            });
        }
    </script> 

</body>
</html>