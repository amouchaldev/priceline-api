<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'description', 'bed'];
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function offer() {
        return $this->morphOne(Offer::class, 'offerable');
    }
}
