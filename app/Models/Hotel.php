<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'address', 'description', 'city_id', 'stars', 'user_id'];
    // protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function city() {
        return $this->belongsTo(City::class);
    }
    public function rooms() {
        return $this->hasMany(Room::class);
    }
    public function reviews() {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function types() {
        return $this->hasMany(Type::class);
    }

    public function admin() {
        return $this->belongsTo(User::class);
    }
   
}
