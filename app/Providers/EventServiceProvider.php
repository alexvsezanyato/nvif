<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Bus\Queueable;
use function Illuminate\Events\queueable;

use App\Events\OrderArrived;
use App\Listeners\OrderArrivedMail;

class EventServiceProvider extends ServiceProvider
{
    use Queueable;

    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        # OrderArrived::class => [
        #     OrderArrivedMail::class
        # ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        # Event::listen(OrderArrived::class, [
        #     OrderArrivedMail::class
        # ]);

        Event::listen(queueable(function(OrderArrived $event) {
            file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/debug.txt", "debug");
        })->onQueue("emails")->delay(1000));
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
