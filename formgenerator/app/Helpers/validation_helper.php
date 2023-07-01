<?php
//Helper function to conduct validation, sanization and encryption
//Data to be pass into paramters are both associate arrays
// $_POST = [
//     'name' => $post['name'],
//     'message' => $post['message']
// ];

// $rules = [
//     'name' => 'required|max_length[255]|min_length[3]|regex_match[/^[a-zA-Z]+$/]',
//     'message'  => 'required|max_length[5000]|min_length[10]',
// ];
// For encyrption service to work ensure that encryption.key under .env file is filled up
// You can find the key under .env_prod
// You can create a new key with \CodeIgniter\Encryption\Encryption::createKey();
// Use hex2bin: and bin2hex: to switch switch between readable and non readable keys
// For use case, check out Survey.php create() function

// Function to validate and encrypt data
function validate($data, $rules, $encrypt=true){
    // Initialise service instances
    $validation = \Config\Services::validation();
    $encrypter = \Config\Services::encrypter();
    // Loop through and set each rule
    foreach ($rules as $field => $rule) {
        $validation->setRule($field, ucwords(str_replace('_', ' ', $field)), $rule);
    }
    // Check rules against data
    if (! $validation->run($data)) {
        return false;
    }
    // Check whether to encrypt data or not
    if($encrypt) {
        foreach ($data as $key => $value) {
            $ciphertext = trim($value);
            $encryptedtext = $encrypter->encrypt($ciphertext);
            $data[$key] = $encryptedtext;
        }
    }
    // Return validated and encrypted data
    return $data;
}

// Function to decrypt data
function decrypt($data) {
    // Initialise service instance
    $encrypter = \Config\Services::encrypter();
    // Loop through each data to decrypt it
    foreach($data as $key => $value) {
        $decryptedtext = $encrypter->decrypt($value);
        $data[$key] = $decryptedtext;
    }
    // Return decrypted data
    return $data;
}