<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Liste des chambres</h2>
        <button onclick="document.getElementById('modal').classList.remove('hidden')" class="bg-green-600 text-white px-4 py-2 rounded">
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
                <p>Type : {{ $room->type }}</p>
                <p>Prix : {{ $room->price }} MAD</p>
                <p>Statut : {{ $room->status }}</p>

                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                </form>

                <!-- Modifier -->
                <form action="{{ route('admin.rooms.update', $room) }}" method="POST" class="mt-2">
                    @csrf
                    @method('PUT')
                    <select name="status" class="border p-1 rounded">
                        @foreach(['available', 'occupied', 'cleaning', 'maintenance'] as $status)
                            <option value="{{ $status }}" {{ $room->status == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                    <button class="bg-blue-500 text-white px-3 py-1 rounded ml-2">Modifier</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded w-full max-w-lg relative">
        <button onclick="document.getElementById('modal').classList.add('hidden')" class="absolute top-2 right-2 text-gray-600 text-xl">&times;</button>

        <h3 class="text-xl font-bold mb-4">Ajouter une chambre</h3>

        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="room_number">Numéro</label>
                <input type="text" name="room_number" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <label for="type">Type</label>
                <select name="type" class="w-full border p-2 rounded" required>
                    <option value="dormitory">Dortoir</option>
                    <option value="private">Privée</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price">Prix</label>
                <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <label for="status">Statut</label>
                <select name="status" class="w-full border p-2 rounded" required>
                    <option value="available">Disponible</option>
                    <option value="occupied">Occupée</option>
                    <option value="cleaning">Nettoyage</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="images">Image</label>
                <input type="file" name="images" class="w-full border p-2 rounded" accept="image/*" required>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Ajouter</button>
        </form>
    </div>
</div>