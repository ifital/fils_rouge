<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blue Waves - Activity Reservation Management</title>
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
        /* Basic styling for date input placeholder */
        input[type="date"]:required:invalid::-webkit-datetime-edit {
            color: transparent;
        }
        input[type="date"]:focus::-webkit-datetime-edit {
            color: black !important;
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
                <!-- Logo -->
            <div class="">
                <img src="/images/Design_sans_titre_13.png" alt="logo"  class="h-12">
            </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-2 text-sm">
                    <i class="fas fa-bell"></i>
                    <span class="bg-yellow-400 text-black text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </div>
                <div class="flex items-center">
                    <span class="hidden md:inline-block">Employee</span> 
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
    <li>
        <a href="{{ Route('employee.contacts') }}"
          class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400 {{ request()->routeIs('employee.contacts') ? 'text-yellow-400 bg-gray-900 border-l-4 border-yellow-400' : '' }}">
          <span class="sidebar-icon mr-3">
            <i class="fas fa-address-book"></i>
          </span>
          <span>Contacts</span>
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
        <main class="flex-1 p-4 md:p-6 w-full overflow-x-auto">
            <div class="max-w-7xl mx-auto">
                <!-- Page Title -->
                <div class="mb-6 md:mb-8">
                    <h1 class="text-xl md:text-2xl font-bold text-black">Activity Reservation Management</h1>
                    <p class="text-gray-600">Manage customer activity reservations</p>
                </div>

                <!-- Flash Messages -->
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
                @endif

                <!-- Reservations Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-4 md:p-6 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-800">Reservations List</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Customer</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Activity</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">People</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($reservations as $reservation)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $reservation->id }}</td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $reservation->user->name }}</td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $reservation->activity->name }}</td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $reservation->number_of_people }}</td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">{{ number_format($reservation->price, 2) }} €</td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                                $reservation->status == 'confirmed' ? 'bg-green-100 text-green-800' :
                                                ($reservation->status == 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                                ($reservation->status == 'canceled' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800'))
                                            }}">
                                                {{ ucfirst($reservation->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                <!-- Edit Button -->
                                                <button
                                                    type="button"
                                                    onclick="openEditModal(
                                                        {{ $reservation->id }},
                                                        '{{ $reservation->activity->name }}',
                                                        '{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}',
                                                        {{ $reservation->number_of_people }},
                                                        '{{ $reservation->status }}'
                                                    )"
                                                    class="px-3 py-1 text-xs bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>

                                                <!-- Delete Button -->
                                                <form action="{{ route('employee.reservations.activities.destroy', $reservation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this reservation?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" title="Delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center px-4 py-4 text-sm text-gray-500">No reservations found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     {{-- Optional: Add Pagination if needed --}}
                    {{-- <div class="px-4 py-3 border-t border-gray-200">
                        {{ $reservations->links() }}
                    </div> --}}
                </div>
            </div>

            <!-- Edit Reservation Modal -->
            <div id="editActivityModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50 p-4">
                <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-xl">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-800" id="editModalTitle">Edit Reservation #</h2>
                         <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                             <i class="fas fa-times"></i>
                         </button>
                    </div>
                    <form id="editActivityForm" method="POST"> {{-- Action will be set by JS --}}
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label for="editActivityName" class="block text-sm font-medium text-gray-700">Activity</label>
                                <input type="text" id="editActivityName" class="mt-1 p-2 w-full border border-gray-300 rounded-md bg-gray-100 focus:outline-none" disabled>
                            </div>
                            <div>
                                <label for="editReservationDate" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                                <input type="date" id="editReservationDate" name="reservation_date" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                            <div>
                                <label for="editNumberOfPeople" class="block text-sm font-medium text-gray-700">Number of People</label>
                                <input type="number" id="editNumberOfPeople" name="number_of_people" min="1" max="10" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                            <div>
                                <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="editStatus" name="status" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end mt-6 space-x-3">
                            <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save Changes</button>
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
        const modal = document.getElementById('editActivityModal');
        const modalTitle = document.getElementById('editModalTitle');
        const form = document.getElementById('editActivityForm');
        const activityNameInput = document.getElementById('editActivityName');
        const reservationDateInput = document.getElementById('editReservationDate');
        const numberOfPeopleInput = document.getElementById('editNumberOfPeople');
        const statusInput = document.getElementById('editStatus');

        if (menuToggle && sidebar && overlay) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        }

        function openEditModal(id, activityName, date, people, status) {
            if (!modal || !form || !modalTitle || !activityNameInput || !reservationDateInput || !numberOfPeopleInput || !statusInput) {
                 console.error("Modal elements not found!");
                 return;
            }
            // Set form action
            // Make sure the base URL is correct for your setup
            form.action = `/employee/reservations/activities/${id}`; // Adjust route base if needed

            // Populate modal fields
            modalTitle.textContent = `Edit Reservation #${id}`;
            activityNameInput.value = activityName;
            reservationDateInput.value = date; // Expects 'YYYY-MM-DD'
            numberOfPeopleInput.value = people;
            statusInput.value = status;

            // Show modal
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
             if (!modal) return;
            modal.classList.add('hidden');
            // Optional: Reset form fields if needed
            // form.reset();
        }

        // Close modal if clicking outside the content area
        if (modal) {
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeEditModal();
                }
            });
        }

    </script>
</body>
</html>