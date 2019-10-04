<?php

namespace App\Listeners;

use App\Events\ProductVisit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateVisitCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductVisit  $event
     * @return void
     */
    public function handle(ProductVisit $event)
    {
        $event->product->increment('visits');
    }
}
