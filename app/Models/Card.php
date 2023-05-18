<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['card_number', 'card_type', 'exp_date', 'cvv'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
