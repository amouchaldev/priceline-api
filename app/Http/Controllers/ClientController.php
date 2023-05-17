<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ClientController extends Controller
{
    public function profile() {
        $clientReservations = Reservation::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'DESC')
        ->paginate(4);

        $reservationsRoomsTypes = Reservation::with('room.type')
                                            ->where('user_id', auth()->user()->id)
                                            ->get();
        $nightsCount = 0;
        $spentMoney = 0;
        foreach($reservationsRoomsTypes as $reservation) {
            $nightsCount += Carbon::parse($reservation->until)->diffInDays($reservation->from);
            $spentMoney += $reservation->room->type->price;
        }
        return response()->json(compact('clientReservations', 'nightsCount', 'spentMoney'));
        
    }

    public function updateProfile(Request $request) {
        $fields = $request->only(['name', 'email', 'password']);
        $user = User::whereId(auth()->user()->id)->update($fields);
        if($user) return response()->json(['message' => 'updated successfully']);
    }


    public function clientCard() {
        $card = Card::where('user_id', auth()->user()->id)->first();
        if(!$card) return response()->json(['message' => 'no card']);
        return $card;
    }

    public function storeCard(Request $request) {
        $validator = FacadesValidator::make($request->all(), [
            'card_number' => 'required|integer',
            'card_type' => 'required|in:visa,mastercard,cmi',
            'exp_date' => 'required',
            'cvv' => 'required|integer',
            ]);
        if ($validator->fails()) return response()->json(['message' => 'déjà une carte']);
        $card = Card::make($request->all());
        $card->user()->associate(auth()->user())->save();
        return response()->json(['message' => 'created successfully']);
    }

    public function updateCard(Request $request) {
        $request->validate([
            'card_number' => 'required',
            'card_type' => 'required',
            'exp_date' => 'required',
            'cvv' => 'required',
        ]);
        $card = Card::where('user_id', auth()->user()->id)->update($request->all());
        return response()->json(['message' => 'updated successfully']);


    }

}
