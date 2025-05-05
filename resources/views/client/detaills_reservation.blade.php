<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Booking Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<header class="bg-black text-white shadow-md">
    <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="">
            <img src="/images/Design_sans_titre_13.png" alt="logo"  class="h-12">
        </div>
        </div>

        <div class="hidden md:flex space-x-8 items-center">
            <a href="{{ route('client.home') }}" class="hover:text-yellow-400 transition duration-200">Home</a>
            <a href="{{ route('client.home') }}" class="hover:text-yellow-400 transition duration-200">Rooms</a>
            <a href="{{ route('client.activities.index') }}" class="hover:text-yellow-400 transition duration-200">Activities</a>
        </div>

        <div class="flex space-x-4 items-center">
            <a href="{{ route('client.profile.show') }}" class="hover:text-yellow-400 transition duration-200">My Profile</a>
            <a href="{{ route('client.reservations.index') }}" class="hover:text-yellow-400 transition duration-200">My Bookings</a>
            <a href="{{ route('logout') }}" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-bold text-sm hover:bg-yellow-500 transition duration-200">
                Logout
            </a>
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </nav>
    <div id="mobile-menu" class="md:hidden hidden bg-black text-center py-4 space-y-2">
        <a href="{{ route('client.home') }}" class="block hover:text-yellow-400 transition duration-200">Home</a>
        <a href="{{ route('client.home') }}" class="block hover:text-yellow-400 transition duration-200">Rooms</a>
        <a href="{{ route('client.activities.index') }}" class="block hover:text-yellow-400 transition duration-200">Activities</a>
        <a href="{{ route('contact') }}" class="block hover:text-yellow-400 transition duration-200">Contact</a>
        <a href="{{ route('client.reservations.index') }}" class="block hover:text-yellow-400 transition duration-200">My Bookings</a>
    </div>
</header>

<main class="container mx-auto px-6 py-12">
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif

    @if(session('info'))
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
        <p>{{ session('info') }}</p>
    </div>
    @endif

    @if(session('warning'))
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
        <p>{{ session('warning') }}</p>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Your Booking Details</h1>

        <div class="flex flex-col md:flex-row md:space-x-8">
            <div class="w-full md:w-2/3 space-y-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-blue-900">Booking #{{ $reservation->id }}</h2>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold
                        {{ $reservation->status == 'confirmed' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $reservation->status == 'paid' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $reservation->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                        {{ $reservation->status == 'confirmed' ? 'Pending Payment' : '' }}
                        {{ $reservation->status == 'paid' ? 'Paid' : '' }}
                        {{ $reservation->status == 'cancelled' ? 'Cancelled' : '' }}
                    </span>
                </div>

                <div class="border-b pb-4">
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Room</h3>
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $reservation->room->images) }}" alt="Room" class="w-20 h-20 object-cover rounded-md">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $reservation->room->type == 'private' ? 'Private Room' : 'Dormitory' }} #{{ $reservation->room->room_number }}</p>
                            <p class="text-sm text-gray-600">{{ $reservation->room->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="border-b pb-4">
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Stay Dates</h3>
                    <div class="flex space-x-12">
                        <div>
                            <p class="text-sm text-gray-500">Check-in</p>
                            <p class="font-semibold text-gray-800">{{ $reservation->check_in->format('d/m/Y') }}</p>
                            <p class="text-xs text-gray-500">From 2:00 PM</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Check-out</p>
                            <p class="font-semibold text-gray-800">{{ $reservation->check_out->format('d/m/Y') }}</p>
                            <p class="text-xs text-gray-500">Until 11:00 AM</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Duration</p>
                            <p class="font-semibold text-gray-800">{{ $reservation->check_in->diffInDays($reservation->check_out) }} nights</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Price Details</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <p class="text-gray-600">{{ $reservation->room->price }} MAD x {{ $reservation->check_in->diffInDays($reservation->check_out) }} nights</p>
                            <p class="text-gray-800">{{ $reservation->price }} MAD</p>
                        </div>
                        <div class="border-t pt-2 mt-2">
                            <div class="flex justify-between font-semibold">
                                <p>Total</p>
                                <p>{{ $reservation->price }} MAD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="w-full md:w-1/3 mt-8 md:mt-0">
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Payment</h3>

                    @if($payment && $payment->status == 'paid')
                        <div class="bg-green-50 text-green-800 p-4 rounded-md mb-4">
                            <div class="flex">
                                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="..."/>
                                </svg>
                                <p class="font-medium">Paid on {{ $payment->payment_date->format('d/m/Y') }}</p>
                            </div>
                            <p class="mt-2 text-sm">Method: {{ $payment->payment_method == 'card' ? 'Credit Card' : $payment->payment_method }}</p>
                        </div>
                    @else
                        <div class="space-y-4">
                            <p class="text-gray-600">Amount to pay: <span class="font-bold text-gray-800">{{ $reservation->price }} MAD</span></p>
                            <a href="{{ route('client.payment.checkout', ['reservation' => $reservation->id]) }}" 
                               class="block w-full bg-green-500 text-white py-3 px-4 rounded-md font-bold text-center hover:bg-green-600 transition duration-200">
                                Proceed to Payment
                            </a>
                            <div class="text-sm text-gray-500 mt-2">
                                <p>Secure payment via Stripe</p>
                                <div class="flex space-x-2 mt-2">
                                    <img src="{{ asset('images/visa.svg') }}" alt="Visa" class="h-6">
                                    <img src="{{ asset('images/mastercard.svg') }}" alt="Mastercard" class="h-6">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
