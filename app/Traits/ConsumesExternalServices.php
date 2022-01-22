<?php

namespace App\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalServices {

    public function performRequest($method, $requestUrl, $form_params = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->base_uri
        ]);

        $response = $client->request($method, $requestUrl, [
            'form_params' => $form_params,
            'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }
}
