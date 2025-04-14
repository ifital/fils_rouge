<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;


class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAllRooms(4);
        return view('admin.rooms_dashboard', compact('rooms'));
    }

    public function home()
    {
        $rooms = $this->roomService->getAllRooms(4);
        return view('client.home', compact('rooms'));
    }

    public function show($id)
    {
        $room = $this->roomService->getRoomDetails($id);

        if (!$room) {
            return redirect()->back()->with('error', 'Chambre non trouvée.');
        }

        return view('client.detaills_rooms', compact('room'));
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


public function update(UpdateRoomRequest $request, Room $room)
{
    $room->room_number = $request->room_number;
    $room->type = $request->type;
    $room->description = $request->description;
    $room->price = $request->price;
    $room->status = $request->status;

    if ($request->hasFile('images')) {
        $path = $request->file('images')->store('rooms', 'public');
        $room->images = $path;
    }

    $room->save();

    return back()->with('success', 'Chambre mise à jour avec succès.');
}

    
}
