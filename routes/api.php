<?php

use App\Http\Controllers\CityContoller;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Resources\HotelResource;
use App\Http\Resources\TypeResource;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;


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


Route::group(['as' => 'location'], function () {
    // get all cities
    Route::get('/cities', function () {
        return City::with('region')->all();
    });
    // get top 5 cities
    Route::get('/cities/top5', function () {
        return City::with('region')
            ->whereIn('name', ['Casablanca', 'Agadir', 'Marrakech', 'Tanger', 'Fes'])
            ->get();
    });
    // get available hotels in specific city 
    Route::get('/cities/{name}', function ($name) {
        return City::whereName($name)
            ->with(['hotels' => function ($query) {
                $query->whereHas('rooms', function ($query) {
                    $query->whereDoesntHave('reservation');
                });
            }])->first();
    });
});



// filter by city, available from and available until
Route::get('search', function (Request $request) {
    try {
        $city = $request->query('city');
        $availableFrom = Carbon::parse($request->query('from'))->toDateTimeString();
        $availableUntil = Carbon::parse($request->query('until'))->toDateTimeString();
        $type = $request->query('type');
        $results = collect();

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
                    ->WhereHas('rooms', function ($query) use ($availableFrom, $availableUntil) {
                        $query->whereHas('reservation', function ($query) use ($availableFrom, $availableUntil) {
                            $query->where('until', '<', $availableFrom)
                                ->orWhere('from', '>', $availableUntil);
                        });
                    });
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


Route::group(['prefix' => 'admin'], function () {
    Route::get('/hotels', function () {
        // owner hotels
        return HotelResource::collection(Hotel::whereId(Auth::user()->id)->with('types.rooms', 'city.region')->get());
    });
    // hotel types
    Route::get('/hotels/{id}/types', function ($id) {
        return TypeResource::collection(Type::where('hotel_id', $id)->with('images')->get());
    });
});

// user reservations
Route::group(['prefix' => 'user'], function () {
    Route::get('/reservations', function () {
        return Reservation::where('user_id', Auth::user()->id)->paginate(4);
    });
});

Route::apiResources([
    // 'cities' => CityContoller::class,
    'hotels' => HotelController::class,
    'reservations' => ReservationController::class,
    'rooms' => RoomController::class,
    'types' => TypeController::class,
]);










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

Route::get('/', function() {
    $data = [
        'message' => "Welcome to our API"
    ];
    return response()->json($data, 200);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'getUser']);


Route::middleware('jwt.verify')->group(function() {
    Route::get('/test', function () {
        return response()->json(['test' => 'test test']);
    });
    
    Route::get('/dashboard', function() {
        return response()->json(['message' => 'Welcome to dashboard'], 200);
    });
});