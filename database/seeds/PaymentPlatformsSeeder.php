<?php

use Illuminate\Database\Seeder;
use App\PaymentPlatform;

class PaymentPlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PAYPAL.
        PaymentPlatform::create([
            'name' => 'Paypal',
            'image' => 'img/payment-platforms/paypal.jpg'
        ]);

        // STRIPE
        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'img/payment-platforms/stripe.jpg'
        ]);

    }
}
