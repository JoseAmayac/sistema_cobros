<?php

namespace App\Http\Controllers\api;

use App\Services\PayPalService;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
        $this->middleware('jwt.verify');
    }

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

        

        $user = User::where('id',Auth::user()->id)->first();
        $user->state = 1;
        $user->update();


        return response()->json([
            'user' => $user,
            $response
        ]);
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
