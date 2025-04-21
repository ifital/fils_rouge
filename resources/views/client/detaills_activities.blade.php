<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activity->name }} - Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header Navigation -->
    <header class="bg-black text-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="text-2xl font-bold">LOGO</div>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('client.home') }}" class="hover:text-yellow-400 transition duration-200">Home</a>
                <a href="#" class="hover:text-yellow-400 transition duration-200">Rooms</a>
                <a href="{{ route('client.activities.index') }}" class="hover:text-yellow-400 transition duration-200">Activities</a>
            </div>
            <div class="flex space-x-4 items-center">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-semibold text-sm hover:bg-yellow-500 transition duration-200">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </nav>
        <div id="mobile-menu" class="md:hidden hidden bg-black text-center py-4 space-y-2">
            <a href="{{ route('client.home') }}" class="block hover:text-yellow-400 transition duration-200">Home</a>
            <a href="#" class="block hover:text-yellow-400 transition duration-200">Rooms</a>
            <a href="{{ route('client.activities.index') }}" class="block hover:text-yellow-400 transition duration-200">Activities</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row md:space-x-10">

            <!-- Left Column: Image -->
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <img src="{{ asset('storage/' . $activity->images) }}" alt="{{ $activity->name }}" class="w-full h-auto object-cover rounded-lg shadow-lg">
            </div>

            <!-- Right Column: Booking Form -->
            <div class="w-full md:w-1/2">
                <form method="POST" action="{{ route('client.activities.reserve.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                    <h2 class="text-xl font-semibold text-blue-900">{{ $activity->name }}</h2>

                    <div>
                        <span class="text-4xl font-bold text-teal-500">{{ $activity->price }} MAD</span>
                        <span class="text-xl text-gray-500 ml-2">per person</span>
                    </div>

                    <!-- Number of People -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">How many people?</label>
                        <div class="flex items-center">
                            <button type="button" class="bg-red-500 text-white p-2 rounded-l-md hover:bg-red-600 transition" onclick="decrementPeople()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <input type="hidden" name="number_of_people" id="people-input" value="1">
                            <span id="people-count" class="bg-white text-center px-6 py-2 border-t border-b border-gray-300 flex-grow text-gray-700">1 person</span>
                            <button type="button" class="bg-teal-500 text-white p-2 rounded-r-md hover:bg-teal-600 transition" onclick="incrementPeople()">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" name="date" class="px-4 py-2 text-gray-700 flex-grow focus:outline-none" id="booking-date" required>
                        </div>
                    </div>

                    <p class="text-sm text-gray-500">
                        You will pay <span id="total-price" class="font-semibold text-gray-700">{{ $activity->price }} MAD</span> for <span id="people-summary" class="font-semibold text-gray-700">1 person</span>
                    </p>

                    <button type="submit" class="w-full bg-yellow-400 text-black py-3 rounded-md font-bold text-lg hover:bg-yellow-500 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        Confirm Booking
                    </button>
                </form>
            </div>

        </div>
    </main>

    <!-- JavaScript -->
    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        let peopleCount = 1;
        const basePrice = {{ $activity->price }};
        const peopleDisplay = document.getElementById('people-count');
        const peopleSummary = document.getElementById('people-summary');
        const totalPrice = document.getElementById('total-price');
        const peopleInput = document.getElementById('people-input');

        function updatePeopleDisplay() {
            peopleDisplay.textContent = peopleCount + (peopleCount === 1 ? ' person' : ' people');
            peopleSummary.textContent = peopleCount + (peopleCount === 1 ? ' person' : ' people');
            totalPrice.textContent = (basePrice * peopleCount) + ' MAD';
            peopleInput.value = peopleCount;
        }

        function incrementPeople() {
            if (peopleCount < 10) {
                peopleCount++;
                updatePeopleDisplay();
            }
        }

        function decrementPeople() {
            if (peopleCount > 1) {
                peopleCount--;
                updatePeopleDisplay();
            }
        }

        const dateInput = document.getElementById('booking-date');
        if (dateInput) {
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0];
            dateInput.min = formattedDate;
            dateInput.value = formattedDate;
        }
    </script>

</body>
</html>
