<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blue Waves - User Management</title>
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
          <span class="hidden md:inline-block">Admin</span>
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
        class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400 {{ request()->routeIs('employee.reservations.activities') ? 'text-yellow-400 bg-gray-900 border-l-4 border-yellow-400' : '' }}">
        <span class="sidebar-icon mr-3">
          <i class="fas fa-umbrella-beach"></i>
        </span>
        <span>Activity Reservations</span>
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
                <h1 class="text-xl md:text-2xl font-bold text-black">Users</h1>
                <p class="text-gray-600">Manage all registered users</p>
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

            <!-- Users Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="p-4 md:p-6 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center">
                    <h3 class="font-semibold text-gray-800 mb-3 md:mb-0">All Users</h3>
                    <div class="text-sm text-gray-600">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Name</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Email</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Role</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Created At</th>
                                <th class="px-4 py-3 text-left text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm">{{ $user->id }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                    <td class="px-4 py-3 text-sm">{{ ucfirst($user->role) }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 text-sm flex space-x-2">
                                        <!-- Edit Button -->
                                        <button 
                                        onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')" 
                                        class="px-3 py-1 text-xs bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                        Edit
                                        </button>
                                        <!-- Delete Button -->
                                        <form action="{{ route('employee.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-md">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Edit User Modal -->
        <div id="editUserModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-lg font-semibold mb-4">Edit User</h2>
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editUserId" name="user_id">
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="editUserName" name="name" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="editUserEmail" name="email" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>
            
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="editUserRole" name="role" class="mt-1 p-2 w-full border rounded-md" required>
                            <option value="admin">Admin</option>
                            <option value="employee">Manager</option>
                            <option value="client">Client</option>
                        </select>
                    </div>
            
                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
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

    function openEditModal(id, name, email, role) {
        const modal = document.getElementById('editUserModal');
        modal.classList.remove('hidden');

        document.getElementById('editUserId').value = id;
        document.getElementById('editUserName').value = name;
        document.getElementById('editUserEmail').value = email;
        document.getElementById('editUserRole').value = role;

        const form = document.getElementById('editUserForm');
        form.action = `/employee/users/${id}`; 
    }

    function closeEditModal() {
        const modal = document.getElementById('editUserModal');
        modal.classList.add('hidden');
    }
  </script>
</body>
</html>