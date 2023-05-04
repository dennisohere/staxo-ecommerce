<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Stripe\StripeClient;

class OrderService
{
    private function initOrder(Product $product, $email): Order
    {
        /** @var Customer $customer */
        $customer = Customer::query()->firstOrCreate(['email' => $email]);

        $order = new Order();
        $order->product_id = $product->id;
        $order->customer_id = $customer->id;
        $order->unit_price = $product->price;
        $order->quantity = 1;
        $order->total = $order->quantity * $product->price;

        $order->save();
        return $order;
    }

    public function placeOrder(Product $product, $email): \Stripe\Checkout\Session
    {
        $order = $this->initOrder($product, $email);

        $stripe = new StripeClient(env('STRIPE_SECRET'));

        return $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => $email,
            'success_url' => route('order.success', ['order' => $order->id]),
            'cancel_url' => url('/'),
        ]);


    }

}
