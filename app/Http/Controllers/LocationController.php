<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
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
