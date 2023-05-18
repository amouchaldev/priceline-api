<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'room_id', 'from', 'until'];
    protected $hidden = ['updated_at', 'deleted_at'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }
}
