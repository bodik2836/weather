<?php

namespace App\Services\GRecaptcha;

use GuzzleHttp\Client;
use Illuminate\Http\Response;

class GRecaptchaService extends GRecaptcha
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify(array $data): Response
    {
        $client = new Client();
        $response = $client->request('POST', self::VERIFY_URI, [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'secret' => $this->getSecretKey(),
                'response' => $data['response'],
                'remoteip' => $data['remoteip'] ?? '',
            ]
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode());
    }
}
