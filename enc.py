from Crypto.Cipher import AES
from Crypto.Random import get_random_bytes
from base64 import b64encode

def encrypt_data(plain_text, key):
    iv = get_random_bytes(16)  # 16-byte IV for AES
    cipher = AES.new(key, AES.MODE_CBC, iv)
    
    # Padding
    padding_length = 16 - len(plain_text) % 16
    padded_text = plain_text + chr(padding_length) * padding_length
    
    encrypted_bytes = cipher.encrypt(padded_text.encode('utf-8'))
    
    # Return base64 encoded IV + encrypted data
    return b64encode(iv + encrypted_bytes).decode('utf-8')

# Example usage
key = b'your_secret_key_32_bytes'  # 32 bytes key
plain_text = "Hello World"
encrypted_text = encrypt_data(plain_text, key)
print(f"Encrypted Text: {encrypted_text}")
