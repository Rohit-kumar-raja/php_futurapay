<?php

namespace Futurapay\Sdk\Contracts;


interface GatewayInterface
{
    /**
     * Initialize a payment.
     *
     * @param  Payment  $payment
     * @return mixed
     */
    public function initialize(array $payment);

    /**
     * Process a payment.
     *
     * @param  Payment  $payment
     * @return mixed
     */

    public function getStatus(string $hashtoken);


    public function getPayment(string $hashtoken);
  
}