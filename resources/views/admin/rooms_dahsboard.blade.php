<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des chambres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Liste des chambres</h2>
        <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="bg-green-600 text-white px-4 py-2 rounded">
            Ajouter une chambre
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($rooms as $room)
            <div class="bg-white rounded shadow p-4">
                <img src="{{ asset('storage/' . $room->images) }}" alt="Image chambre" class="w-full h-48 object-cover rounded mb-3">
                <h3 class="text-xl font-semibold">Chambre #{{ $room->room_number }}</h3>
                <p class="mb-1">Type : {{ $room->type }}</p>
                <p class="mb-1">Description : {{ $room->description }}</p>
                <p class="mb-1">Prix : {{ $room->price }} MAD</p>
                <p class="mb-1">Statut : {{ $room->status }}</p>

                <!-- Modifier -->
                <button onclick="openModal({{ $room->id }}, '{{ $room->room_number }}', '{{ $room->type }}', '{{ $room->description }}', '{{ $room->price }}', '{{ $room->status }}')" class="bg-blue-500 text-white px-3 py-1 rounded">Modifier</button>

                <!-- Supprimer -->
                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<!-- MODAL POUR AJOUTER UNE CHAMBRE -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded w-full max-w-lg relative">
        <button onclick="closeModal('addModal')" class="absolute top-2 right-2 text-gray-600 text-xl">&times;</button>

        <h3 class="text-xl font-bold mb-4">Ajouter une chambre</h3>

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

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Ajouter</button>
        </form>
    </div>
</div>

<!-- MODAL POUR MODIFIER UNE CHAMBRE -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded w-full max-w-lg relative">
        <button onclick="closeModal('editModal')" class="absolute top-2 right-2 text-gray-600 text-xl">&times;</button>

        <h3 class="text-xl font-bold mb-4">Modifier la chambre</h3>

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

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
</div>

<script>
function openModal(id, roomNumber, type, description, price, status) {
    // Ouvrir le modal de modification
    document.getElementById('editModal').classList.remove('hidden');
    
    // Remplir les champs du formulaire de modification
    document.getElementById('room_number').value = roomNumber;
    document.getElementById('type').value = type;
    document.getElementById('description').value = description;
    document.getElementById('price').value = price;
    document.getElementById('status').value = status;

    // Mettre à jour l'URL du formulaire pour la chambre spécifique
    const formAction = document.getElementById('editRoomForm').action.replace(':room_id', id);
    document.getElementById('editRoomForm').action = formAction;
}

function closeModal(modalId) {
    // Fermer le modal
    document.getElementById(modalId).classList.add('hidden');
}
</script>

</body>
</html>
