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
            <a href="{{ route('client.home') }}" aria-label="Go back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
        </header>

        <!-- Button -->
        <div class="text-center mb-6">
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-semibold py-2 px-6 rounded-full shadow-sm">
                my reservations
            </button>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                {{ session('info') }}
            </div>
        @endif

        <!-- Reservations List -->
        @forelse($reservations as $reservation)
            <div class="border-2 border-blue-500 rounded-lg bg-gray-50 p-4 md:p-6 shadow-md mb-6">
                <div class="flex flex-col md:flex-row gap-4 md:gap-6">
                    <!-- Image -->
                    <div class="md:w-1/3 flex-shrink-0">
                        <img src="{{ $reservation->room->image_url ?? 'https://via.placeholder.com/400x300/cccccc/969696?text=Room+Image' }}" 
                             alt="{{ $reservation->room->type == 'private' ? 'Private Room' : 'Dormitory' }} #{{ $reservation->room->room_number }}" 
                             class="rounded-lg w-full h-48 md:h-full object-cover">
                    </div>

                    <!-- Details -->
                    <div class="md:w-2/3 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 mb-1">
                                {{ $reservation->room->type == 'private' ? 'Private Room' : 'Dormitory' }} #{{ $reservation->room->room_number }}
                            </h2>
                            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                                {{ $reservation->room->description ?? 'Comfortable room with all essential amenities.' }}
                            </p>
                            <p class="text-sm font-semibold mb-1 {{ $reservation->status == 'cancelled' ? 'text-red-600' : ($reservation->payment && $reservation->payment->status == 'paid' ? 'text-green-600' : 'text-yellow-600') }}">
                                Status: {{ ucfirst($reservation->status) }}
                                {{ $reservation->payment && $reservation->payment->status == 'paid' ? '(Paid)' : '' }}
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                            <!-- Left side: Dates & Occupancy/Price -->
                            <div class="flex flex-row sm:flex-col gap-4 sm:gap-0 w-full sm:w-auto justify-between">
                                <!-- Dates -->
                                <div class="text-sm mb-2">
                                    <p class="font-medium text-gray-700">check in <span class="text-blue-600 font-semibold">{{ $reservation->check_in->format('d/m/Y') }}</span></p>
                                    <p class="font-medium text-gray-700">check out <span class="text-blue-600 font-semibold">{{ $reservation->check_out->format('d/m/Y') }}</span></p>
                                </div>
                                <!-- Price & Occupancy -->
                                <div class="text-right sm:text-left">
                                    <p class="text-3xl font-bold text-gray-900">{{ number_format($reservation->price, 0) }} MAD</p>
                                    <p class="text-sm text-gray-700 font-medium">
                                        {{ $reservation->guests ?? 1 }} {{ ($reservation->guests ?? 1) > 1 ? 'adults' : 'adult' }} / 
                                        <span class="text-gray-400 font-normal">{{ $reservation->check_out->diffInDays($reservation->check_in) }} {{ $reservation->check_out->diffInDays($reservation->check_in) > 1 ? 'nights' : 'night' }}</span>
                                    </p>
                                </div>
                            </div>

                            <!-- Right side: Actions Buttons -->
                            <div class="w-full sm:w-auto flex justify-end">
                                @if($reservation->status != 'cancelled')
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <a href="{{ route('client.reservations.show', $reservation->id) }}" 
                                           class="bg-blue-500 text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-blue-600 transition duration-200 text-center">
                                            details
                                        </a>
                                        
                                        @if(!($reservation->payment && $reservation->payment->status == 'paid'))
                                            <a href="{{ route('client.payment.checkout', $reservation->id) }}"
                                               class="bg-green-500 text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-green-600 transition duration-200 text-center">
                                                pay now
                                            </a>
                                            
                                            <form action="{{ route('client.reservation.cancel', $reservation->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-black text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-gray-800 transition duration-200 w-full">
                                                    cancel
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <p class="text-lg text-gray-700">You don't have any reservations yet.</p>
                <a href="{{ route('client.home') }}" class="mt-4 inline-block bg-blue-500 text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-blue-600 transition duration-200">
                    Browse Rooms
                </a>
            </div>
        @endforelse

        <!-- Pagination -->
        <div class="mt-6">
            {{ $reservations->links() }}
        </div>
    </div>
</body>
</html>