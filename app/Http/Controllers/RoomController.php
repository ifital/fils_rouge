<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;


class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAllRooms();
        return view('admin.rooms_dashboard', compact('rooms'));
    }


    public function store(StoreRoomRequest $request)
    {
        $this->roomService->storeRoom($request);
    
        return back()->with('success', 'Chambre ajoutée.');
    }
    

    public function destroy(Room $room)
    {
        $this->roomService->deleteRoom($room);

        return back()->with('success', 'Chambre supprimée.');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'type' => 'required|in:dormitory,private',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,cleaning,maintenance',
            'images' => 'nullable|image', 
        ]);
    
        // Mise à jour des champs
        $room->room_number = $request->room_number;
        $room->type = $request->type;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->status = $request->status;
    
        // Si une nouvelle image est envoyée, l'enregistrer et mettre à jour le chemin
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('rooms', 'public');
            $room->images = $path;
        }
    
        // Sauvegarde les modifications
        $room->save();
    
        return back()->with('success', 'Chambre mise à jour avec succès.');
    }
    
}
