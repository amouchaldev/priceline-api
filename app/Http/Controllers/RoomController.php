<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Hotel;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return RoomResource::collection(Room::with('hotel.city')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'hotel_id' => 'required',
                'type_id' => 'required', 
                'address' => 'required'
            ]);
            if ($validator->fails()) throw new Exception($validator->errors());
            $room = Hotel::create([
                'hotel_id' => $request->input('hotel_id'),
                'type_id' => $request->input('type_id'),
                'address' => $request->input('address')
            ]);
            return response()->json($room, 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->delete();
            return response()->json(['message' => "deleted successfully"]);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
