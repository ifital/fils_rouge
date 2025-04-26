<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <header class="flex justify-between items-center mb-6">
            <span class="text-sm font-semibold tracking-wider text-gray-700">LOGO</span>
            <a href="{{ url()->previous() }}" aria-label="Go back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
        </header>

        <!-- Button -->
        <div class="text-center mb-6">
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-semibold py-2 px-6 rounded-full shadow-sm">
                My Reservations
            </button>
        </div>

       <!-- Loop Through Reservations -->
        @forelse($reservations as $reservation)
        <div class="border-2 border-blue-500 rounded-lg bg-gray-50 p-4 md:p-6 shadow-md mb-6">
            <div class="flex flex-col md:flex-row gap-4 md:gap-6">
                <!-- Image -->
                <div class="md:w-1/3 flex-shrink-0">
                    <img src="{{ asset('storage/' . $reservation->activity->images) }}" 
                        alt="{{ $reservation->activity->name }}" 
                        class="rounded-lg w-full h-48 md:h-full object-cover">
                </div>

                <!-- Details -->
                <div class="md:w-2/3 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $reservation->activity->name }}</h2>
                        <p class="text-sm text-gray-600 leading-relaxed mb-4">
                            {{ Str::limit($reservation->activity->description, 150) }}
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                        <!-- Dates & Occupancy/Price -->
                        <div class="flex flex-row sm:flex-col gap-4 sm:gap-0 w-full sm:w-auto justify-between">
                            <div class="text-sm mb-2">
                                <p class="font-medium text-gray-700">
                                    Date: <span class="text-blue-600 font-semibold">
                                        {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}
                                    </span>
                                </p>
                            </div>
                            <div class="text-right sm:text-left">
                                <p class="text-3xl font-bold text-gray-900">{{ $reservation->price }} €</p>
                                <p><span class="text-gray-400 font-normal">{{ $reservation->number_of_people }} {{ Str::plural('person', $reservation->number_of_people) }}</span></p>
                            </div>
                        </div>

                        <!-- Cancel Button -->
                        <div class="w-full sm:w-auto flex justify-end">
                            <form action="{{ route('client.activities.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this reservation?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-black text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-gray-800 transition duration-200 w-full sm:w-auto">
                                    Cancel Reservation
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center text-gray-600 mt-10">
            You have no reservations yet.
        </div>
        @endforelse

    </div>
</body>
</html>
