<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blue Waves - Reservation Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="bg-black shadow-md text-white fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center">
        <button id="menu-toggle" class="mr-4 text-white focus:outline-none md:hidden">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
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
          <span class="hidden md:inline-block">Manager</span>
          <i class="fas fa-chevron-down ml-2 text-xs"></i>
        </div>
      </div>
    </div>
  </header>

  <div class="flex pt-14">
    <!-- Sidebar - Mobile Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

   <!-- Sidebar -->
<aside id="sidebar"
class="fixed md:sticky top-14 h-[calc(100vh-3.5rem)] w-64 bg-black text-white shadow-lg transform -translate-x-full transition-transform z-40 overflow-y-auto md:translate-x-0">
<!-- User Info -->
<div class="p-4 border-b border-gray-800">
  <div class="flex items-center">
    <div>
      <p class="font-medium text-white">Employee User</p>
      <p class="text-sm text-gray-400">Manager</p>
    </div>
  </div>
</div>

<!-- Navigation -->
<nav class="py-4">
  <ul class="space-y-1">
    <!-- Users Management -->
    <li>
      <a href="{{ Route('employee.users.index') }}"
        class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400 {{ request()->routeIs('employee.users.index') ? 'text-yellow-400 bg-gray-900 border-l-4 border-yellow-400' : '' }}">
        <span class="sidebar-icon mr-3">
          <i class="fas fa-users"></i>
        </span>
        <span>Users</span>
      </a>
    </li>
    
    <!-- Room Reservations -->
    <li>
      <a href="{{ Route('employee.reservations.index') }}"
        class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400 {{ request()->routeIs('employee.reservations.index') ? 'text-yellow-400 bg-gray-900 border-l-4 border-yellow-400' : '' }}">
        <span class="sidebar-icon mr-3">
          <i class="fas fa-bed"></i>
        </span>
        <span>Room Reservations</span>
      </a>
    </li>
    
    <!-- Activity Reservations -->
    <li>
      <a href="{{ Route('employee.reservations.activities') }}"
        class="flex items-center px-4 py-3 {{ request()->routeIs('employee.reservations.activities') ? 'text-yellow-400 bg-gray-900 border-l-4 border-yellow-400' : 'text-white hover:bg-gray-800 hover:text-yellow-400' }}">
        <span class="sidebar-icon mr-3">
          <i class="fas fa-umbrella-beach"></i>
        </span>
        <span>Activity Reservations</span>
      </a>
    </li>
    
  </ul>
</nav>

<!-- Logout Button -->
<div class="p-4 border-t border-gray-800 mt-auto">
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
                <h1 class="text-xl md:text-2xl font-bold text-black">Reservation Management</h1>
                <p class="text-gray-600">Manage customer reservations</p>
            </div>

            <!-- Flash Messages -->
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
            <!-- Reservations Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="p-4 md:p-6 border-b border-gray-200">
                    <h3 class="font-semibold text-gray-800">Reservations</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Guest</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Room</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Check In</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Check Out</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Price</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Payment</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm">{{ $reservation->id }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $reservation->user->name }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $reservation->room->name }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $reservation->check_in->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $reservation->check_out->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 text-sm">${{ number_format($reservation->price, 2) }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="px-2 py-1 text-xs rounded-full {{ 
                                            $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                            ($reservation->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') 
                                        }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if($reservation->payment && $reservation->payment->status === 'paid')
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Paid</span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">Unpaid</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex space-x-2">
                                            <!-- Edit Button -->
                                            <button 
                                                onclick="openEditModal({{ $reservation->id }}, '{{ $reservation->check_in->format('Y-m-d') }}', '{{ $reservation->getDays() }}', '{{ $reservation->room_id }}')" 
                                                class="px-3 py-1 text-xs bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                                Edit
                                            </button>
                                            
                                            <!-- Delete/Cancel Button -->
                                            @if($reservation->status !== 'cancelled')
                                                <form action="{{ route('employee.reservations.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-md">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 border-t border-gray-200">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>
        
        <!-- Edit Reservation Modal -->
        <div id="editReservationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-lg font-semibold mb-4">Edit Reservation</h2>
                <form id="editReservationForm" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Check-in Date</label>
                        <input type="date" id="editCheckIn" name="check_in" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Number of Nights</label>
                        <input type="number" id="editNights" name="nights" min="1" max="30" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Room</label>
                        <select id="editRoomId" name="room_id" class="mt-1 p-2 w-full border rounded-md" required>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }} - {{ $room->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="editStatus" name="status" class="mt-1 p-2 w-full border rounded-md" required>
                            <option value="confirmed">Confirmed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
            
                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
  </div>

  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    function openEditModal(id, checkIn, nights, roomId) {
        const modal = document.getElementById('editReservationModal');
        modal.classList.remove('hidden');

        document.getElementById('editCheckIn').value = checkIn;
        document.getElementById('editNights').value = nights;
        document.getElementById('editRoomId').value = roomId;

        const form = document.getElementById('editReservationForm');
        form.action = `/employee/reservations/${id}`;
    }

    function closeEditModal() {
        const modal = document.getElementById('editReservationModal');
        modal.classList.add('hidden');
    }
  </script>
</body>
</html>