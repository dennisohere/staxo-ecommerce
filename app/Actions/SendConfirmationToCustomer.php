<?php

namespace App\Actions;

use App\Events\OrderWasSuccessful;
use App\Notifications\OrderCompleted;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsListener;

class SendConfirmationToCustomer
{
    use AsListener;

    public function handle(OrderWasSuccessful $event)
    {
        $event->order->customer->notify(new OrderCompleted($event->order));
    }
}
