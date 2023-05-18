<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['hotel_id', 'type_id', 'address', 'description', 'bed'];
    protected $hidden = ['updated_at', 'deleted_at'];
    
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    } 

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function reservation() {
        return $this->hasOne(Reservation::class)->where('until', '>', now());
    }

}

