<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLUE WAVES </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            yellow: {
              400: "#FFD700", 
            },
          },
        },
      },
    }
  </script>
</head>
<body class="min-h-screen bg-white font-sans">
   <!-- Header Navigation -->
   <header class="bg-black text-white shadow-md relative">
    <!-- Main navigation container -->
    <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-bold">
            LOGO
        </div>

        <!-- Desktop Navigation Links (Hidden on Mobile) -->
        <div class="hidden md:flex space-x-8 items-center">
            <a href="{{ Route('client.reservations.index') }}" class="hover:text-yellow-400 transition duration-200">my resrevations</a>
            <a href="{{ Route('client.activities.index') }}" class="hover:text-yellow-400 transition duration-200">activities</a>
        </div>
        <!-- Right Side Buttons (Login/Signup & Mobile Toggle) -->
        <div class="flex space-x-4 items-center">
            <a href="{{ Route('logout') }}" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-semibold text-sm hover:bg-yellow-500 transition duration-200">
                log out
            </a>
            <a href="{{ Route('client.profile.show') }}" class="hover:text-yellow-400 transition duration-200" aria-label="My Profile" title="My Profile">
              <span class="sr-only">My Profile</span> <!-- Pour l'accessibilité -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
           </a>
             <!-- Mobile Menu Button (Visible only on Mobile) -->
             <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <span class="sr-only">Open main menu</span> <!-- Accessibility improvement -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
              </button>
        </div>
    </nav>

    <!-- Mobile Menu Dropdown (Initially Hidden) -->
    <div id="mobile-menu" class="hidden md:hidden bg-black absolute w-full left-0 top-full z-20">
         <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-center">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">my resrevations</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">activities</a>
         </div>
    </div>
</header>
<!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
    <!-- Header -->
    <h1 class="text-2xl font-bold text-center mb-4">THE DORMS AND PRIVATE ROOMS</h1>
    
    <p class="text-center mb-8 max-w-3xl mx-auto text-xl">
      When you're ready for the easiest and most comfortable stay in town, you'll be
      happy to know that our hostel has the best location in the city center plus
      you'll be met with a lot of adventure.
    </p>

    <!-- Room Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
      @forelse($rooms as $room)
      <div class="border border-gray-200 rounded overflow-hidden flex">
          <div class="w-1/3">
            <img 
              src="{{ asset('storage/' . $room->images) }}" 
              alt="Room {{ $room->room_number }}" 
              class="h-full w-full object-cover"
            />
          </div>
          <div class="w-2/3 p-4 flex flex-col justify-between">
            <div>
              <h3 class="font-bold">{{ $room->type == 'private' ? 'Private Room' : 'Mixed Dorm' }} #{{ $room->room_number }}</h3>
              <p class="text-xs mt-1">
                {{ $room->description }}
              </p>
            </div>
            <div class="flex justify-between items-end mt-4">
              <div>
                <div class="flex items-center">
                  <span class="mr-2">1</span>
                  <span class="text-xs">• {{ $room->space ?? '10' }} m²</span>
                </div>
                <div class="text-lg font-bold">{{ $room->price }} MAD</div>
                <div class="text-xs">/ 1 night</div>
              </div>
              <a href="{{ route('client.rooms.show', $room->id) }}" class="bg-yellow-400 text-black font-bold text-sm px-4 py-1 rounded">
                View Details
              </a>
            </div>
          </div>
      </div>
      @empty
      <div class="col-span-2 text-center py-8">
          <p class="text-gray-500">Aucune chambre disponible pour le moment.</p>
      </div>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="mb-8">
      {{ $rooms->links() }}
    </div>
    <!-- What's Included Section -->
    <div class="">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-10">What's included?</h2>
            
            <div class="flex flex-col md:flex-row bg-white rounded-lg overflow-hidden shadow-lg">
                <!-- Image -->
                <div class="md:w-1/2">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-wZMSCTTLnSH5d8ShivK9eaMF3n1swX.png" alt="Panoramic terrace view" class="w-full h-full object-cover">
                </div>
                
                <!-- Amenities List -->
                <div class="md:w-1/2 p-6 md:p-8 flex flex-col justify-center">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Fully Equipped Shared Kitchen</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Shared Toilets and Baths</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Dorm Lockers</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Cozy Panoramic Terrace</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Fiber Optic WiFi</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Wetsuit Room</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Surfboard Rack</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Fully Equipped Kitchen -->
    <div class="mb-12 p-10">
      <h2 class=" text-center text-2xl font-bold mb-6">Fully equipped kitchen</h2>
      <div class="flex flex-col md:flex-row gap-6">
        <div class="md:w-1/2">
          <img 
            src="https://placehold.co/500x300" 
            alt="Fully equipped kitchen" 
            class="w-full h-auto rounded"
          />
        </div>
        <div class="md:w-1/2">
          <p class="text-xl font-semibold p-10">
            Our fully equipped kitchen allows you to prepare your own meals, saving money during your travels. 
            The kitchen includes a stove, oven, microwave, refrigerator, and all the utensils you need. 
            It's a great place to meet other travelers while cooking your favorite dishes. 
            We also provide basic ingredients like oil, salt, and spices for your convenience.
          </p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="border-t pt-6 mt-12">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
          <h3 class="font-bold text-sm mb-2">CONTACT INFO</h3>
          <p class="text-xs">Address: 123 Main St</p>
          <p class="text-xs">Phone: +123 456 7890</p>
        </div>
        <div>
          <h3 class="font-bold text-sm mb-2">LOCATION INFO</h3>
          <p class="text-xs">City Center, close to all attractions</p>
        </div>
        <div>
          <h3 class="font-bold text-sm mb-2">EMAIL US</h3>
          <p class="text-xs">info@hostelbooking.com</p>
        </div>
      </div>
    </footer>
  </main>
  <!-- JavaScript for Mobile Menu Toggle -->
  <script>
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');

        const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', !isExpanded);
    });
</script>
</body>
</html>
