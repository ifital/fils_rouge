<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves - User Information</title>
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
<body class="bg-gray-100 min-h-screen" x-data="{ sidebarOpen: false, modalOpen: false, deleteModalOpen: false, editId: null, deleteId: null }">
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
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-bed"></i>
                            </span>
                            <span>Rooms</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-umbrella-beach"></i>
                            </span>
                            <span>Activities</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <span>Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-yellow-400 bg-gray-900 border-l-4 border-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-users"></i>
                            </span>
                            <span>Users</span>
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
                <a href="#" class="flex items-center text-gray-400 hover:text-yellow-400">
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
                    <h1 class="text-xl md:text-2xl font-bold text-black">User Information</h1>
                    <p class="text-gray-600">Manage user profiles and contact information</p>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-4 md:p-6 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <h3 class="font-semibold text-gray-800 mb-3 md:mb-0">User Profiles</h3>
                        <div class="text-sm text-gray-600">
                            <span class="font-medium">{{ count($users) }}</span> users
                        </div>
                    </div>
        
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Name</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Email</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Description</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="border-b hover:bg-gray-50" id="row-user{{ $user->id }}">
                                        <td class="px-4 py-3 text-sm">{{ $user->id }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $user->description }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="flex space-x-2">
                                                <button @click="modalOpen = true; editId = '{{ $user->id }}'" class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 transition-colors">
                                                    <i class="fas fa-edit mr-1"></i> Edit
                                                </button>
                                                <button @click="deleteModalOpen = true; deleteId = '{{ $user->id }}'" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors">
                                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        
            </div>
        </main>
    </div>
    
    <!-- Edit Modal -->
    <div 
        x-show="modalOpen" 
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div 
            @click.away="modalOpen = false"
            class="bg-white w-11/12 max-w-lg rounded-lg shadow-lg overflow-hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
        >
            <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Edit User Information</h2>
            </div>
            
            <div class="p-6">
                <form id="editForm">
                    <input type="hidden" id="editId" x-model="editId">
                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Name:</label>
                        <input type="text" id="editName" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                        <input type="email" id="editEmail" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-4">
                        <label for="editDescription" class="block text-sm font-medium text-gray-700 mb-1">Description:</label>
                        <textarea id="editDescription" rows="4" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400"></textarea>
                    </div>
                </form>
            </div>
            
            <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end space-x-3">
                <button @click="modalOpen = false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition-colors">
                    Cancel
                </button>
                <button @click="saveChanges(); modalOpen = false" class="px-4 py-2 bg-yellow-400 text-black rounded hover:bg-yellow-500 transition-colors">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div 
        x-show="deleteModalOpen" 
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div 
            @click.away="deleteModalOpen = false"
            class="bg-white w-11/12 max-w-md rounded-lg shadow-lg overflow-hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
        >
            <div class="bg-red-500 px-6 py-4 text-white">
                <h2 class="text-xl font-semibold">Confirm Deletion</h2>
            </div>
            
            <div class="p-6">
                <p class="text-gray-700 mb-4">Are you sure you want to delete this user? This action cannot be undone.</p>
                <div class="flex justify-end space-x-3">
                    <button @click="deleteModalOpen = false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition-colors">
                        Cancel
                    </button>
                    <button @click="deleteUser(); deleteModalOpen = false" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors">
                        Delete User
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function saveChanges() {
            const id = document.getElementById('editId').value;
            const name = document.getElementById('editName').value;
            const email = document.getElementById('editEmail').value;
            const description = document.getElementById('editDescription').value;
            
            if (id === 'user1') {
                document.getElementById('userName').textContent = name;
                document.getElementById('userEmail').textContent = email;
                document.getElementById('userDescription').textContent = description;
            } else if (id === 'user2') {
                document.getElementById('contactName').textContent = name;
                document.getElementById('contactEmail').textContent = email;
                document.getElementById('contactDescription').textContent = description;
            }
        }
        
        function deleteUser() {
            const id = Alpine.$data.deleteId;
            const rowElement = document.getElementById(`row-${id}`);
            
            if (rowElement) {
                rowElement.remove();
                
                // Update user count
                const userCount = document.getElementById('userTableBody').getElementsByTagName('tr').length;
                document.getElementById('userCount').textContent = userCount;
            }
        }
        
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                const app = Alpine.store('app');
                if (Alpine.$data.modalOpen) {
                    const id = Alpine.$data.editId;
                    setTimeout(() => {
                        if (id === 'user1') {
                            document.getElementById('editName').value = document.getElementById('userName').textContent;
                            document.getElementById('editEmail').value = document.getElementById('userEmail').textContent;
                            document.getElementById('editDescription').value = document.getElementById('userDescription').textContent;
                        } else if (id === 'user2') {
                            document.getElementById('editName').value = document.getElementById('contactName').textContent;
                            document.getElementById('editEmail').value = document.getElementById('contactEmail').textContent;
                            document.getElementById('editDescription').value = document.getElementById('contactDescription').textContent;
                        }
                    }, 50);
                }
            });
        });
    </script>
</body>
</html>