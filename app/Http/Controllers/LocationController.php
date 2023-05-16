<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function provinces() {
        return Region::all();
    }

    public function provinceCities($provinceId) {
        return City::where('region_id', $provinceId)->get();
    }

    public function cities() {
        return City::with('region')->all();
    }

    public function top5Cities() {
        return City::with('region')
            ->whereIn('name', ['Casablanca', 'Agadir', 'Marrakech', 'Tanger', 'Fes'])
            ->get();
    }

    public function availableHotelsInCity($name) {
        return City::whereName($name)
        ->with(['hotels' => function ($query) {
            $query->whereHas('rooms', function ($query) {
                $query->whereDoesntHave('reservation');
            });
        }])->first();
    }

}
