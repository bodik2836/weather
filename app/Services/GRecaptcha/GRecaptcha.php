<?php

namespace App\Services\GRecaptcha;

abstract class GRecaptcha
{
    const VERIFY_URI = 'https://www.google.com/recaptcha/api/siteverify';

    private string $secretKey = '';

    public function __construct()
    {
        $this->secretKey = env('RECAPTCHA_SECRET_KEY');
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }
}
