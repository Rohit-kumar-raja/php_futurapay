<?php

namespace Futurapay\Sdk\Gateway;

use Futurapay\Sdk\Contracts\GatewayInterface;
use Futurapay\Sdk\Enums\PaymentURL;
use Futurapay\Sdk\Utils\Encryptions;

class FuturaPay implements GatewayInterface
{
    // Implement the methods required by the GatewayInterface

    private string $environment = "sandbox";
    private string $paymentType="deposit";

    public function __construct(
        private string $merchantKey,
        private string $apiKey,
        private string|int $siteId,
    ) {}


    public function setEnv(string $environment)
    {
        $this->environment = $environment;
    }
    public function setType(string $paymentType)
    {
        $this->paymentType = $paymentType;
    }


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
        $paymentURl = $this->getPaymentUrl();

        $queryString = http_build_query($encryptedPayload);

            header("Location: " . $paymentURl . $queryString);
       
    }

    function getPaymentUrl() {
        $url = '';
    
        if ($this->environment == "live") {
            $url = PaymentURL::LIVE_DEPOSIT_URL->value;
            if ($this->paymentType == "withdraw") {
                $url = PaymentURL::LIVE_WITHDRAWAL_URL->value;
            }
        } else {
            $url = PaymentURL::STAGE_DEPOSIT_URL->value;
            if ($this->paymentType == "withdraw") {
                $url = PaymentURL::STAGE_WITHDRAWAL_URL->value;
            }
        }
    
        return $url;
    }
    


    public function getPayment(string $hashtoken)
    {
        return true;
    }

    public function getStatus(string $hashtoken) {}
}
