<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OrderPlaced;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmation
{
    /**
     * Create the event listener.
     */
    public function __construct(OrderPlaced $event)
    {
        Mail::to($event->order->user->email)->send(new \App\Mail\OrderConfirmation($event->order));
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
