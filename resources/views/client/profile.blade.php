<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* No custom icon CSS needed anymore */
    </style>
</head>
<body class="bg-gray-50">

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
            <a href="#" class="hover:text-yellow-400 transition duration-200">Home</a>
            <a href="#" class="hover:text-yellow-400 transition duration-200">the rooms</a>
            <a href="#" class="hover:text-yellow-400 transition duration-200">activities</a>
            <a href="#" class="hover:text-yellow-400 transition duration-200">Contact</a>
        </div>

        <!-- Right Side Buttons (Login/Signup & Mobile Toggle) -->
        <div class="flex space-x-4 items-center">
            <a href="#" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-semibold text-sm hover:bg-yellow-500 transition duration-200">
                log out
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
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">Home</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">the rooms</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">activities</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-yellow-400 hover:bg-gray-700">Contact</a>
         </div>
    </div>
</header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
         <!-- Responsive Flex Layout: Column on small, Row on medium+ --> 
        <div class="flex flex-col md:flex-row gap-8 md:gap-12">

            <!-- Left Section: Profile Icon and Button -->
             <!-- Takes full width on small screens, 1/4 on medium+ --> 
            <div class="flex flex-col items-center w-full md:w-1/4 pt-4 md:pt-8">
                 <!-- SVG Icon Container --> 
                <div class="mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke-width="1" stroke="currentColor" class="w-32 h-32 text-black">
                         <!-- Head Circle --> 
                        <path stroke-linecap="round" stroke-linejoin="round" d="M32 18 C 38.627 18 44 23.373 44 30 C 44 36.627 38.627 42 32 42 C 25.373 42 20 36.627 20 30 C 20 23.373 25.373 18 32 18 Z" />
                         <!-- Body/Shoulder Arc --> 
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 56 C 12 46 21.075 42 32 42 C 42.925 42 52 46 52 56" />
                    </svg>
                </div>
                  <!-- Profile Button --> 
                <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-8 rounded-full transition duration-150 ease-in-out w-full sm:w-auto">
                    my profile
                </button>
            </div>

            <!-- Right Section: User Details -->
             <!-- Takes full width on small, remaining width on medium+ --> 
             <div class="flex-1 w-full md:w-3/4 space-y-5">
                <!-- Nom et prénom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="prenom">Prénom :</label>
                        <div id="prenom" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nom">Nom :</label>
                        <div id="nom" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">
                            {{ strtoupper($user->name) }} {{-- exemple statique, tu peux remplacer par $user->last_name si tu l'as --}}
                        </div>
                    </div>
                </div>
            
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email :</label>
                    <div id="email" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">
                        {{ $user->email }}
                    </div>
                </div>
            
                <!-- Mot de passe (masqué) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Mot de passe :</label>
                    <div id="password" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                        ********
                    </div>
                </div>
            
                <!-- Téléphone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="phone">Numéro de téléphone :</label>
                    <div id="phone" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">
                        {{ $user->phone }}
                    </div>
                </div>
            
                <!-- Nationalité -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="nationality">Nationalité :</label>
                    <div id="nationality" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">
                        {{ $user->nationality ?? 'Non renseignée' }}
                    </div>
                </div>
            
                <!-- Bouton Modifier -->
                <div class="pt-4 md:pt-6 text-center md:text-left">
                    <a href="{{ route('client.profile.update') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full transition duration-150 ease-in-out">
                        Modifier les informations
                    </a>
                </div>
            </div>            

        </div>
    </main>

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