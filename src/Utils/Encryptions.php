<?php

namespace Futurapay\Sdk\Utils;

class Encryptions
{
    // Define the properties and methods for the Payment model

    public static function make(
        string $merchant_key,
        string $api_key,
        string $site_id,
        array $payload
    ) {
        $key = md5($merchant_key . $api_key . $site_id);

        // Generate a 32-character key using SHA-256 hashing
        // $hashedMerchantKey = hash('sha256', $key, true);
  
        // Encryption and decryption method
        $cipherMethod = 'AES-256-CBC';

        // Data to encrypt
        $data = json_encode($payload);

        // Generate an initialization vector (IV) of the correct length
        $ivLength = openssl_cipher_iv_length($cipherMethod);
        $iv = openssl_random_pseudo_bytes($ivLength);

        // Encrypt the data
        $encryptedData = openssl_encrypt($data, $cipherMethod, $key, 0, $iv);

        // To safely transmit/store the encrypted data, you can encode it in base64
        $encryptedDataBase64 = base64_encode($encryptedData);
        $ivBase64 = base64_encode($iv);
        return  array(
            "data" => $encryptedDataBase64,
            "iv" => $ivBase64,
            'key' => base64_encode($api_key)
        );
    }
}
