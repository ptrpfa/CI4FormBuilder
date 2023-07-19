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
function validate($data, $rules, $encrypt = true)
{
    // Initialise service instances
    $validation = \Config\Services::validation();
    $encrypter = \Config\Services::encrypter();

    // Loop through and set each rule
    foreach ($rules as $field => $rule) {
        $validation->setRule($field, ucwords(str_replace('_', ' ', $field)), $rule);
    }

    // print_r($data);

    // Check rules against data
    if (!$validation->run($data)) {
        $errors = $validation->getErrors();

        $errorFields = [];
        foreach ($errors as $field => $error) {
            // Check if the field exists in the original $data array
            if (array_key_exists($field, $data)) {
                $errorFields[] = $field;
            }
        }
        
        if (empty($errorFields)) {
        } else {
            return [
                'success' => false,
                'errors' => $errorFields
            ];
        }
    }

    // Sanitize each field in the data array
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            // If the value is an array, sanitize each element
            $sanitizedArray = [];
            foreach ($value as $index => $element) {
                $sanitizedElement = sanitizeInput($element);
                $sanitizedArray[$index] = $sanitizedElement;
            }
            // Update the data array with the sanitized array
            $data[$key] = $sanitizedArray;
        } else {
            // For non-array values, sanitize as before
            $sanitizedInput = sanitizeInput($value);
            // Update the data array with the sanitized value
            $data[$key] = $sanitizedInput;
        }
    }

    // Check whether to encrypt data or not
    if ($encrypt) {
        foreach ($data as $key => $value) {
            $ciphertext = trim($value);
            $encryptedtext = $encrypter->encrypt($ciphertext);
            $data[$key] = $encryptedtext;
        }
    }

    // Return validated and encrypted data
    return [
        'success' => true,
        'data' => $data
    ];
}


// Function to sanitize input
function sanitizeInput($input)
{
    // Trim whitespace from the input
    $sanitizedInput = trim($input);
    // Remove HTML tags from the input
    $sanitizedInput = strip_tags($sanitizedInput);
    // Sanitize special characters
    $sanitizedInput = htmlspecialchars($sanitizedInput, ENT_QUOTES, 'UTF-8');
    // Return the sanitized input
    return $sanitizedInput;
}

// Function to serialize data
function serializeData($data) {
    return serialize($data);
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