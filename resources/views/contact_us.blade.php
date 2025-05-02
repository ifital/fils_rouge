<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves - Contact Us</title>
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
        <a href="#" class="text-xl font-bold">LOGO</a>

        <nav class="hidden md:flex space-x-6 items-center">
            <a href="/" class="hover:text-yellow-400">home</a>
            <a href="{{ route('about') }}" class="hover:text-yellow-400">about us</a>
            <a href="#" class="hover:text-yellow-600 text-yellow-400">Contact</a>
            <a href="{{ route('login') }}" class="hover:text-yellow-400">Sign In</a>
            <a href="{{ route('register') }}" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300">Sign Up</a>
        </nav>

        <!-- Mobile -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-block': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    <path :class="{'inline-block': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" @click.away="open = false" class="md:hidden bg-gray-800 bg-opacity-90" x-transition>
        <nav class="px-4 pt-2 pb-4 space-y-2 flex flex-col items-center">
            <a href="/" class="block px-2 py-1 hover:text-yellow-400">Home</a>
            <a href="{{ route('about') }}" class="block px-2 py-1 hover:text-yellow-400">About Us</a>
            <a href="#" class="block px-2 py-1 text-yellow-400 hover:text-yellow-400">Contact</a>
            <a href="{{ route('login') }}" class="block px-2 py-1 hover:text-yellow-400 w-full text-center">Sign In</a>
            <a href="{{ route('register') }}" class="mt-1 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300 w-full text-center">Sign Up</a>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="relative hero-bg-image pt-32 pb-16 md:pt-48 md:pb-24 text-center" style="background-image: url('images/1734444212989.jpg');">
    <div class="absolute inset-0 bg-gradient-to-t from-gray-100 via-black-50 to-transparent opacity-90"></div>
    <div class="relative z-10 container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">CONTACT BLUE WAVES HOUSE</h2>
        <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed font-bold">
            Have questions or ready to book your stay? We're here to help you plan your perfect surf getaway in Taghazout.
        </p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Form -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h3>
                <form action="{{ Route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="subject" class="block text-gray-700 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="What is this regarding?" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 mb-2">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message here..." 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required></textarea>
                    </div>
                    <button type="submit" class="bg-yellow-400 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-500 transition duration-300">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Info -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-yellow-400 p-2 rounded-full mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Email</p>
                                <a href="mailto:kekaisurf7@gmail.com" class="text-gray-600 hover:text-yellow-500">kekaisurf7@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-yellow-400 p-2 rounded-full mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Phone</p>
                                <p class="text-gray-600">+212 625-426-809</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-yellow-400 p-2 rounded-full mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Address</p>
                                <p class="text-gray-600">Taghazout Beach, Taghazout, Agadir, Morocco</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-white p-3 rounded-full transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-white p-3 rounded-full transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.225-.149-4.771-1.664-4.919-4.919C2.175 15.496 2.163 15.116 2.163 12c0-3.204.012-3.584.07-4.849.148-3.225 1.691-4.771 4.919-4.919C8.416 2.175 8.796 2.163 12 2.163zm0 1.837a8.002 8.002 0 100 16.001 8.002 8.002 0 000-16.001zm0 3.2a4.8 4.8 0 110 9.6 4.8 4.8 0 010-9.6zm6.4-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                            </svg>
                        </a>
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
                    <li><a href="#" class="hover:text-yellow-400 transition duration-300">Home</a></li>
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
                <a href="tel:+212600000000" class="hover:text-yellow-400 transition duration-300">+212 625-426-809</a>
            </div>

</body>
</html>
