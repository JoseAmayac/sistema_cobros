<?php

namespace App\Http\Controllers\api;

use App\Services\PayPalService;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createOrder(){
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody();

        $client = PayPalService::client();
        $response = $client->execute($request);

        return response()->json($response) ;
    }

    public function authorizeOrder($orderId){
        $request = new OrdersCaptureRequest($orderId);

        $client = PayPalService::client();
        $response = $client->execute($request);

        return response()->json($response);
    }



    private static function buildRequestBody()
    {
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => 'https://example.com/return',
                    'cancel_url' => 'https://example.com/cancel'
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => '220.00'
                                )
                        )
                )
        );
    }
}
