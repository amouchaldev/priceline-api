<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    public function offer() {
        return $this->morphOne(Offer::class, 'offerable');
    }
    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
   
}

