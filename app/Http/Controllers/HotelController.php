<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelResource;
use App\Http\Resources\TypeResource;
use App\Models\Hotel;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class HotelController extends Controller
{

    public function getOwnerHotels() {
        $hotels = Hotel::where('user_id', auth()->user()->id)->get();
        return HotelResource::collection($hotels);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'city_id' => 'required', 
                'address' => 'required',
            ]);
            if ($validator->fails()) throw new Exception($validator->errors());
            $hotel = Hotel::make($request->all());
            $hotel->user()->associate(auth()->user())->save();
            return response()->json($hotel, 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * get hotel with types that's have available rooms.
     */
    public function hotelWithAvailableTypes(string $id)
    {
        try {
            $hotel = new HotelResource(Hotel::findOrFail($id));
            // get hotel rooms types that have available rooms
            $types = TypeResource::collection(Type::whereHas('rooms', function ($query) use ($id){
                $query->where('hotel_id', $id)
                ->whereDoesntHave('reservation');
            })->get());
            return response()->json(compact('hotel', 'types'));
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json(['error' => "hotel with id $id not found"], 404);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * get hotel with types that's have available rooms.
     */
    public function hotelDetail(string $id)
    {
        try {
            $hotel = new HotelResource(Hotel::with('city.region')->findOrFail($id));
            return response()->json(compact('hotel'));
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json(['error' => "hotel with id $id not found"], 404);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'city_id' => 'required', 
                'address' => 'required'
            ]);
            if ($validator->fails()) throw new Exception($validator->errors());
            $hotel = Hotel::whereId($id)->update($request->all());
            return response()->json($hotel, 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     try {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response()->json(['message' => 'deleted successfully']);
     }   
     catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
     }
    }
}
