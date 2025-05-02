<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves - About Us</title>
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
            <a href="/" class="hover:text-yellow-400">home</a>
            <a href="#" class="hover:text-yellow-600 text-yellow-400">about us</a>
            <a href="{{ route('contact') }}" class="hover:text-yellow-400">Contact</a>
            <a href="{{ route('register') }}" class="hover:text-yellow-400">Sign In</a>
            <a href="{{ route('login') }}" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300">Sign Up</a>
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
            <a href="#" class="block px-2 py-1 hover:text-yellow-400">Home</a>
            <a href="#" class="block px-2 py-1 text-yellow-400 hover:text-yellow-400">About Us</a>
            <a href="#" class="block px-2 py-1 hover:text-yellow-400">The House</a>
            <a href="#" class="block px-2 py-1 hover:text-yellow-400">Coworking</a>
            <a href="#" class="block px-2 py-1 hover:text-yellow-400">Contact</a>
            <a href="/signin" class="block px-2 py-1 hover:text-yellow-400 w-full text-center">Sign In</a>
            <a href="/signup" class="mt-1 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300 w-full text-center">Sign Up</a>
        </nav>
    </div>
</header>

    <!-- Hero Section -->
    <section class="relative hero-bg-image pt-32 pb-16 md:pt-48 md:pb-24 text-center" style="background-image: url('images/1734444212989.jpg');">
        <!-- Overlay for text readability on background -->
        <div class="absolute inset-0 "></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">ABOUT BLUE WAVES HOUSE</h2>
            <p class="text-white max-w-3xl mx-auto leading-relaxed font-bold">
                Discover our story, our passion for surf culture, and our commitment to creating unforgettable experiences in the heart of Taghazout.
            </p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="images/1734444280212.jpg" alt="Blue Waves House Story" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Our Story</h3>
                    <div class="text-gray-600 space-y-4">
                        <p>
                            Blue Waves House was born from a deep passion for surfing and the beautiful coastline of Taghazout. Founded in 2018 by a group of surf enthusiasts, our vision was to create more than just accommodation – we wanted to build a community where travelers could connect, explore, and experience the magic of Morocco's surf culture.
                        </p>
                        <p>
                            What started as a small surf camp has evolved into a vibrant hostel that combines comfortable living spaces, modern amenities, and an authentic Moroccan experience. Over the years, we've welcomed thousands of guests from around the world, each contributing to our ever-growing story.
                        </p>
                        <p>
                            Today, Blue Waves House stands as a testament to our commitment to providing a unique, welcoming space for surf enthusiasts, digital nomads, and travelers seeking an authentic connection with Taghazout's stunning coastal environment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Philosophy -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Philosophy</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-yellow-400 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Community</h3>
                    <p class="text-gray-600">
                        We believe in the power of connection. At Blue Waves, we foster a community atmosphere where guests can share experiences, cultures, and stories.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-yellow-400 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Sustainability</h3>
                    <p class="text-gray-600">
                        We're committed to preserving the beautiful environment that surrounds us through eco-friendly practices and respect for our local community.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-yellow-400 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Experience</h3>
                    <p class="text-gray-600">
                        We strive to create memorable experiences that go beyond accommodation – from surf lessons to local excursions and cultural immersion.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Values -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Values</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Value 1 -->
                    <div class="flex">
                        <div class="bg-yellow-400 h-12 w-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Authentic Hospitality</h3>
                            <p class="text-gray-600">
                                We believe in creating genuine connections with our guests, providing warm Moroccan hospitality that makes everyone feel at home.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Value 2 -->
                    <div class="flex">
                        <div class="bg-yellow-400 h-12 w-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Environmental Respect</h3>
                            <p class="text-gray-600">
                                We're committed to sustainable practices that preserve the beautiful coastal environment that makes Taghazout so special.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Value 3 -->
                    <div class="flex">
                        <div class="bg-yellow-400 h-12 w-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Cultural Exchange</h3>
                            <p class="text-gray-600">
                                We embrace diversity and celebrate the exchange of cultures, traditions, and perspectives that our international guests bring.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Value 4 -->
                    <div class="flex">
                        <div class="bg-yellow-400 h-12 w-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Adventure Spirit</h3>
                            <p class="text-gray-600">
                                We foster a spirit of adventure and openness to new experiences, encouraging our guests to explore, discover, and challenge themselves.
                            </p>
                        </div>
                    </div>
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
                    <li><a href="/" class="hover:text-yellow-400 transition duration-300">Home</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">The House</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">Surf</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">Contact</a></li>
                </ul>
            </div>

            <!-- Contacts -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Contacts us</h3>
                <p class="mb-2">Email us:</p>
                <a href="mailto:kekaisurf7@gmail.com" class="hover:text-yellow-400 transition duration-300">kekaisurf7@gmail.com</a>
                <p class="mt-2 mb-2">Call us:</p>
                <a href="tel:+212600000000" class="hover:text-yellow-400 transition duration-300">+212 6XX-XXX-XXX</a>
            </div>