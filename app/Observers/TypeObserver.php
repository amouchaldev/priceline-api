<?php

namespace App\Observers;

use App\Models\Type;

class TypeObserver
{
    /**
     * Handle the Type "created" event.
     */
    public function created(Type $type): void
    {
        //
    }

    /**
     * Handle the Type "updated" event.
     */
    public function updated(Type $type): void
    {
        //
    }

    /**
     * Handle the Type "deleted" event.
     */
    public function deleted(Type $type): void
    {
        $type->rooms()->delete();
        $type->images()->delete();
    }

    /**
     * Handle the Type "restored" event.
     */
    public function restored(Type $type): void
    {
        //
    }

    /**
     * Handle the Type "force deleted" event.
     */
    public function forceDeleted(Type $type): void
    {
        //
    }
}
