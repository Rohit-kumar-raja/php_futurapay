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

        $data = json_encode($payload);
        $encryptedDataBase64 = self::encrypt_data($data, $key);
        return  array(
            "data" => $encryptedDataBase64,
            'key' => base64_encode($api_key)
        );
    }

    public static function encrypt_data($data, $key)
    {
        // Ensure the key is exactly 32 bytes (padding if necessary)
        $key = str_pad($key, 32, "\0");

        // Generate a random 16-byte IV
        $iv = openssl_random_pseudo_bytes(16);

        // Pad the data with PKCS7 padding
        $block_size = 16;
        $pad_length = $block_size - (strlen($data) % $block_size);
        $data .= str_repeat(chr($pad_length), $pad_length);

        // Encrypt the data using AES-256-CBC
        $encrypted_data = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

        // Encode the IV and encrypted data as base64
        $encrypted_data_base64 = base64_encode($iv . $encrypted_data);

        return $encrypted_data_base64;
    }
}
