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
        <!-- Logo -->
        <a href="#" class="text-xl font-bold">LOGO</a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-6 items-center">
            <a href="#" class="hover:text-yellow-400">about us</a>
            <a href="#" class="hover:text-yellow-400 text-yellow-400">Contact</a>
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
            <a href="#" class="block px-2 py-1 hover:text-yellow-400">The House</a>
            <a href="#" class="block px-2 py-1 hover:text-yellow-400">Coworking</a>
            <a href="#" class="block px-2 py-1 text-yellow-400 hover:text-yellow-400">Contact</a>
            <a href="/signin" class="block px-2 py-1 hover:text-yellow-400 w-full text-center">Sign In</a>
            <a href="/signup" class="mt-1 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition duration-300 w-full text-center">Sign Up</a>
        </nav>
    </div>
</header>

    <!-- Hero Section with Contact Title -->
    <section class="relative hero-bg-image pt-32 pb-16 md:pt-48 md:pb-24 text-center" style="background-image: url('https://picsum.photos/seed/contact/1600/900');">
        <!-- Overlay for text readability on background -->
        <div class="absolute inset-0 bg-gradient-to-t from-yellow-100 via-yellow-50 to-transparent opacity-90"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">CONTACT BLUE WAVES HOUSE</h2>
            <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">
                Have questions or ready to book your stay? We're here to help you plan your perfect surf getaway in Taghazout.
                Reach out to us using the form below or through our contact information.
            </p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h3>
                    
                    <form action="#" method="POST" class="space-y-6">
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
                
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Contact Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-yellow-400 p-2 rounded-full mr-4">
                                    <!-- Email icon -->
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Email</p>
                                    <a href="mailto:kekaisurf7@gmail.com" class="text-gray-600 hover:text-yellow-500">kekaisurf7@gmail.com</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-yellow-400 p-2 rounded-full mr-4">
                                    <!-- Phone icon -->
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Phone</p>
                                    <p class="text-gray-600">+212 6XX-XXX-XXX</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-yellow-400 p-2 rounded-full mr-4">
                                    <!-- Location icon -->
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                    
                    <!-- Map -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Our Location</h3>
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <!-- Replace with actual map embed or image -->
                            <img src="https://picsum.photos/seed/map/600/400" alt="Map showing Blue Waves House location" class="w-full h-64 object-cover">
                        </div>
                    </div>


</body>
</html>