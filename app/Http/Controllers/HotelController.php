<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelResource;
use App\Http\Resources\TypeResource;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\ConfirmEmplacementRequest;
use App\Http\Requests\ConfirmInfosRequest;
use App\Http\Requests\ConfirmPhotosRequest;

class HotelController extends Controller
{

    public function getOwnerHotels() {
        $hotels = Hotel::with('reviews')
                        ->withAvg('reviews', 'rate')
                        ->where('user_id', auth()->user()->id)
                        ->get();
        return HotelResource::collection($hotels);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $step = $request['step'];
            if ($step == 1) {
                $validator1 = Validator::make($request->all(), [
                    'name' => 'required',
                    'description' => 'required', 
                    'stars' => 'required|int',
                ]);
                if ($validator1->fails()) throw new Exception($validator1->errors());
            }
            else if ($step == 2) {
                $validator2 = Validator::make($request->all(), [
                    'rue' => 'required',
                    'pays' => 'required', 
                    'city_id' => 'required',
                ]);
                if ($validator2->fails()) throw new Exception($validator2->errors());
            }
            else if ($step == 3) {
                $validator3 = Validator::make($request->all(), [
                    'images' => 'required',
                ]);
                if ($validator3->fails()) throw new Exception($validator3->errors());
                if (count($request['images']) < 3) throw new Exception('upload at least 3 images');
            }
            else {
                $hotel = Hotel::make($request->all());
                $hotel->user()->associate(auth()->user())->save();
                foreach($request['images'] as $img) {
                    $image = Image::make(['path' => Storage::putFile('hotels', $img)]);
                    $hotel->images()->save($image);
                }
                return response()->json($hotel, 201);
            }
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
            $hotel = Hotel::with(['reviews', 'city'])
                                            ->withAvg('reviews', 'rate')
                                            ->whereId($id)->first();
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
                'description' => 'required', 
                'stars' => 'required|int',
                'rue' => 'required',
                'pays' => 'required', 
                'city_id' => 'required',
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


    public function confirmInfos(ConfirmInfosRequest $request)
    {
        return [
            'success' => true,
        ];
    }

    public function confirmEmplacement(ConfirmEmplacementRequest $request)
    {
        return [
            'success' => true,
        ];
    }

    public function confirmPhotos(ConfirmPhotosRequest $request)
    {
        return response()->json([
            'success' => true,
        ]);
    }

    public function createHotel(Request $request)
    {
        $data = [
            'hotelName' => $request->hotelName,
            'hotelDesc' => $request->hotelDesc,
            'hotelStars' => $request->hotelStars,
            'hotelStreet' => $request->hotelStreet,
            'hotelNumber' => $request->hotelNumber,
            'hotelProvince' => $request->hotelProvince,
            'hotelCity' => $request->hotelCity,
            'hotelCodePostal' => $request->hotelCodePostal,
        ];

        $photos = $request->file('hotelPhotos');

        foreach ($photos as $photo) {
            $path = $photo->store('public/images/hotelPhotos');
            // You can also store the file path in your database or perform any other necessary operations
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
