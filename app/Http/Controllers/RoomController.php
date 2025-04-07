<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;

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
        return view('admin.rooms_dahsboard', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'type' => 'required|in:dormitory,private',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,cleaning,maintenance',
            'images' => 'required|image',
        ]);

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
            'room_number' => 'required|unique:rooms',
            'type' => 'required|in:dormitory,private',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,cleaning,maintenance',
            'images' => 'required|image',
        ]);

        $this->roomService->updateRoom($request, $room);

        return back()->with('success', 'Chambre mise à jour.');
    }
}
