<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <!-- Header Navigation -->
    <header class="bg-black text-white shadow-md">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="font-bold text-xl">LOGO</div>
            <nav class="flex items-center space-x-8">
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">my reservations</a>
                <a href="#" class="hover:text-gray-300">my activities</a>
            </nav>
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-5 rounded-full transition duration-150 ease-in-out">
                log out
            </button>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row gap-12">

            <!-- Left Section: Profile Icon and Button -->
            <div class="flex flex-col items-center md:w-1/4 pt-8">
                <div class="mb-6">
                    <div class="profile-icon-head"></div>
                    <div class="profile-icon-body"></div>
                </div>
                <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-8 rounded-full transition duration-150 ease-in-out">
                    my profile
                </button>
            </div>

            <!-- Right Section: User Details -->
            <div class="flex-1 md:w-3/4 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="prenom">Prénom :</label>
                        <div id="prenom" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                            EX : ALI
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nom">Nom :</label>
                        <div id="nom" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                            EX : ALI
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email :</label>
                    <div id="email" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                        EX : xxxxxx@gmail.com
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Mots de passe :</label>
                    <div id="password" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                        xxxxxx
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="phone">Numéro de téléphone :</label>
                    <div id="phone" class="bg-gray-100 text-gray-600 w-full px-4 py-2 rounded-full">
                       EX : 07784083789
                    </div>
                </div>

                <div class="pt-6 text-center md:text-left">
                     <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full transition duration-150 ease-in-out">
                        Modifier les informations
                    </button>
                </div>
            </div>

        </div>
    </main>

</body>
</html>