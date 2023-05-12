<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'number_of_beds' => $this->number_bed,
            'price_for_night' => $this->price,
            'discount' => $this->discount,
            'NbrPersons' => $this->NbrPersons,
            'room_size' => $this->room_size,
            'tarif_hebdomadaire' => $this->tarif_hebdomadaire,
            'tarif_mensuel' => $this->tarif_mensuel,
            'images' => $this->images
        ];
    }
}
