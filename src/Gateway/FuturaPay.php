<?php

namespace Futurapay\Sdk\Gateway;

use Futurapay\Sdk\Contracts\GatewayInterface;
use Futurapay\Sdk\Enums\PaymentURL;
use Futurapay\Sdk\Utils\Encryptions;

class FuturaPay implements GatewayInterface
{
    // Implement the methods required by the GatewayInterface

    public function __construct(
        private string $merchantKey,
        private string $apiKey,
        private string|int $siteId
    ) {}

    public function initialize(array $paymentPayload)
    {
        if (count((array)$paymentPayload) <= 0) {
            echo "Your payload is empty Palyload must be an array.";
            exit;
        }
        $paymentPayload['merchant_key'] = $this->merchantKey;
        $paymentPayload['api_key'] = $this->apiKey;
        $paymentPayload['site_id'] = $this->siteId;
        $encryptedPayload = Encryptions::make($this->merchantKey, $this->apiKey, $this->siteId, (array)$paymentPayload);
       
        $queryString = http_build_query($encryptedPayload);

        header("Location: " . PaymentURL::LIVE_URL->value . $queryString);
    }


    public function getPayment(string $hashtoken) {
        return true;
    }

    public function getStatus(string $hashtoken) {}
}
