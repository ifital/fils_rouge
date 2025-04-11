<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kekai Surf House</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <!-- Header/Navbar -->
    <header class="absolute top-0 left-0 right-0 z-20 bg-black" x-data="{ open: false }">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-xl font-bold text-white">LOGO</a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="#" class="text-white hover:text-yellow-400">Home</a>
                <a href="#" class="text-white hover:text-yellow-400">the rooms</a>
                <a href="#" class="text-white hover:text-yellow-400">activities</a>
                <a href="#" class="text-white hover:text-yellow-400">Contact</a>
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
                <a href="#" class="block px-2 py-1 text-white hover:text-yellow-400">Home</a>
                <a href="#" class="block px-2 py-1 text-white hover:text-yellow-400">the rooms</a>
                <a href="#" class="block px-2 py-1 text-white hover:text-yellow-400">activities</a>
                <a href="#" class="block px-2 py-1 text-white hover:text-yellow-400">Contact</a>
                <a href="/signup" class="mt-1 bg-yellow-400 text-black px-4 py-2 rounded-full hover:bg-yellow-500 transition duration-300 w-full text-center">Inscription</a>
                <a href="/signin" class="mt-1 border border-yellow-400 text-yellow-400 px-4 py-2 rounded-full hover:bg-yellow-400 hover:text-black transition duration-300 w-full text-center">connexion</a>
            </nav>
        </div>
    </header>
    <!-- Section 2: Rooms -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">THE DORMS AND PRIVATE ROOMS</h2>
            <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed mb-8">
                When you're ready to hit the waves yourself and Taghazout's surrounding beauty, our selection of private and dorm rooms provides a comfortable place to rest after a long day of adventure.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                <!-- Room cards would go here -->
            </div>
        </div>
    </section>
</body>
</html>