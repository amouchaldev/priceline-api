<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // request should contains available from, available until, room type, hotel id
            $request->validate([
                'from' => 'required',
                'until' => 'required',
                'type_id' => 'required',
                'hotel_id' => 'required',
                'user_id' => 'required'
                // 'quantity' => 'required'
            ]);
            // from, until the date range that the user wants to reserve
            $from = Carbon::parse($request->input('from'))->toDateString();
            $until = Carbon::parse($request->input('until'))->toDateString();
            $quantity = $request->input('quantity') ?? 1;
            $typeId = $request->input('type_id');
            $hotelId = $request->input('hotel_id');
    
            $availableRooms = Room::whereDoesntHave('reservation')
                ->where('type_id', $typeId)
                ->where('hotel_id', $hotelId)
                ->limit($quantity)
                ->get();
            // difference between quantity that user want with unreserved rooms
            $difference = $quantity - $availableRooms->count();
            // if the difference equal 0 that means there is enough unreserved rooms
            // else means that unreserved rooms not enough 
            // so we should search in reserved rooms to find available rooms in user range date (from, until)
            if ($difference === 0) {
                foreach ($availableRooms as $room) {
                    Reservation::create([
                        'user_id' => $request->input('user_id'),
                        'room_id' => $room->id,
                        'from' => $from,
                        'until' => $until
                    ]);
                }
            } 
            else {
                $availableReservedRooms = Room::where('type_id', $request->input('type_id'))
                    ->where('hotel_id', $request->input('hotel_id'))
                    ->WhereHas('reservation', function ($query) use ($from, $until) {
                        $query->whereDate('until', '<', $from)
                            ->orWhereDate('from', '>', $until);
                    })
                    ->limit($difference)
                    ->get();
                // if the difference between $difference and $availableReservedRooms not equal 0 that means unavailable rooms
                if ($availableReservedRooms->count() - $difference !== 0) {
                    // throw error quantity not available!
                    throw new Exception('unavailable quantity');
                }
                foreach($availableReservedRooms as $room) {
                    $availableRooms->push($room);
                }
    
            }
            // create a reservations records if there is available rooms
            foreach ($availableRooms as $room) {
                Reservation::create([
                    'user_id' => $request->input('user_id'),
                    'room_id' => $room->id,
                    'from' => $from,
                    'until' => $until
                ]);
            }
            return response()->json(['message' => 'reserved successfully'], 201);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
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
        //
    }
}
