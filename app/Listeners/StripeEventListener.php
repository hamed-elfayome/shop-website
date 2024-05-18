<?php

namespace App\Listeners;

use App\Actions\Shopapp\CheckoutSessionCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    public function handle(WebhookReceived $event): void
    {
        if($event->payload['type'] === 'checkout.session.completed') {
            (new CheckoutSessionCompleted())->handle($event->payload['data']['object']['id']);
        }
    }
}
