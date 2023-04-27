<?php

use App\Models\City;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'cities'], function () {
    Route::get('/', function (){
        return City::all();
    });
    Route::get('/top5', function () {
        return City::whereIn('name', ['Casablanca', 'Agadir', 'Marrakech', 'Tanger', 'Fez'])
        ->get();
    });
    // get city offers
    Route::get('/{name}', function ($name) {
        return City::whereName($name)
        ->with(['hotels.rooms' => function ($query) {
            $query->whereHas('offer')->with('offer');
        }, 'villas.offer', 'apartments.offer'])
        ->first();
    });
    // 
});

// filter by city, available from and available until
Route::get('search', function (Request $request) {
    $city = $request->query('city');
    $availableFrom = $request->query('from'); 
    $availableUntil = $request->query('until');
    return City::whereName($city)
    ->with(['hotels.rooms' => function ($query) use($availableFrom, $availableUntil) {
        $query->whereHas('offer', function ($query) use($availableFrom, $availableUntil) {
            $query->whereDate('available_until', '<=', $availableUntil)
                ->whereDate('available_from', '>=', $availableFrom);
        })->with(['offer']);
    }, 'villas.offer', 'apartments.offer'])
    ->first();
});


Route::get('/test', function () {
    return Room::whereHas('offer')->with('offer')->get();
});
