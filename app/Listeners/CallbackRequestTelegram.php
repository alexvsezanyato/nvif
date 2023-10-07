<?php

namespace App\Listeners;

use App\Events\CallbackRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CallbackRequestTelegram
{
    /**
     * Handle the event.
     */
    public function handle(CallbackRequested $event): void
    {
    }
}
