<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomService
{
    public function getAllRooms()
    {
        return Room::all();
    }

    public function getRoomDetails(int $id)
    {
        return Room::paginate(4);
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
