<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Interface</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Optional: Add custom base styles or component styles here if needed */
        /* For example, if you need a very specific yellow */
        /* @layer base { */
        /*   :root { */
        /*     --color-custom-yellow: #facc15; /* Example hex */ */
        /*   } */
        /* } */
        /* You could then use bg-[var(--color-custom-yellow)] */
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header Navigation -->
    <header class="bg-black text-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                LOGO
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#" class="hover:text-yellow-400 transition duration-200">Home</a>
                <a href="#" class="hover:text-yellow-400 transition duration-200">the rooms</a>
                <a href="#" class="hover:text-yellow-400 transition duration-200">activities</a>
                <a href="#" class="hover:text-yellow-400 transition duration-200">Contact</a>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 items-center">
                <a href="#" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-semibold text-sm hover:bg-yellow-500 transition duration-200">
                    Inscription
                </a>
                <a href="#" class="border border-yellow-400 text-yellow-400 px-5 py-2 rounded-full font-semibold text-sm hover:bg-yellow-400 hover:text-black transition duration-200">
                    connexion
                </a>
                 <!-- Mobile Menu Button (Optional) -->
                 <button class="md:hidden text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                  </button>
            </div>
        </nav>
        <!-- Mobile Menu (Hidden by default, shown on button click via JS) -->
        <div class="md:hidden hidden bg-black text-center py-4 space-y-2">
            <a href="#" class="block hover:text-yellow-400 transition duration-200">Home</a>
            <a href="#" class="block hover:text-yellow-400 transition duration-200">the rooms</a>
            <a href="#" class="block hover:text-yellow-400 transition duration-200">activities</a>
            <a href="#" class="block hover:text-yellow-400 transition duration-200">Contact</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row md:space-x-10">

            <!-- Left Column: Image -->
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <img src="path/to/your/room-image.jpg" alt="Hotel room with single bed, wooden furniture, and artwork" class="w-full h-auto object-cover rounded-lg shadow-lg">
                 <!-- Note: The original image doesn't seem to have rounded corners or shadow, adjust class="..." accordingly if needed -->
            </div>

            <!-- Right Column: Booking Form -->
            <div class="w-full md:w-1/2">
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-blue-900">Start Booking</h2>

                    <!-- Price -->
                    <div>
                        <span class="text-4xl font-bold text-teal-500">$50</span>
                        <span class="text-xl text-gray-500 ml-2">for night</span>
                    </div>

                    <!-- Duration Selector -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">How long you will stay?</label>
                        <div class="flex items-center">
                            <button class="bg-red-500 text-white p-2 rounded-l-md hover:bg-red-600 transition duration-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <span class="bg-white text-center px-6 py-2 border-t border-b border-gray-300 flex-grow text-gray-700">2 nights</span>
                            <button class="bg-teal-500 text-white p-2 rounded-r-md hover:bg-teal-600 transition duration-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Date Picker -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Pick a Date</label>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden bg-white">
                            <div class="bg-blue-900 p-2.5">
                                <!-- Basic Calendar SVG Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                  </svg>
                            </div>
                            <span class="px-4 py-2 text-gray-700 flex-grow">20 Jan - 22 Jan</span>
                            <!-- This would typically be an input field linked to a date picker library -->
                        </div>
                    </div>

                    <!-- Summary -->
                    <p class="text-sm text-gray-500">
                        You will pay <span class="font-semibold text-gray-700">$50 USD</span> per <span class="font-semibold text-gray-700">2 nights</span>
                    </p>

                    <!-- Confirm Button -->
                    <button class="w-full bg-yellow-400 text-black py-3 rounded-md font-bold text-lg hover:bg-yellow-500 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        conferme Booking
                    </button>
                </div>
            </div>

        </div>
    </main>

    <!-- Optional: Add JavaScript for mobile menu toggle or date picker functionality -->
    <script>
        // Basic mobile menu toggle example
        const menuButton = document.querySelector('header button.md\\:hidden');
        const mobileMenu = document.querySelector('.md\\:hidden.hidden');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script> 

</body>
</html>