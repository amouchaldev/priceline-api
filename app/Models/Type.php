<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'hotel_id', 'description', 'number_bed', 'price', 'discount','NbrPersons', 'room_size', 'tarif_hebdomadaire', 'tarif_mensuel'];

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function rooms() {
        return $this->hasMany(Room::class);
    }

}
