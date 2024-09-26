<?php
// Merchant key (the one you provided)
$merchantKey = '66f2f9f14e481';

// Generate a 32-character key using SHA-256 hashing
$hashedMerchantKey = hash('sha256', $merchantKey, true);
print($hashedMerchantKey);

// Encryption and decryption method
$cipherMethod = 'AES-256-CBC';

// Data to encrypt
$data = "Sensitive data to be encrypted";

// Generate an initialization vector (IV) of the correct length
$ivLength = openssl_cipher_iv_length($cipherMethod);
$iv = openssl_random_pseudo_bytes($ivLength);

// Encrypt the data
$encryptedData = openssl_encrypt($data, $cipherMethod, $hashedMerchantKey, 0, $iv);

// To safely transmit/store the encrypted data, you can encode it in base64
$encryptedDataBase64 = base64_encode($encryptedData);
$ivBase64 = base64_encode($iv);

echo "Encrypted Data: " . $encryptedDataBase64 . "\n";
echo "IV: " . $ivBase64 . "\n";

// ---------------- Decryption ----------------

// Base64 decode the IV and encrypted data before decryption
$iv = base64_decode($ivBase64);
$encryptedData = base64_decode($encryptedDataBase64);

// Decrypt the data
$decryptedData = openssl_decrypt($encryptedData, $cipherMethod, $hashedMerchantKey, 0, $iv);

echo "Decrypted Data: " . $decryptedData . "\n";
?>
