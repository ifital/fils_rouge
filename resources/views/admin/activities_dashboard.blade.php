<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Waves - Activity Management</title>
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
                        <a href="{{ Route('admin.activities.index') }}" class="flex items-center px-4 py-3 text-yellow-400 bg-gray-900 border-l-4 border-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-umbrella-beach"></i>
                            </span>
                            <span>Activities</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.payments') }}" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <span>Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.reservations') }}" class="flex items-center px-4 py-3 text-white hover:bg-gray-800 hover:text-yellow-400">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <span>Reservations</span>
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
                <div class="mb-6 md:mb-8 flex justify-between items-center">
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-black">Activity Management</h1>
                        <p class="text-gray-600">Manage activities offered by Blue Waves</p>
                    </div>
                    <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="bg-black hover:bg-gray-900 transition text-yellow-400 px-4 py-2 rounded-md shadow-sm">
                        + Add Activity
                    </button>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Activities Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($activities as $activity)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-lg">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $activity->images) }}" alt="Activity image" class="w-full h-32 object-cover">
                                <div class="absolute top-2 right-2">
                                    <span class="text-xs px-2 py-1 rounded-full 
                                        {{ $activity->status == 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $activity->status == 'available' ? 'Available' : 'Unavailable' }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-semibold text-gray-800">{{ $activity->name }}</h3>
                                    <span class="text-sm font-bold text-black">{{ $activity->price }} MAD</span>
                                </div>
                                <p class="text-xs text-gray-600 mb-2 line-clamp-2">{{ $activity->description }}</p>
                                
                                <div class="flex gap-1 mt-2">
                                    <button onclick="openModal({{ $activity->id }}, '{{ $activity->name }}', '{{ $activity->description }}', '{{ $activity->price }}', '{{ $activity->status }}')" class="bg-black hover:bg-gray-900 transition text-yellow-400 text-xs px-2 py-1 rounded">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>

                                    <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-black hover:bg-gray-900 transition text-red-400 text-xs px-2 py-1 rounded">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $activities->links() }}
                </div>
            </div>
        </main>
    </div>

    <!-- ADD ACTIVITY MODAL -->
    <div id="addModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden overflow-y-auto">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg relative shadow-lg max-h-full my-6 mx-4">
            <div class="max-h-[90vh] overflow-y-auto">
                <button onclick="closeModal('addModal')" class="absolute top-3 right-4 text-gray-600 text-2xl hover:text-black">&times;</button>

                <h3 class="text-xl font-semibold mb-4">Add Activity</h3>

                <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="md:col-span-2">
                            <label class="block mb-1 text-sm font-medium">Name</label>
                            <input type="text" name="name" class="w-full border p-2 rounded" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block mb-1 text-sm font-medium">Description</label>
                            <textarea name="description" class="w-full border p-2 rounded" rows="3" required></textarea>
                        </div>

                        <div>
                            <label class="block mb-1 text-sm font-medium">Price</label>
                            <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
                        </div>

                        <div>
                            <label class="block mb-1 text-sm font-medium">Status</label>
                            <select name="status" class="w-full border p-2 rounded" required>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block mb-1 text-sm font-medium">Image</label>
                            <input type="file" name="images" class="w-full border p-2 rounded" accept="image/*" required>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal('addModal')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit" class="bg-black hover:bg-gray-900 text-yellow-400 px-4 py-2 rounded-md">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT ACTIVITY MODAL -->
    <div id="editModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden overflow-y-auto">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg relative shadow-lg max-h-full my-6 mx-4">
            <div class="max-h-[90vh] overflow-y-auto">
                <button onclick="closeModal('editModal')" class="absolute top-3 right-4 text-gray-600 text-2xl hover:text-black">&times;</button>

                <h3 class="text-xl font-semibold mb-4">Edit Activity</h3>

                <form action="{{ route('admin.activities.update', ':activity_id') }}" method="POST" enctype="multipart/form-data" id="editForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="md:col-span-2">
                            <label class="block mb-1 text-sm font-medium">Name</label>
                            <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block mb-1 text-sm font-medium">Description</label>
                            <textarea name="description" id="description" class="w-full border p-2 rounded" rows="3" required></textarea>
                        </div>

                        <div>
                            <label class="block mb-1 text-sm font-medium">Price</label>
                            <input type="number" step="0.01" name="price" id="price" class="w-full border p-2 rounded" required>
                        </div>

                        <div>
                            <label class="block mb-1 text-sm font-medium">Status</label>
                            <select name="status" id="status" class="w-full border p-2 rounded" required>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block mb-1 text-sm font-medium">Image</label>
                            <input type="file" name="images" class="w-full border p-2 rounded" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image</p>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal('editModal')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit" class="bg-black hover:bg-gray-900 text-yellow-400 px-4 py-2 rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openModal(id, name, description, price, status) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('name').value = name;
        document.getElementById('description').value = description;
        document.getElementById('price').value = price;
        document.getElementById('status').value = status;

        const form = document.getElementById('editForm');
        form.action = form.action.replace(':activity_id', id);
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
    
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