<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves - Dashboard</title>
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
    <header class="bg-gradient-to-r from-blue-800 to-blue-600 shadow-md text-white fixed top-0 left-0 right-0 z-50">
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
                    <span class="bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </div>
                <div class="flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Profile" class="w-8 h-8 rounded-full mr-2">
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
            class="fixed md:sticky top-14 h-[calc(100vh-3.5rem)] w-64 bg-white shadow-lg transform transition-transform z-40 overflow-y-auto"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'md:translate-x-0': true}"
        >
            <!-- User Info -->
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Profile" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-medium text-gray-800">Admin User</p>
                        <p class="text-sm text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 border-l-4 border-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.rooms.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-bed"></i>
                            </span>
                            <span>Rooms</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.activities.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-umbrella-beach"></i>
                            </span>
                            <span>Activities</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <span>Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-users"></i>
                            </span>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-cog"></i>
                            </span>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Logout Button -->
            <div class="p-4 border-t border-gray-200">
                <a href="{{ Route('logout') }}" class="flex items-center text-red-600 hover:text-red-800">
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
                    <h1 class="text-xl md:text-2xl font-bold text-gray-800">Dashboard</h1>
                    <p class="text-gray-600">Welcome to Blue Waves Hostel dashboard</p>
                </div>
                    <!-- Statistics Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <!-- Occupancy Rate -->
                        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-blue-500 flex flex-col sm:flex-row items-start sm:items-center stats-card">
                            <div class="bg-blue-100 p-3 rounded-full stats-icon mb-3 sm:mb-0 sm:mr-4">
                                <i class="fas fa-bed text-blue-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Occupancy Rate</p>
                                <h2 class="text-xl font-bold text-gray-800">{{ number_format($occupancyRate, 2) }}%</h2>
                            </div>
                        </div>

                        <!-- Total Revenue -->
                        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-green-500 flex flex-col sm:flex-row items-start sm:items-center stats-card">
                            <div class="bg-green-100 p-3 rounded-full stats-icon mb-3 sm:mb-0 sm:mr-4">
                                <i class="fas fa-dollar-sign text-green-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Revenue</p>
                                <h2 class="text-xl font-bold text-gray-800">{{ number_format($totalRevenue, 2) }} MAD</h2>
                            </div>
                        </div>

                        <!-- Total Bookings -->
                        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-purple-500 flex flex-col sm:flex-row items-start sm:items-center stats-card">
                            <div class="bg-purple-100 p-3 rounded-full stats-icon mb-3 sm:mb-0 sm:mr-4">
                                <i class="fas fa-calendar-check text-purple-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Bookings</p>
                                <h2 class="text-xl font-bold text-gray-800">{{ $totalBookings }}</h2>
                            </div>
                        </div>

                        <!-- New Guests -->
                        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-yellow-500 flex flex-col sm:flex-row items-start sm:items-center stats-card">
                            <div class="bg-yellow-100 p-3 rounded-full stats-icon mb-3 sm:mb-0 sm:mr-4">
                                <i class="fas fa-user-plus text-yellow-500 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">New Guests</p>
                                <h2 class="text-xl font-bold text-gray-800">16</h2>
                            </div>
                        </div>
                    </div>
                    <!-- New Guests -->
                    <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-yellow-500">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                            <div class="bg-yellow-100 p-3 rounded-full mb-3 stats-icon">
                                <i class="fas fa-user-plus text-yellow-500 text-xl"></i>
                            </div>
                            <div class="w-full">
                                <p class="text-sm text-gray-500 mb-1">New Guests</p>
                                <h2 class="text-xl md:text-2xl font-bold text-gray-800">16</h2>
                                <p class="text-xs text-red-500 mt-1">
                                    <i class="fas fa-arrow-down mr-1"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-6 md:mb-8">
                    <!-- Occupancy Chart -->
                    <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-0">Occupancy Rate (Last 30 days)</h3>
                            <div class="flex space-x-2">
                                <button class="text-xs text-blue-600 px-2 py-1 rounded bg-blue-100">Day</button>
                                <button class="text-xs text-gray-600 px-2 py-1 rounded">Week</button>
                                <button class="text-xs text-gray-600 px-2 py-1 rounded">Month</button>
                            </div>
                        </div>
                        <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                            <!-- Placeholder for chart -->
                            <p class="text-gray-500">Occupancy Chart</p>
                        </div>
                    </div>

                    <!-- Revenue Chart -->
                    <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-0">Revenue (Last 6 months)</h3>
                            <div class="flex space-x-2">
                                <button class="text-xs text-gray-600 px-2 py-1 rounded">Week</button>
                                <button class="text-xs text-blue-600 px-2 py-1 rounded bg-blue-100">Month</button>
                                <button class="text-xs text-gray-600 px-2 py-1 rounded">Year</button>
                            </div>
                        </div>
                        <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                            <!-- Placeholder for chart -->
                            <p class="text-gray-500">Revenue Chart</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings and Upcoming Check-ins -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                    <!-- Recent Bookings -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="px-4 md:px-6 py-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Recent Bookings</h3>
                        </div>
                        <div class="p-4 md:p-6">
                            <div class="overflow-x-auto -mx-4 md:mx-0">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr class="bg-gray-50 text-gray-600 text-xs">
                                            <th class="py-2 px-4 text-left">Guest</th>
                                            <th class="py-2 px-4 text-left">Room</th>
                                            <th class="py-2 px-4 text-left">Arrival</th>
                                            <th class="py-2 px-4 text-left">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center">
                                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Guest" class="w-8 h-8 rounded-full mr-2">
                                                    <span>Thomas Martin</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">4-Bed Dorm</td>
                                            <td class="py-3 px-4">Apr 15, 2025</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Confirmed</span>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center">
                                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Guest" class="w-8 h-8 rounded-full mr-2">
                                                    <span>Emma Wilson</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">Private Room</td>
                                            <td class="py-3 px-4">Apr 18, 2025</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Pending</span>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center">
                                                    <img src="https://randomuser.me/api/portraits/men/56.jpg" alt="Guest" class="w-8 h-8 rounded-full mr-2">
                                                    <span>Michael Brown</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">6-Bed Dorm</td>
                                            <td class="py-3 px-4">Apr 20, 2025</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Confirmed</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="#" class="text-blue-600 text-sm hover:underline">View all bookings</a>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Check-ins -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="px-4 md:px-6 py-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Today's Check-ins</h3>
                        </div>
                        <div class="p-4 md:p-6">
                            <div class="space-y-4">
                                <!-- Check-in Item 1 -->
                                <div class="flex items-center justify-between p-3 md:p-4 rounded-lg border border-gray-100 hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Guest" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <p class="font-medium text-gray-800">Sophie Lambert</p>
                                            <p class="text-xs text-gray-500">Room 101 • Arrival: 2:00 PM</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="text-xs bg-blue-600 text-white px-3 py-1 rounded-full">
                                            Check-in
                                        </button>
                                    </div>
                                </div>

                                <!-- Check-in Item 2 -->
                                <div class="flex items-center justify-between p-3 md:p-4 rounded-lg border border-gray-100 hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Guest" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <p class="font-medium text-gray-800">Daniel Johnson</p>
                                            <p class="text-xs text-gray-500">Dorm 3 • Arrival: 3:30 PM</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="text-xs bg-blue-600 text-white px-3 py-1 rounded-full">
                                            Check-in
                                        </button>
                                    </div>
                                </div>

                                <!-- Check-in Item 3 -->
                                <div class="flex items-center justify-between p-3 md:p-4 rounded-lg border border-gray-100 hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Guest" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <p class="font-medium text-gray-800">Lucy Moore</p>
                                            <p class="text-xs text-gray-500">Room 204 • Arrival: 6:00 PM</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="text-xs bg-blue-600 text-white px-3 py-1 rounded-full">
                                            Check-in
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="#" class="text-blue-600 text-sm hover:underline">View all check-ins</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize responsive sidebar behavior
        document.addEventListener('DOMContentLoaded', function() {
            // Set sidebar to open by default on desktop
            if (window.innerWidth >= 768) {
                Alpine.store('sidebar', { open: true });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                const sidebar = document.querySelector('aside');
                const toggleButton = document.querySelector('[x-data] button');
                
                if (window.innerWidth < 768 && !sidebar.contains(e.target) && !toggleButton.contains(e.target)) {
                    Alpine.store('sidebar', { open: false });
                }
            });
        });
    </script>
</body>
</html>