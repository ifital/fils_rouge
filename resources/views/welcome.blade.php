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
        <a href="#" class="text-xl font-bold">LOGO</a>
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
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">WHY STAY BLUE WAVES HOUSE?</h2>
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
                <div class="text-gray-700 leading-relaxed">
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
                <div class="text-gray-700 leading-relaxed">
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
    <footer class="bg-gray-800 text-gray-400 py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Quick Link</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">Home</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">The House</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">Surf</a></li>
                     <!-- Add other links as needed -->
                </ul>
            </div>

            <!-- Contacts -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Contacts us</h3>
                <p class="mb-2">Email us:</p>
                <a href="mailto:kekaisurf7@gmail.com" class="hover:text-yellow-400 transition duration-300">kekaisurf7@gmail.com</a>
                <!-- Add phone number or address if needed -->
            </div>

            <!-- Follow Us -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Follow us</h3>
                <div class="flex space-x-4">
                    <!-- Add Social Media Icons/Links here -->
                    <a href="#" aria-label="Facebook" class="hover:text-yellow-400 transition duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"> /* Facebook Icon Placeholder */ <path d="M..."/> </svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="hover:text-yellow-400 transition duration-300">
                         <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"> /* Instagram Icon Placeholder */ <path d="M..."/> </svg>
                    </a>
                    <!-- Add more social icons as needed -->
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
