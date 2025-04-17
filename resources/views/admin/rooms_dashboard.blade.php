<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des chambres</title>
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
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.rooms.index') }}" class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 border-l-4 border-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-bed"></i>
                            </span>
                            <span>Chambres</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.activities.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-umbrella-beach"></i>
                            </span>
                            <span>Activités</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <span>Paiements</span>
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
                            <span>Réservations</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                            <span class="sidebar-icon mr-3">
                                <i class="fas fa-cog"></i>
                            </span>
                            <span>Paramètres</span>
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
                    <span>Déconnexion</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-6 w-full overflow-x-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Liste des chambres</h2>
                    <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="bg-green-600 hover:bg-green-700 transition text-white px-4 py-2 rounded-md shadow-sm">
                        + Ajouter une chambre
                    </button>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($rooms as $room)
                        <div class="bg-white rounded-2xl shadow-md p-5 transition hover:shadow-lg">
                            <img src="{{ asset('storage/' . $room->images) }}" alt="Image chambre" class="w-full h-48 object-cover rounded-xl mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Chambre #{{ $room->room_number }}</h3>
                            <p class="text-sm text-gray-600 mb-1">Type : {{ $room->type }}</p>
                            <p class="text-sm text-gray-600 mb-1">Description : {{ $room->description }}</p>
                            <p class="text-sm text-gray-600 mb-1">Prix : <span class="font-medium text-gray-800">{{ $room->price }} MAD</span></p>
                            <p class="text-sm text-gray-600 mb-4">Statut : {{ $room->status }}</p>

                            <div class="flex gap-2">
                                <button onclick="openModal({{ $room->id }}, '{{ $room->room_number }}', '{{ $room->type }}', '{{ $room->description }}', '{{ $room->price }}', '{{ $room->status }}')" class="bg-blue-600 hover:bg-blue-700 transition text-white text-sm px-3 py-1 rounded-md">
                                    Modifier
                                </button>

                                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 transition text-white text-sm px-3 py-1 rounded-md">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL POUR AJOUTER UNE CHAMBRE -->
    <div id="addModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden overflow-y-auto">
        <div class="bg-white p-6 rounded-2xl w-full max-w-lg relative shadow-lg max-h-full my-6 mx-4">
            <div class="max-h-[90vh] overflow-y-auto">
                <button onclick="closeModal('addModal')" class="absolute top-3 right-4 text-gray-600 text-2xl hover:text-black">&times;</button>

                <h3 class="text-xl font-semibold mb-4">Ajouter une chambre</h3>

                <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="room_number" class="block mb-1">Numéro</label>
                        <input type="text" name="room_number" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="block mb-1">Type</label>
                        <select name="type" class="w-full border p-2 rounded" required>
                            <option value="dormitory">Dortoir</option>
                            <option value="private">Privée</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="block mb-1">Description</label>
                        <textarea name="description" class="w-full border p-2 rounded" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="block mb-1">Prix</label>
                        <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="space" class="block mb-1">space</label>
                        <input type="number" step="0.01" name="space" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="block mb-1">Statut</label>
                        <select name="status" class="w-full border p-2 rounded" required>
                            <option value="available">Disponible</option>
                            <option value="occupied">Occupée</option>
                            <option value="cleaning">Nettoyage</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="block mb-1">Image</label>
                        <input type="file" name="images" class="w-full border p-2 rounded" accept="image/*" required>
                    </div>

                    <button type="submit" class="bg-green-600 hover:bg-green-700 transition text-white px-4 py-2 rounded-md">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL POUR MODIFIER UNE CHAMBRE -->
    <div id="editModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden overflow-y-auto">
        <div class="bg-white p-6 rounded-2xl w-full max-w-lg relative shadow-lg max-h-full my-6 mx-4">
            <div class="max-h-[90vh] overflow-y-auto">
                <button onclick="closeModal('editModal')" class="absolute top-3 right-4 text-gray-600 text-2xl hover:text-black">&times;</button>

                <h3 class="text-xl font-semibold mb-4">Modifier la chambre</h3>

                <form action="{{ route('admin.rooms.update', ':room_id') }}" method="POST" enctype="multipart/form-data" id="editRoomForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="room_number" class="block mb-1">Numéro de chambre</label>
                        <input type="text" name="room_number" id="room_number" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="block mb-1">Type</label>
                        <select name="type" id="type" class="w-full border p-2 rounded" required>
                            <option value="dormitory">Dortoir</option>
                            <option value="private">Privée</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="block mb-1">Description</label>
                        <textarea name="description" id="description" class="w-full border p-2 rounded" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="block mb-1">Prix</label>
                        <input type="number" step="0.01" name="price" id="price" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="block mb-1">Statut</label>
                        <select name="status" id="status" class="w-full border p-2 rounded" required>
                            <option value="available">Disponible</option>
                            <option value="occupied">Occupée</option>
                            <option value="cleaning">Nettoyage</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="block mb-1">Image</label>
                        <input type="file" name="images" id="images" class="w-full border p-2 rounded" accept="image/*">
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 transition text-white px-4 py-2 rounded-md">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openModal(id, roomNumber, type, description, price, status) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('room_number').value = roomNumber;
        document.getElementById('type').value = type;
        document.getElementById('description').value = description;
        document.getElementById('price').value = price;
        document.getElementById('status').value = status;
        const formAction = document.getElementById('editRoomForm').action.replace(':room_id', id);
        document.getElementById('editRoomForm').action = formAction;
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