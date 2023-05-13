<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Resources\TypeResource;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function allTypes($hotel) {
        return Type::where('hotel_id', $hotel)->get();
    }
    public function activeTypes($hotel) {
        return Type::where('hotel_id', $hotel)->whereStatus('active')->get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if ($request['status'] === 'active') {
                $validator = Validator::make($request->all(), [
                    'hotel_id' => 'required',
                    'name' => 'required',
                    'number_bed' => 'required', 
                    'price' => 'required',
                    'NbrPersons' => 'required',
                    'tarif_hebdomadaire' => 'required',
                    'tarif_mensuel' => 'required',
                    'room_size' => 'required',
                ]);
            }
            $validator = Validator::make($request->all(), [
                'hotel_id' => 'required',
            ]);
            if ($validator->fails()) throw new Exception($validator->errors());
            $type = Type::create($request->all());
            if ($request->hasFile('images')) {
                foreach($request->file('images') as $img) {
                    $image = Image::make([
                        'path' => Storage::putFile('types', $img)
                    ]);
                    $type->images()->save($image);
                }
            }
            return response()->json($type, 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if ($request['status'] === 'active') {
                $validator = Validator::make($request->all(), [
                    'hotel_id' => 'required',
                    'name' => 'required',
                    'number_bed' => 'required', 
                    'price' => 'required',
                    'NbrPersons' => 'required',
                    'tarif_hebdomadaire' => 'required',
                    'tarif_mensuel' => 'required',
                    'room_size' => 'required',
                    'status' => 'required'
                ]);
                if ($validator->fails()) throw new Exception($validator->errors());
            }
            $validator = Validator::make($request->all(), [
                'hotel_id' => 'required',
            ]);
            if ($validator->fails()) throw new Exception($validator->errors());
            $type = Type::whereId($id)->update($request->all());
            // if ($request->hasFile('images')) {
            //     foreach($type->images as $img) {
            //         Storage::delete($img);
            //         $img->delete();
            //     }
            //     foreach($request->file('images') as $img) {
            //         $image = Image::make([
            //             'path' => Storage::putFile('types', $img)
            //         ]);
            //         $type->images()->save($image);
            //     }
            // }
            if(!$type) throw new Exception('failed to update');
            return response()->json(new TypeResource(Type::with('images')->find($id)), 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $type = Type::with('images')->findOrFail($id);
            foreach($type->images as $img) {
                Storage::delete($img->path);
            }
            $type->delete();
            return response()->json(['message' => 'deleted successfully']);
         }   
         catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
         }
    }
}
