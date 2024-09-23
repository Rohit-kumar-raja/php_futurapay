<?php

namespace Futurapay\Sdk\Gateway;

use Futurapay\Sdk\Contracts\GatewayInterface;
use Futurapay\Sdk\Enums\PaymentURL;


class FuturaPay implements GatewayInterface
{
    // Implement the methods required by the GatewayInterface

    public function __construct(
        private string $merchantKey,
        private string $apiKey,
        private string $siteId
    ) {}

    public function initialize(array $paymentPayload) {
        $paymentPayload['merchant_key']=$this->merchantKey;
        $paymentPayload['api_key']=$this->apiKey;
        $paymentPayload['site_id']=$this->siteId;
        $queryString = http_build_query($paymentPayload);

        header("Location: " . PaymentURL::LIVE_URL->value . $queryString);
        exit();

    }


    public function getPayment(string $hashtoken) {}

    public function getStatus(string $hashtoken) {}
}
