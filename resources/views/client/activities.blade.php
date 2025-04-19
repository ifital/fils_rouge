<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All The Activities (Responsive)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
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
                <a href="{{ Route('client.home') }}" class="hover:text-yellow-400 transition duration-200">home</a>
                <a href="{{ Route('client.activities.index') }}" class="hover:text-yellow-400 transition duration-200">my activities</a>
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
        <div class="space-y-16">

            @foreach($activities as $index => $activity)
                <!-- Activity {{ $index + 1 }}: {{ $activity->name }} -->
                <div class="flex flex-col md:flex-{{ $index % 2 == 0 ? 'row' : 'row-reverse' }} items-center gap-8 lg:gap-12">
                    <!-- Text Content -->
                    <div class="w-full md:w-1/2 order-2 md:order-1 bg-gray-50 p-6 lg:p-8 rounded-lg shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $activity->name }}</h2>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                            {{ $activity->description }}
                        </p>
                        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between">
                            <ul class="space-y-2 text-sm mb-4 sm:mb-0">
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
                            <a href="{{ route('client.activities.detaills', $activity->id) }}" class="inline-block bg-yellow-400 text-black px-4 py-2 rounded-full font-semibold text-xs hover:bg-yellow-500 transition duration-200 whitespace-nowrap mt-4 sm:mt-0">
                                reserve now
                            </a>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-1/2 order-1 md:order-2">
                        <img src="{{ asset('storage/' . $activity->images) }}" alt="{{ $activity->name }}" class="w-full h-auto object-cover rounded-lg shadow-md">
                    </div>
                </div>
            @endforeach

        </div> <!-- End Activities List -->
        <div class="mt-6">
            {{ $activities->links() }}
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-gray-700 mt-16 pt-12 pb-8">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800">Quick Link</h4>
                <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
                    <a href="#" class="hover:text-black hover:underline">Home</a>
                    <a href="#" class="hover:text-black hover:underline">The House The</a>
                    <a href="#" class="hover:text-black hover:underline">Surf</a>
                    <a href="#" class="hover:text-black hover:underline">Activities</a>
                    <a href="#" class="hover:text-black hover:underline">Groups</a>
                    <a href="#" class="hover:text-black hover:underline">Blogs</a>
                    <a href="#" class="hover:text-black hover:underline">Contact</a>
                </div>
            </div>

            <!-- Contact Us -->
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800">contacte us</h4>
                <p class="text-sm font-semibold">Email us</p>
                <a href="mailto:bluewaves777@gmail.com" class="text-sm hover:text-black hover:underline break-all">bluewaves777@gmail.com</a>
            </div>

            <!-- Follow Us -->
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800">follow us</h4>
                <div class="flex space-x-4">
                    <!-- Replace with actual icons (e.g., Font Awesome, Heroicons SVG) -->
                    <a href="#" aria-label="Facebook" class="text-gray-600 hover:text-black">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="text-gray-600 hover:text-black">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.01 3.808.055 1.07.048 1.68.168 2.176.352.584.22 1.002.515 1.44.953.438.438.734.856.954 1.44.184.496.304 1.106.352 2.175.045 1.024.055 1.378.055 3.808s-.01 2.784-.055 3.808c-.048 1.07-.168 1.68-.352 2.176a3.88 3.88 0 01-.954 1.44 3.88 3.88 0 01-1.44.954c-.496.184-1.106.304-2.175.352-1.024.045-1.378.055-3.808.055s-2.784-.01-3.808-.055c-1.07-.048-1.68-.168-2.176-.352a3.88 3.88 0 01-1.44-.954 3.88 3.88 0 01-.954-1.44c-.184-.496-.304-1.106-.352-2.175-.045-1.024-.055-1.378-.055-3.808s.01-2.784.055-3.808c.048-1.07.168 1.68.352 2.176.22-.583.516-1.002.954-1.44a3.88 3.88 0 011.44-.954c.496-.184 1.106.304 2.175.352C9.53 2.01 9.884 2 12.315 2zm0 1.622c-2.372 0-2.69.01-3.632.053-.88.04-1.36.156-1.708.292-.402.156-.7.334-.98.613a2.26 2.26 0 00-.614.98c-.136.348-.252.828-.292 1.708-.042.942-.053 1.26-.053 3.632s.01 2.69.053 3.632c.04 1.012.17 1.56.35 2.05.203.546.507.976.97 1.44.465.466.895.768 1.44.97.49.18 1.04.31 2.05.35.942.043 1.26.053 3.632.053s2.69-.01 3.632-.053c1.012-.04 1.56-.17 2.05-.35.546-.203.976-.507 1.44-.97.466-.465.768-.895.97-1.44.18-.49.31-1.04.35-2.05.043-.942.053-1.26.053-3.632s-.01-2.69-.053-3.632c-.04-1.012-.17-1.56-.35-2.05a3.05 3.05 0 00-.97-1.44 3.05 3.05 0 00-1.44-.97c-.49-.18-1.04-.31-2.05-.35C15.006 3.63 14.686 3.62 12.315 3.62zm0 5.48a3.21 3.21 0 100 6.42 3.21 3.21 0 000-6.42zm0 1.622a1.588 1.588 0 110 3.176 1.588 1.588 0 010-3.176zm5.18-3.44a1.18 1.18 0 100 2.36 1.18 1.18 0 000-2.36z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <!-- Add other icons (Twitter, LinkedIn, etc.) as needed -->
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