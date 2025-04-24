<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves - Payments</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .sidebar-icon {
            width: 1.5rem;
            height: 1.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        @media (max-width: 768px) {
            .stats-card {
                flex-direction: row !important;
                padding: 1rem !important;
            }
            
            .stats-icon {
                margin-bottom: 0 !important;
                margin-right: 1rem !important;
            }
        }
    </style>    
</head>
<body class="bg-gray-100 min-h-screen" x-data="{ sidebarOpen: false }">
    <!-- Header -->
    <header class="bg-black shadow-md text-white fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="mr-4 text-white focus:outline-none md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center">
                    <span class="text-yellow-400 text-2xl font-bold">BLUE</span>
                    <span class="text-white text-2xl font-bold">WAVES</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-2 text-sm">
                    <i class="fas fa-bell"></i>
                    <span class="bg-yellow-400 text-black text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </div>
                <div class="flex items-center">
                        <span class="hidden md:inline-block">Admin</span>
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </div>
            </div>
        </div>
    </header>

    <div class="flex pt-14">
        <!-- Sidebar - Mobile Overlay -->
        <div 
            x-show="sidebarOpen" 
            @click="sidebarOpen = false" 
            class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        ></div>
        
        <!-- Sidebar -->
        <aside 
            class="fixed md:sticky top-14 h-[calc(100vh-3.5rem)] w-64 bg-black text-white shadow-lg transform transition-transform z-40 overflow-y-auto"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'md:translate-x-0': true}"
        >
            <!-- User Info -->
            <div class="p-4 border-b border-gray-800">
                <div class="flex items-center">
                    <div>
                        <p class="font-medium text-white">Admin User</p>
                        <p class="text-sm text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ Route('admin.statistics') }}" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.rooms.index') }}" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-bed"></i>
                            </span>
                            <span>Rooms</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.activities.index') }}" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-umbrella-beach"></i>
                            </span>
                            <span>Activities</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.payments') }}" class="flex items-center px-4 py-3 text-yellow-400 bg-gray-900 border-l-4 border-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <span>Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-users"></i>
                            </span>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-cog"></i>
                            </span>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Logout Button -->
            <div class="p-4 border-t border-gray-800">
                <a href="{{ Route('logout') }}" class="flex items-center text-gray-400 hover:text-yellow-400">
                    <span class="sidebar-icon mr-3">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-6 w-full overflow-x-hidden">
            <div class="max-w-7xl mx-auto">
                <!-- Page Title -->
                <div class="mb-6 md:mb-8">
                    <h1 class="text-xl md:text-2xl font-bold text-black">Payments</h1>
                    <p class="text-gray-600">Manage payment transactions</p>
                </div>
                <!-- Payments Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-4 md:p-6 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <h3 class="font-semibold text-gray-800 mb-3 md:mb-0">payements</h3>
                        <div class="text-sm text-gray-600">
                            <span class="font-medium">{{ $payments->total() }}</span> payments
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Client</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Room</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Amount</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Methode</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm">{{ $payment->id }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $payment->reservation->user->name ?? '-' }}</td>
                                        <td class="px-4 py-3 text-sm">#{{ $payment->reservation->room->room_number ?? '-' }}</td>
                                        <td class="px-4 py-3 text-sm">{{ number_format($payment->amount, 2) }} MAD</td>
                                        <td class="px-4 py-3 text-sm capitalize">{{ $payment->payment_method }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            <span class="px-2 py-1 rounded-full text-xs
                                                {{ $payment->status == 'paid' ? 'bg-green-200 text-green-800' :
                                                ($payment->status == 'pending' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                                                {{ ucfirst($payment->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $payment->payment_date->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                        <div>
                            {{ $payments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>