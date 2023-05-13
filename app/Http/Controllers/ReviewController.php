<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request) {
        // return auth()->user();
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
            'rate' => 'required|between:1,10|integer'
        ]);
        if ($validator->fails()) return response()->json($validator->errors());
        $review = Review::where('user_id', auth()->user()->id)
                                    ->where('reviewable_type', 'App\Models\Hotel')
                                    ->where('reviewable_id', $request['hotel_id'])
                                    ->first();
        // return $review;
        if($review) {
            $review->rate = $request['rate'];
            $review->update();
            return response()->json($review);
        }
        $review = new Review();
        $hotel = Hotel::find($request['hotel_id']);
        $review->rate = $request['rate'];
        // $review->reviewable()->associate($hotel);
        // $review->reviewable()->associate(auth()->user());
        $review->user_id = auth()->user()->id;
        $hotel->reviews()->save($review);
        
        // $review->save();
        return response()->json($review);
    }
}
