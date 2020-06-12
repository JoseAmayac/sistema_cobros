<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    // Enviar una petición
    public function makeRequest($method, $requestUrl, $queyParams = [], 
            $formParams = [], $headers = [], $isJson = false)
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        if(method_exists($this, 'resolveAuthorization'))
        {
            $this->resolveAuthorization($queyParams, $formParams, $headers);
        }

        $response =  $client->request($method, $requestUrl, [
            $isJson ? 'json' : 'form_params' => $formParams,
            'headers' => $headers,
            'query' => $queyParams 
        ]);

        $response = $response->getBody()->getContents();

        if(method_exists($this, 'resolveAuthorization'))
        {
            $response = $this->decodeResponse($response);
        }

        return $response;
    }
}
