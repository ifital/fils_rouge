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
    <header class="bg-black text-white shadow-md">
        <div class="container mx-auto px-4 sm:px-6 py-3 flex justify-between items-center">
              <!-- Adjusted padding for slightly smaller screens --> 
            <div class="font-bold text-xl">LOGO</div>
             <!-- Basic Nav - Consider a hamburger menu for very small screens if needed --> 
            <nav class="hidden sm:flex items-center space-x-4 md:space-x-8 text-sm md:text-base">
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">my reservations</a>
                <a href="#" class="hover:text-gray-300">my activities</a>
            </nav>
             <!-- Log out button --> 
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 md:px-5 rounded-full transition duration-150 ease-in-out text-sm md:text-base">
                log out
            </button>
             <!-- Simple dropdown for smaller screens (optional improvement) --> 
             <div class="sm:hidden">
                 <!-- Placeholder for a potential burger menu icon --> 
                <button class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
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
                  <!-- Name Fields: Stack on small, side-by-side on medium+ --> 
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="prenom">Prénom :</label>
                        <div id="prenom" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">  Added truncate 
                            EX : ALI
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nom">Nom :</label>
                        <div id="nom" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">  Added truncate 
                            EX : ALI
                        </div>
                    </div>
                </div>

                 <!-- Email Field --> 
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email :</label>
                    <div id="email" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">  Added truncate 
                        EX : xxxxxx@gmail.com
                    </div>
                </div>

                 <!-- Password Field --> 
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Mots de passe :</label>
                    <div id="password" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                        xxxxxx
                    </div>
                </div>

                 <!-- Phone Field --> 
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="phone">Numéro de téléphone :</label>
                    <div id="phone" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full truncate">  Added truncate 
                       EX : 07784083789
                    </div>
                </div>

                 <!-- Modify Button: Centered on small, left-aligned on medium+ --> 
                <div class="pt-4 md:pt-6 text-center md:text-left">
                     <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full transition duration-150 ease-in-out">
                        Modifier les informations
                    </button>
                </div>
            </div>

        </div>
    </main>

</body>
</html>