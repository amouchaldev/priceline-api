<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReviewController;

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

/*
|--------------------------------------------------------------------------
| client routes
|--------------------------------------------------------------------------
*/


Route::group(['as' => 'location'], function () {
    // get all cities
    Route::get('/cities', [LocationController::class, 'cities']);
    // get top 5 cities
    Route::get('/cities/top5', [LocationController::class, 'top5Cities']);
    // get available hotels in specific city 
    Route::get('/cities/{name}', [LocationController::class, 'availableHotelsInCity']);
});


// filter by city, available from, available until and type
Route::get('search', function (Request $request) {
    try {
        // return now();
        $city = $request->query('city');
        $availableFrom = Carbon::parse($request->query('from'))->toDateTimeString();
        $availableUntil = Carbon::parse($request->query('until'))->toDateTimeString();
        $type = $request->query('type');
        // return $type;
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
                })->withAvg('reviews', 'rate');
            }])->get();
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
                })->withAvg('reviews', 'rate');
            }])->get();
        foreach ($availableReservedHotels->pluck('hotels')[0] as $hotel) {
            if ($results->contains($hotel)) continue;
            $results->push($hotel);
        }
        if ($results->count() > 0) return response()->json($results);
        else return response()->json(['message' => 'unavailable hotels for this search']);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()]);
    }
});


// client reservations
Route::group(['prefix' => 'reservations', 'middleware' => 'jwt.verify'], function () {
    // Route::get('/', [ReservationController::class, 'clientReservations']);
    Route::post('/', [ReservationController::class, 'makeReservation']);
});

Route::group(['prefix' => 'profile', 'middleware' => 'jwt.verify'], function () {
    Route::get('/', [ClientController::class, 'profile']);
    Route::put('/', [ClientController::class, 'updateProfile']);
    Route::get('/cards', [ClientController::class, 'clientCard']);
    Route::post('/cards', [ClientController::class, 'storeCard']);
    Route::put('/cards', [ClientController::class, 'updateCard']);
});

Route::group(['prefix' => 'reviews', 'middleware' => 'jwt.verify'], function() {
    Route::post('/', [ReviewController::class, 'store']);
    // Route::get('/{hotel}/active', [TypeController::class, 'activeTypes']);
    // Route::post('/', [TypeController::class, 'store']);
    // Route::put('/{id}', [TypeController::class, 'update']);
    // Route::delete('/{id}', [TypeController::class, 'destroy']);
});

// hotel detail with available types
Route::get('hotels/{id}', [HotelController::class, 'hotelWithAvailableTypes']);

/*
|--------------------------------------------------------------------------
| admin routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['jwt.verify', 'isAdmin'], 'as' => 'admin', 'prefix' => 'admin'], function () {
    
    Route::group(['prefix' => 'hotels'], function() {
        Route::get('/', [HotelController::class, 'getOwnerHotels']);
        Route::post('/', [HotelController::class, 'store']);
        Route::get('/{id}', [HotelController::class, 'hotelDetail']);
        Route::put('/{id}', [HotelController::class, 'update']);
        Route::delete('/{id}', [HotelController::class, 'destroy']);

        // idmoulay
        Route::post('/confirmInfos', [HotelController::class, 'confirmInfos']);
        Route::post('/confirmEmplacement', [HotelController::class, 'confirmEmplacement']);
        Route::post('/confirmPhotos', [HotelController::class, 'confirmPhotos']);
        Route::post('/createHotel', [HotelController::class, 'createHotel']);
    });
    
    Route::group(['prefix' => 'types'], function() {
        Route::get('/{hotel}', [TypeController::class, 'allTypes']);
        Route::get('/{hotel}/active', [TypeController::class, 'activeTypes']);
        Route::post('/', [TypeController::class, 'store']);
        Route::put('/{id}', [TypeController::class, 'update']);
        Route::delete('/{id}', [TypeController::class, 'destroy']);
    });

    Route::group(['prefix' => 'rooms'], function() {
        Route::post('/', [RoomController::class, 'store']);
        Route::put('/{id}', [RoomController::class, 'update']);
        Route::delete('/{id}', [RoomController::class, 'destroy']);
    });


});



/*
|--------------------------------------------------------------------------
| Auth API Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function() {
    $data = [
        'message' => "Welcome to our API"
    ];
    return response()->json($data, 200);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('jwt.verify')->group(function() {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::delete('/logout', [AuthController::class, 'logout']);
    
    Route::get('/test', function () {
        return response()->json(['test' => 'test test']);
    });

});

