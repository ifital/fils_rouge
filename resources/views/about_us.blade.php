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
            <a href="#" class="hover:text-yellow-400 text-yellow-400">about us</a>
            <a href="#" class="hover:text-yellow-400">Contact</a>
            <a href="/signin" class="hover:text-yellow-400">Sign In</a>
            <a href="/signup" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300">Sign Up</a>
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
    <section class="relative hero-bg-image pt-32 pb-16 md:pt-48 md:pb-24 text-center" style="background-image: url('https://picsum.photos/seed/aboutus/1600/900');">
        <!-- Overlay for text readability on background -->
        <div class="absolute inset-0 bg-gradient-to-t from-yellow-100 via-yellow-50 to-transparent opacity-90"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">ABOUT BLUE WAVES HOUSE</h2>
            <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">
                Discover our story, our passion for surf culture, and our commitment to creating unforgettable experiences in the heart of Taghazout.
            </p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://picsum.photos/seed/story/600/400" alt="Blue Waves House Story" class="rounded-lg shadow-lg">
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

