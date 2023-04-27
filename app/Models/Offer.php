<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function offerable() {
        return $this->morphTo()
        ->where('available_from', '<=', now())
        ->where('active', 1);
    }
}
