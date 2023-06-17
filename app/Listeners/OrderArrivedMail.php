<?php

namespace App\Listeners;

use App\Events\OrderArrived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderArrivedMail extends ShouldQueue
{
    public $delay = "30";
    public $queue = "mails";

    public function viaConnection() {
        return "database";
    }

    public function viaQueue() {
        return "mails";
    }

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderArrived $event): void
    {
        $basePath = base_path();
        file_put_contents("$basePath/debug.txt", now(), FILE_APPEND);
    }
}
