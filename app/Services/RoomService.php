<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomService
{
    public function getAllRooms($perPage)
    {
        return Room::paginate($perPage);
    }

    public function getAvailableRooms($perPage)
    {
        return Room::where('status', 'available')->paginate($perPage);
    }

    public function getRoomDetails(int $id)
    {
        return Room::find($id);
    }

    public function storeRoom(Request $request): void
    {
        $path = $request->file('images')->store('rooms', 'public');

        Room::create([
            'room_number' => $request->room_number,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
            'space' => $request->space,
            'status' => $request->status,
            'images' => $path,
        ]);
    }

    public function deleteRoom(Room $room): void
    {
        $room->delete();
    }

    public function updateRoom(Request $request, Room $room): void
    {
        $room->update($request->only('type', 'price', 'status'));
    }
}
