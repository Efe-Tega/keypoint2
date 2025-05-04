<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MonnifyService
{
    protected $baseUrl;
    protected $apiKey;
    protected $secretKey;
    protected $contractCode;


    public function __construct()
    {
        $this->baseUrl = config('services.monnify.base_url');
        $this->apiKey = config('services.monnify.api_key');
        $this->secretKey = config('services.monnify.secret_key');
        $this->contractCode = config('services.monnify.contract_code');
    }

    public function authenticate()
    {
        $response = Http::withBasicAuth($this->apiKey, $this->secretKey)
            ->post("{$this->baseUrl}/api/v1/auth/login");

        return $response->json()['responseBody']['accessToken'] ?? null;
    }

    public function initializeTransaction($paymentData)
    {
        $token  = $this->authenticate();

        $response = Http::withToken($token)->post("{$this->baseUrl}/api/v1/merchant/transactions/init-transaction", $paymentData);

        return $response->json();
    }

    public function verifyTransaction($reference)
    {
        $token = $this->authenticate();

        $response = Http::withToken($token)
            ->get("{$this->baseUrl}/api/v1/merchant/transactions/query", [
                'paymentReference' => $reference
            ]);

        return $response->json();
    }
}
