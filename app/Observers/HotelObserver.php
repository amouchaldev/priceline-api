<?php

namespace App\Observers;

use App\Models\Hotel;

class HotelObserver
{
    /**
     * Handle the Hotel "created" event.
     */
    public function created(Hotel $hotel): void
    {
        //
    }

    /**
     * Handle the Hotel "updated" event.
     */
    public function updated(Hotel $hotel): void
    {
        //
    }

    /**
     * Handle the Hotel "deleted" event.
     */
    public function deleted(Hotel $hotel): void
    {
        // $hotel->rooms()->delete();
        $hotel->types()->delete();
    }

    /**
     * Handle the Hotel "restored" event.
     */
    public function restored(Hotel $hotel): void
    {
        //
    }

    /**
     * Handle the Hotel "force deleted" event.
     */
    public function forceDeleted(Hotel $hotel): void
    {
        //
    }
}
