<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
class PayPalService
{
    // use ConsumesExternalServices;
// 
    // protected $baseUri;
// 
    // protected $clientId;
// 
    // protected $clientSecret;
// 
    // public function __construct()
    // {
        // $this->baseUri = config('services.paypal.base_uri');
        // $this->clientId = config('services.paypal.client_id');
        // $this->clientSecret = config('services.paypal.client_secret');
    // }
// 
    // public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    // {
        // $headers['Content-Type'] = 'application/json';
        // $headers['Authorization'] = $this->resolveAccessToken();
    // }
// 
    // public function decodeResponse($response)
    // {
        // return json_decode($response);
    // }
// 
    // public function resolveAccessToken()
    // {
        // $credentials = base64_encode($this->clientId . ":" . $this->clientSecret);
        // echo($credentials);
        // var_dump($credentials);
// 
        // return "Bearer {$credentials}";
    // }

    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }


    public static function environment()
    {
        $clientId = 'AUVGs84aBZSgSP-OZcavB0ln3vQJQKb654NYB8eHJsXcCF0DVkvA9s9YMhDSWCiOW-BQ-7Go62V0Rp7R';
        $clientSecret = 'EE8gTkz31MYC0lqWTHSioGaNEcZGmsc8Rii87RujXm-u_j--IXRXwkRMXPYlZ3ApHks6sCB98kVg8MEh';
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
