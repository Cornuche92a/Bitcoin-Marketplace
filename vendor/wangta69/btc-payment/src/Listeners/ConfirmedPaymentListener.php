<?php

namespace App\Listeners;

use Pondol\BtcPayment\Events\ConfirmedPaymentEvent;
use Illuminate\Support\Facades\Log;

class ConfirmedPaymentListener
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
     * @param  ConfirmedPaymentEvent  $event
     * @return void
     */
    public function handle(ConfirmedPaymentEvent $event)
    {
        Log::debug('Confirmed Payment listener: '. $event->confirmedPayment);
        // To Do : Do Something whatever You want
    }
}
