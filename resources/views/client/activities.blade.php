<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All The Activities </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header Navigation -->
    <header class="bg-black text-white shadow-md relative">
        <!-- Main navigation container -->
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
        <div class="">
            <img src="/images/Design_sans_titre_13.png" alt="logo"  class="h-12">
        </div>
            <!-- Desktop Navigation Links (Hidden on Mobile) -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ Route('client.home') }}" class="hover:text-yellow-400 transition duration-200">home</a>
                <a href="{{ Route('client.activities.my.activities') }}" class="hover:text-yellow-400 transition duration-200">my activities</a>
                <a href="{{ Route('client.reservations.index') }}" class="hover:text-yellow-400 transition duration-200">my resrevations</a>
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
                <a href="{{ Route('client.home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">home</a>
                <a href="{{ Route('client.reservations.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">my resrevations</a>
                <a href="{{ Route('client.home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">my activities</a>
             </div>
        </div>
    </header>
    <!-- Main Content Area -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">
            All the activities
        </h1>

        <!-- Activities Grid/List -->
        <div class="">

            @foreach($activities as $index => $activity)
                <!-- Activity {{ $index + 1 }}: {{ $activity->name }} -->
                <div class="flex flex-col md:flex-{{ $index % 2 == 0 ? 'row' : 'row-reverse' }} h-80 overflow-hidden">
                    <!-- Text Content -->
                    <div class="w-full md:w-1/2 order-2 md:order-1 bg-gray-50 p-6 lg:p-8 shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $activity->name }}</h2>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed font-bold">
                            {{ $activity->description }}
                        </p>
                        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between">
                            <ul class="space-y-2 text-b mb-4 sm:mb-0">
                                <!-- Price -->
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-black flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-semibold text-gray-800">Price: {{ $activity->price }} MAD</span>
                                </li>
                                
                                <!-- Status -->
                                @if($activity->status)
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-black flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-semibold text-gray-800">{{ $activity->status }}</span>
                                </li>
                                @endif
                            </ul>
                            <a href="{{ route('client.activities.detaills', $activity->id) }}" class="inline-block bg-yellow-400 text-black px-4 py-2 rounded-full font-bold text-xs hover:bg-yellow-500 transition duration-200 whitespace-nowrap mt-4 sm:mt-0">
                                reserve now
                            </a>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-1/2 order-1 md:order-2 ">
                        <img src="{{ asset('storage/' . $activity->images) }}" alt="{{ $activity->name }}" class="h-full w-full object-cover">
                    </div>
                </div>
            @endforeach

        </div> <!-- End Activities List -->
        <div class="mt-6">
            {{ $activities->links() }}
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-10">
        <div class="container mx-auto px-4">
            <!-- Footer Navigation Links -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Quick Links Column -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                The House
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Surf
                            </a>
                        </li>
                    </ul>
                </div>
    
                <!-- Services Column -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Services</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Accommodations
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Coworking
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Surf Lessons
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Equipment Rental
                            </a>
                        </li>
                    </ul>
                </div>
    
                <!-- Contact Column -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Contact Us</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Taghazout, 500m from Beach, Morocco</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:kekaisurf7@gmail.com" class="hover:text-yellow-400 transition duration-300">kekaisurf7@gmail.com</a>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>+212 600 000 000</span>
                        </li>
                        <li class="flex items-start">
                            <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </footer>

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