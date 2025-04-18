<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Include font weights needed, especially 700 (bold) and 800 (extrabold for price) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Using a very light gray similar to the image's background */
            background-color: #F8F9FA; /* Tailwind class: bg-gray-50 approx */
        }
        /* Ensure bold weights are distinct */
        .font-bold { font-weight: 700; }
        .font-extrabold { font-weight: 800; } /* For the price */

        /* Basic styling for pagination if not using Tailwind's pagination views */
        .pagination span, .pagination a {
            padding: 0.5rem 0.75rem;
            margin: 0 0.125rem;
            border: 1px solid #dee2e6;
            color: #0d6efd;
            text-decoration: none;
            border-radius: 0.25rem;
        }
        .pagination .active span {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }
        .pagination .disabled span {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }

    </style>
</head>
<body class="bg-[#F8F9FA] p-4">
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
            <span class="text-sm font-semibold tracking-wider text-gray-800">LOGO</span>
            <a href="{{ route('client.home') }}" aria-label="Go back">
                <!-- Bolder arrow -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
        </header>

        <!-- Title Button -->
        <div class="text-center mb-8">
             <!-- Styled yellow button -->
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-semibold py-2.5 px-8 rounded-full shadow-sm">
                my reservations
            </button>
        </div>

        <!-- Flash Messages (Keep as is) -->
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
            <!-- Card Styling: background, padding, rounding, shadow -->
            <div class="bg-gray-100 rounded-2xl p-5 mb-4 shadow-md">
                <div class="flex flex-row">
                    <!-- Image Container: width, margin -->
                    <div class="w-1/4 mr-5 flex-shrink-0">
                        <img src="{{ $reservation->room->images ? asset('storage/' . $reservation->room->images) : 'https://via.placeholder.com/400x300/cccccc/969696?text=Room+Image' }}"
                             alt="{{ $reservation->room->type == 'private' ? 'Private Room' : 'Dormitory' }} #{{ $reservation->room->room_number }}"
                             class="w-full h-40 object-cover rounded-lg">
                    </div>

                    <!-- Details Container -->
                    <div class="w-3/4 flex flex-col">
                        <!-- Top section: Title and Dates -->
                        <div class="flex justify-between items-start">
                             <!-- Title Styling -->
                            <h2 class="text-xl font-bold text-gray-900 pt-1">
                                {{ $reservation->room->name ?? ($reservation->room->type == 'private' ? 'Private Room' : 'Dormitory Bed') }}
                                @if($reservation->room->type == 'private') #{{ $reservation->room->room_number }} @endif
                            </h2>

                             <!-- Dates section styling -->
                            <div class="text-right flex-shrink-0">
                                <div class="text-sm font-medium text-gray-800">
                                    check in <span class="text-blue-600 font-semibold">{{ $reservation->check_in->format('d/m/Y') }}</span>
                                </div>
                                <div class="text-sm font-medium text-gray-800 mt-0.5">
                                    check out <span class="text-blue-600 font-semibold">{{ $reservation->check_out->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description Styling -->
                        <p class="text-sm text-gray-500 mt-2 mb-4 leading-relaxed">
                            {{ Str::limit($reservation->room->description ?? 'Enjoy your stay with us.', 150) }}
                        </p>

                        <!-- Bottom section: Price/Guests and Buttons -->
                        <div class="flex justify-between items-end mt-auto">
                            <div>
                                <!-- Price Styling: size, weight -->
                                <p class="text-3xl font-extrabold text-gray-900">
                                    €{{ number_format($reservation->total_price ?? $reservation->price, 2) }}
                                    {{-- {{ number_format($reservation->total_price ?? $reservation->price, 0) }} MAD --}}
                                </p>
                                <!-- Guest/Night Styling -->
                                <p class="text-sm text-gray-800 font-medium mt-1">
                                    {{ $reservation->guests ?? 1 }} {{ \Illuminate\Support\Str::plural('adult', $reservation->guests ?? 1) }} /
                                    @php
                                        $checkInDate = \Carbon\Carbon::parse($reservation->check_in);
                                        $checkOutDate = \Carbon\Carbon::parse($reservation->check_out);
                                        $nights = $checkOutDate->diffInDays($checkInDate);
                                        if ($nights == 0) $nights = 1;
                                    @endphp
                                    <span class="text-gray-400 font-normal">{{ $nights }} {{ \Illuminate\Support\Str::plural('night', $nights) }}</span>
                                </p>
                            </div>

                            <!-- Buttons Section Styling -->
                            <div class="flex gap-2 items-center">
                                @if($reservation->status == 'cancelled')
                                    <span class="bg-red-100 text-red-800 text-xs font-medium py-1.5 px-4 rounded-full">
                                        Cancelled
                                    </span>
                                @elseif($reservation->status == 'confirmed' && $reservation->payment && $reservation->payment->status == 'paid')
                                     <span class="bg-green-100 text-green-800 text-xs font-medium py-1.5 px-4 rounded-full">
                                        Paid
                                    </span>
                                @elseif($reservation->status == 'pending' || $reservation->status == 'confirmed')
                                    {{-- Show Cancel Button if status allows and not paid --}}
                                    @if(!($reservation->payment && $reservation->payment->status == 'paid'))
                                        <form action="{{ route('client.reservation.cancel', $reservation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <!-- Cancel Button Styling -->
                                            <button type="submit" class="bg-black text-white text-sm font-semibold py-2 px-5 rounded-full hover:bg-gray-800 transition duration-200 whitespace-nowrap">
                                                cancel reservation
                                            </button>
                                        </form>
                                     @endif
                                @endif

                                {{-- "pay now" button removed --}}
                                {{-- "details" button removed --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-10 bg-gray-100 rounded-2xl p-5 shadow-md">
                <p class="text-lg text-gray-700">You don't have any reservations yet.</p>
                 <!-- Style button consistently -->
                <a href="{{ route('client.home') }}" class="mt-4 inline-block bg-blue-500 text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-blue-600 transition duration-200">
                    Browse Rooms
                </a>
            </div>
        @endforelse

        <!-- Pagination -->
        <div class="mt-8">
            {{-- Make sure you've published Tailwind pagination views or use basic styles --}}
             {{ $reservations->links() }}
        </div>

    </div>
</body>
</html>