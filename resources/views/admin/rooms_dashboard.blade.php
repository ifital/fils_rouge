<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des chambres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="container mx-auto mt-10 px-4">
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

<!-- MODAL POUR AJOUTER UNE CHAMBRE -->
<div id="addModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-2xl w-full max-w-lg relative shadow-lg">
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

<!-- MODAL POUR MODIFIER UNE CHAMBRE -->
<div id="editModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-2xl w-full max-w-lg relative shadow-lg">
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
</script>

</body>
</html>
