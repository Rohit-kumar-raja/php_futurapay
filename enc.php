<?php
function decryptData($encrypted_data, $key) {
    // Base64 decode the encrypted data
    $data = base64_decode($encrypted_data);
    
    // Extract the IV (first 16 bytes) and the encrypted message
    $iv = substr($data, 0, 16);
    $encrypted_bytes = substr($data, 16);
    
    // Decrypt using AES-256-CBC with the given key and IV
    $decrypted = openssl_decrypt($encrypted_bytes, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    
    // Remove padding if necessary
    $padding_length = ord(substr($decrypted, -1));
    return substr($decrypted, 0, -$padding_length);
}

// Example usage
$encrypted_data = "JS2W9X0eHUKi1iQycBRnIMdokpO1f5AZUPSXHJU8edo=";  // Replace with your encrypted data
$key = "your_secret_key_32_bytes";                    // Must be exactly 32 bytes for AES-256
$decrypted_text = decryptData($encrypted_data, $key);
echo $decrypted_text;
?>
