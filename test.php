<?php

require "vendor/autoload.php";

use Futurapay\Sdk\Gateway\FuturaPay;


$array = array(
    "currency" => "EUR",
    "amount" => "500",
    "customer_transaction_id" => rand(10000000, 99999999),
    "country_code" => "DE",
    "customer_first_name" => "Tanmoy",
    "customer_last_name" => "Sharma",
    "customer_phone" => "8617821668",
    "customer_email" => "tanmoy.biswas.techexactly@gmail.com",

);

$merchant_key = "TMXXXXXXXXXXXXXXXX";
$site_id = "831206409";
$api_key = "apiKey66a33e22470a2";
$env= "live";




$gateway = new FuturaPay($merchant_key, $api_key, $site_id,$env);
$gateway->initialize($array);
