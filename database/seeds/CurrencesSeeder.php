<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            'usd',
            'eur',
            'gbp'
        ];

        foreach($currencies as $currency)
        {
            Currency::create([
                'iso' => $currency
            ]);
        }

    }
}
