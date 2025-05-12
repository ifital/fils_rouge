<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8F9FA;
        }
        .font-bold { font-weight: 700; }
        .font-extrabold { font-weight: 800; }

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
        
        /* Modal Background */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s linear 0.25s, opacity 0.25s 0s;
        }
        .modal-overlay.active {
            visibility: visible;
            opacity: 1;
            transition-delay: 0s;
        }
        
        /* Modal Content */
        .modal-content {
            background-color: white;
            border-radius: 1rem;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.8);
            transition: transform 0.25s;
        }
        .modal-overlay.active .modal-content {
            transform: scale(1);
        }
    </style>
</head>
<body class="bg-[#F8F9FA] p-4">
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
        <!-- Logo -->
        <div class="">
            <img src="/images/Design_sans_titre_13.png" alt="logo"  class="h-12">
        </div>            <a href="{{ route('client.home') }}" aria-label="Go back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
        </header>

        <!-- Title Button -->
        <div class="text-center mb-8">
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
            <div class="bg-gray-100 rounded-2xl p-5 mb-4 shadow-md">
                <div class="flex flex-row">
                    <div class="w-1/4 mr-5 flex-shrink-0">
                        <img src="{{ $reservation->room->images ? asset('storage/' . $reservation->room->images) : 'https://via.placeholder.com/400x300/cccccc/969696?text=Room+Image' }}"
                             alt="{{ $reservation->room->type == 'private' ? 'Private Room' : 'Dormitory' }} #{{ $reservation->room->room_number }}"
                             class="w-full h-40 object-cover rounded-lg">
                    </div>

                    <div class="w-3/4 flex flex-col">
                        <div class="flex justify-between items-start">
                            <h2 class="text-xl font-bold text-gray-900 pt-1">
                                {{ $reservation->room->name ?? ($reservation->room->type == 'private' ? 'Private Room' : 'Dormitory Bed') }}
                                @if($reservation->room->type == 'private') #{{ $reservation->room->room_number }} @endif
                            </h2>

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

                        <div class="flex justify-between items-end mt-auto">
                            <div>
                                <p class="text-3xl font-extrabold text-gray-900">
                                    €{{ number_format($reservation->total_price ?? $reservation->price, 2) }}
                                </p>
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

                            <div class="flex gap-2 items-center">
                                @if($reservation->status == 'cancelled')
                                    <span class="bg-red-100 text-red-800 text-xs font-medium py-1.5 px-4 rounded-full">
                                        Cancelled
                                    </span>
                                @else
                                    <button 
                                        type="button" 
                                        onclick="openModal('updateModal{{ $reservation->id }}')" 
                                        class="bg-blue-500 text-white text-sm font-semibold py-2 px-5 rounded-full hover:bg-blue-600 transition duration-200 whitespace-nowrap mr-2">
                                        change dates
                                    </button>
                                    
                                    @if($reservation->status != 'cancelled' && !($reservation->payment && $reservation->payment->status == 'paid'))
                                        <form action="{{ route('client.reservation.cancel', $reservation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-black text-white text-sm font-semibold py-2 px-5 rounded-full hover:bg-gray-800 transition duration-200 whitespace-nowrap">
                                                cancel reservation
                                            </button>
                                        </form>
                                    @endif
                                    
                                    @if($reservation->payment && $reservation->payment->status == 'paid')
                                        <span class="bg-green-100 text-green-800 text-xs font-medium py-1.5 px-4 rounded-full">
                                            Paid
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Update Modal for this reservation - Only date changes -->
            <div id="updateModal{{ $reservation->id }}" class="modal-overlay">
                <div class="modal-content p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-900">Change Reservation Dates</h3>
                        <button onclick="closeModal('updateModal{{ $reservation->id }}')" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <form action="{{ route('client.reservation.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-4">
                            <label for="check_in{{ $reservation->id }}" class="block text-sm font-medium text-gray-700 mb-1">New Check-in Date</label>
                            <input 
                                type="date" 
                                id="check_in{{ $reservation->id }}" 
                                name="check_in" 
                                value="{{ $reservation->check_in->format('Y-m-d') }}" 
                                min="{{ date('Y-m-d') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required
                            >
                        </div>
                        
                        <input type="hidden" name="nights" value="{{ $nights }}">
                        
                        <input type="hidden" name="guests" value="{{ $reservation->guests ?? 1 }}">
                        
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        Only the check-in date will be changed. The number of nights ({{ $nights }}) will remain the same.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <button 
                                type="button"
                                onclick="closeModal('updateModal{{ $reservation->id }}')"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full font-medium hover:bg-gray-300 transition duration-200"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-full font-medium hover:bg-blue-600 transition duration-200"
                            >
                                Change Dates
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-10 bg-gray-100 rounded-2xl p-5 shadow-md">
                <p class="text-lg text-gray-700">You don't have any reservations yet.</p>
                <a href="{{ route('client.home') }}" class="mt-4 inline-block bg-blue-500 text-white text-sm font-semibold py-2 px-6 rounded-full hover:bg-blue-600 transition duration-200">
                    Browse Rooms
                </a>
            </div>
        @endforelse

        <!-- Pagination -->
        <div class="mt-8">
            {{ $reservations->links() }}
        </div>

    </div>
    
    <!-- JavaScript for Modal Functionality -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Close modal if clicking outside of modal content
        document.addEventListener('click', function(event) {
            const modals = document.querySelectorAll('.modal-overlay.active');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
        
        // Close modal on escape key press
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('.modal-overlay.active');
                modals.forEach(modal => {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
        });
    </script>
</body>
</html>