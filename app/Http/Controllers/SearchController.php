<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request) {
        try {
            $city = $request->query('city');
            $typeId = $request->query('type');
            if (!City::whereName($city)->exists() || !Type::whereId($typeId)->exists()) throw new Exception('invalid city');
            $availableFrom = Carbon::parse($request->query('from'))->toDateTimeString();
            $availableUntil = Carbon::parse($request->query('until'))->toDateTimeString();
            $type = Type::find($typeId);
            $results = collect();
            
            // throw error if started date passed or started date bigger than end date
            if ($availableUntil < $availableFrom || Carbon::parse($availableFrom) < now()) throw new Exception('invalid date');
            // get hotels that has available rooms
            $availableHotels =  City::whereName($city)
                ->with(['hotels' => function ($query) use ($typeId) {
                    $query
                        ->whereHas('rooms.type', function ($query) use ($typeId) {
                            $query->whereId($typeId);
                        })
                        ->WhereHas('rooms', function ($query) {
                            $query->whereDoesntHave('reservation');
                        });
                }, 'hotels' => function ($q) use($typeId){
                    $q->with('images')
                    ->whereHas('rooms.type', function ($query) use ($typeId) {
                        $query->whereId($typeId);
                    })->withAvg('reviews', 'rate')->withCount('reviews');
                }])->get();
            // return $availableHotels;
            foreach ($availableHotels->pluck('hotels')[0] as $hotel) {
                $hotel['total'] = Carbon::parse($availableFrom)->diffInDays(Carbon::parse($availableUntil)) * $type->price;
                $results->push($hotel);
            }
    
            // get hotels that has available reserved rooms in the user range time (from, until)
            $availableReservedHotels = City::whereName($city)
                ->with(['hotels' => function ($query) use ($availableFrom, $availableUntil, $typeId) {
                    $query->whereHas('rooms.type', function ($query) use ($typeId) {
                        $query->whereId($typeId);
                    })
                    ->WhereHas('rooms', function ($query) use ($availableFrom, $availableUntil, $typeId) {
                            $query->whereHas('reservation', function ($query) use ($availableFrom, $availableUntil, $typeId) {
                                $query->where('until', '<', $availableFrom)
                                    ->orWhere('from', '>', $availableUntil);
                        });
                        });
                }, 'hotels' => function ($q) use($typeId){
                    $q->with('images')
                      ->whereHas('rooms.type', function ($query) use ($typeId) {
                        $query->whereId($typeId);
                    })->withAvg('reviews', 'rate')->withCount('reviews');
                }])->get();
            foreach ($availableReservedHotels->pluck('hotels')[0] as $hotel) {
                if ($results->contains($hotel)) continue;
                $hotel['total'] = Carbon::parse($availableFrom)->diffInDays(Carbon::parse($availableUntil)) * $type->price;
                $results->push($hotel);
            }

            if ($results->count() > 0) return response()->json([
                'data' => $results,
                'type' => $type
            ]);
            else return response()->json(['message' => 'unavailable hotels for this search'], 404);
            
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
