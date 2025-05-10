<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .hero-bg-image {
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">

   <!-- Header/Navbar -->
<header class="absolute top-0 left-0 right-0 z-20 bg-black bg-opacity-30 text-white" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="">
            <img src="/images/Design_sans_titre_13.png" alt="logo"  class="h-12">
        </div>
        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-6 items-center">
            <a href="#" class="hover:text-yellow-600 text-yellow-400">home</a>
            <a href="{{ route('about') }}" class="hover:text-yellow-400">about us</a>
            <a href="{{ route('contact') }}" class="hover:text-yellow-400">Contact</a>
            <a href="{{ route('login') }}" class="hover:text-yellow-400">Sign In</a>
            <a href="{{ route('register') }}" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300">Sign Up</a>
        </nav>
        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path :class="{'hidden': open, 'inline-block': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    <path :class="{'inline-block': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" @click.away="open = false" class="md:hidden bg-gray-800 bg-opacity-90" x-transition>
        <nav class="px-4 pt-2 pb-4 space-y-2 flex flex-col items-center">
            <a href="{{ route('about') }}" class="block px-2 py-1 hover:text-yellow-400">about us</a>
            <a href="{{ route('contact') }}" class="block px-2 py-1 hover:text-yellow-400">contact</a>
            <!-- Remplacement de "Book Now" par "Sign Up" et "Sign In" (Mobile) -->
            <a href="{{ route('login') }}" class="block px-2 py-1 hover:text-yellow-400 w-full text-center">Sign In</a>
            <a href="{{ route('register') }}" class="mt-1 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300 w-full text-center">Sign Up</a>
            <!-- Fin du remplacement -->
        </nav>
    </div>
</header>
    <!-- Section 1: Why Stay -->
    <section class="relative hero-bg-image pt-32 pb-16 md:pt-48 md:pb-24 text-center bg-yellow-50" style="background-image: url('images/WhatsApp-Image-2024-12-07-at-3.0.jpg');">
        <!-- Overlay for text readability on background -->
        <div class="absolute inset-0  to-transparent"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">WHY STAY BLUE WAVES HOUSE?</h2>
            <p class="text-white max-w-3xl mx-auto leading-relaxed font-bold">
                Discover Taghazout from the BLUE WAVES house, your welcoming surf haven. Enjoy comfortable rooms and a panoramic terrace overlooking the waves. A dedicated area for your equipment is available. Enjoy a unique experience in a friendly atmosphere. Book now!            </p>
            <a href="#" class="mt-8 inline-block bg-yellow-400 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-500 transition duration-300">
                See The House
            </a>
        </div>
    </section>

    <!-- Section 1.5: House Images -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="overflow-hidden rounded-lg shadow-md">
                    <!-- Replace with actual image -->
                    <img src="images/6mfE7oGF7sSM6B3Caxg6cVJBxlU.webp" alt="Kekai Surf House Interior 1" class="w-full h-64 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md">
                    <!-- Replace with actual image -->
                    <img src="images/6QW9hA50CkfTp2Sru6k8yHbsEjY.jpg" alt="Kekai Surf House Interior 2" class="w-full h-64 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md">
                    <!-- Replace with actual image -->
                    <img src="images/609948284.jpg" alt="Kekai Surf House Interior 3" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Home Essentials -->
    <section class="relative hero-bg-image py-24 md:py-32 text-center text-white" style="background-image: url('images/photo-kekai-surf-house-hostel-taghazout-45.jpg');">
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">ALL YOUR HOME ESSENTIALS IN ONE PLACE</h2>
            <p class="max-w-3xl mx-auto leading-relaxed text-lg">
                Enjoy a cozy stay with fully equipped accommodations, private rooms, and dorms featuring modern amenities. Relax about terrace with ocean views, chill in our well-equipped kitchen, and store your surfboard securely. The perfect retreat after a day of adventure.
            </p>
            <a href="#" class="mt-8 inline-block bg-yellow-400 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-500 transition duration-300">
                Book Now
            </a>
        </div>
    </section>

    <!-- Section 3: Coworking Fiber Optic Wifi -->
    <section class="my-10 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">COWORKING FIBER OPTIC WIFI</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <img src="images/B4LozTXkS2ia0ZPeixtrSGABc.avif" alt="Fiber Optic Wifi Promotion" class="rounded-lg shadow-lg mx-auto max-h-80 object-cover">
                </div>
                <div class="text-gray-700 leading-relaxed font-bold">
                    <p class="mb-4">
                        If you're a digital nomad or need an efficient internet connection while on vacation, Kekai Surf house has got you covered with our cutting-edge Coworking Fiber Optic WiFi!
                    </p>
                    <p class="mb-4">
                        With lightning-fast internet speeds of up to 100 Mbps, you can easily stay connected to your work.
                    </p>
                    <p>
                        While enjoying the laid-back vibes of our surf house. Don't miss out on this opportunity to work and play in paradise - book your stay at Kekai Surf house today!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Location -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Location</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-gray-700 leading-relaxed font-bold">
                    <p class="mb-4">
                        Located just a short 500-meter walk from the renowned Taghazout Beach and 40 km from the nearest Agadir-Al Massira Airport, our surf house offers the ultimate escape for travelers.
                    </p>
                    <p>
                        And getting here is easy: simply plug Kekai Surf House into Google Maps, and we'll be waiting to welcome you to our happy, peaceful oasis.
                    </p>
                </div>
                <div>
                    <!-- Replace with actual map image -->
                    <img src="images/Tamraght-Main-Road-to-SCT-Taghaz.jpg" alt="Map showing Kekai Surf House location" class="rounded-lg shadow-lg mx-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Reviews -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Reviews</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Review Card 1 -->
                <div class="border-yellow-300 border-solid border-2 p-6 rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <!-- Replace with actual avatar -->
                        <img src="https://picsum.photos/seed/avatar1/100/100" alt="Avatar Anna Suxa" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <p class="font-semibold text-gray-800">Anna Suxa</p>
                    </div>
                    <p class="text-gray-600 italic">"I loved the vibe here, the ocean views are amazing and the staff was super friendly and helpful."</p> <!-- Placeholder text -->
                </div>

                <!-- Review Card 2 -->
                <div class="border-yellow-300 border-solid border-2 p-6 rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <!-- Replace with actual avatar -->
                        <img src="https://picsum.photos/seed/avatar2/100/100" alt="Avatar Said Johnson" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <p class="font-semibold text-gray-800">Said Johnson</p>
                    </div>
                    <p class="text-gray-600 italic">"Great location, just a short walk to the beach. The coworking space with fiber optic was perfect for getting work done."</p> <!-- Placeholder text -->
                </div>

                <!-- Review Card 3 -->
                <div class="border-yellow-300 border-solid border-2 p-6 rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <!-- Replace with actual avatar -->
                        <img src="https://picsum.photos/seed/avatar3/100/100" alt="Avatar Sophia Stern" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <p class="font-semibold text-gray-800">Sophia Stern</p>
                    </div>
                    <p class="text-gray-600 italic">"The rooftop terrace is unbeatable! Perfect spot to relax after surfing. Clean rooms and comfy beds."</p> <!-- Placeholder text -->
                </div>

                <!-- Review Card 4 -->
                <div class="border-yellow-300 border-solid border-2 p-6 rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <!-- Replace with actual avatar -->
                        <img src="https://picsum.photos/seed/avatar4/100/100" alt="Avatar Alexander Motors" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <p class="font-semibold text-gray-800">Alexander Motors</p>
                    </div>
                    <p class="text-gray-600 italic">"Highly recommend this place for solo travelers or groups. Met some amazing people here. Will definitely come back!"</p> <!-- Placeholder text -->
                </div>
            </div>
        </div>
    </section>
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
</body>
</html>
