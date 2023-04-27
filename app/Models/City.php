<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    public function hotels() {
        return $this->hasMany(Hotel::class);
    }
    public function apartments() {
        return $this->hasMany(Apartment::class);
    }
    public function villas() {
        return $this->hasMany(Villa::class);
    }
}
