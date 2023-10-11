<?php

namespace App\Http\Controllers\Api\GRecaptcha;

use App\Http\Controllers\Controller;
use App\Services\GRecaptcha\GRecaptchaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GRecaptchaController extends Controller
{
    public function __construct(
        protected GRecaptchaService $recaptcha
    ) {
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify(Request $request): Response
    {
        $data = $request->validate([
            'response' => 'required|string',
        ]);

        return $this->recaptcha->verify($data);
    }
}
