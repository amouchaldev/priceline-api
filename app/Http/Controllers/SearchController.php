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
            if (!City::whereName($city)->exists()) throw new Exception('invalid city');
            $availableFrom = Carbon::parse($request->query('from'))->toDateTimeString();
            $availableUntil = Carbon::parse($request->query('until'))->toDateTimeString();
            $type = $request->query('type');

            
            $results = collect();
            // throw error if started date passed or started date bigger than end date
            if ($availableUntil < $availableFrom || Carbon::parse($availableFrom) < now()) throw new Exception('invalid date');
            // get hotels that has available rooms
            $availableHotels =  City::whereName($city)
                ->with(['hotels' => function ($query) use ($type) {
                    $query
                        ->whereHas('rooms.type', function ($query) use ($type) {
                            $query->whereId($type);
                        })
                        ->WhereHas('rooms', function ($query) {
                            $query->whereDoesntHave('reservation');
                        });
                }, 'hotels' => function ($q) use($type){
                    $q->whereHas('rooms.type', function ($query) use ($type) {
                        $query->whereId($type);
                    })->withAvg('reviews', 'rate')->withCount('reviews');
                }, 'hotels.images'])->get();
            foreach ($availableHotels->pluck('hotels')[0] as $hotel) {
                $results->push($hotel);
            }
    
            // get hotels that has available reserved rooms in the user range time (from, until)
            $availableReservedHotels = City::whereName($city)
                ->with(['hotels' => function ($query) use ($availableFrom, $availableUntil, $type) {
                    $query->whereHas('rooms.type', function ($query) use ($type) {
                        $query->whereId($type);
                    })
                    ->WhereHas('rooms', function ($query) use ($availableFrom, $availableUntil, $type) {
                            $query->whereHas('reservation', function ($query) use ($availableFrom, $availableUntil, $type) {
                                $query->where('until', '<', $availableFrom)
                                    ->orWhere('from', '>', $availableUntil);
                        });
                        });
                }, 'hotels' => function ($q) use($type){
                    $q->whereHas('rooms.type', function ($query) use ($type) {
                        $query->whereId($type);
                    })->withAvg('reviews', 'rate')->withCount('reviews');
                }, 'hotels.images'])->get();
            foreach ($availableReservedHotels->pluck('hotels')[0] as $hotel) {
                if ($results->contains($hotel)) continue;
                $results->push($hotel);
            }
            $type = Type::find($type);
            $total = Carbon::parse($availableFrom)->diffInDays(Carbon::parse($availableUntil)) * $type->price;
            if ($results->count() > 0) return response()->json(compact('results', 'type', 'total'));
            else return response()->json(['message' => 'unavailable hotels for this search'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
