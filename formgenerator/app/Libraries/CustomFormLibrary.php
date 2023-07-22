<?php

namespace App\Libraries;

// Imports
use App\Models\FormModel;
use App\Models\FormResponseModel;
use mikehaertl\wkhtmlto\Pdf;

class CustomFormLibrary
{

    // Class variables
    private $formModel;
    private $formResponseModel;

    // Class constructor
    public function __construct()
    {
        // Create an instance of both form template and response models
        $this->formModel = new FormModel();
        $this->formResponseModel = new FormResponseModel();
    }

    /* Form Template CRUD Functions */
    // Function to get a specifed form template from the database
    public function getForm($formID = null, $structure_only = true)
    {
        /* 
            Arguments:
            $formID: Default value of null will fetch all form templates from the database. If a form ID is specified, fetch the specified form template from the database.
            $structure_only: Default value of true will only return the unserialised structure of forms. If false, return all form template data.

            This function will automatically generate and append a CSRF token to each form fetched from the database
        */
        try {
            // Retrieve form template(s) from the database based on the arguments passed 
            if ($formID != null) {
                // Generate the CSRF token and hash
                $csrfToken = csrf_token();
                $csrfHash = csrf_hash();
                // Get specified form
                $formStructure =  $this->formModel->get_form($formID, $structure_only);
                // Append a CSRF token to form fetched from the database
                if ($structure_only === true) {
                    $formStructure = preg_replace('/<\/form>/', '<input type="hidden" name="' . $csrfToken . '" value="' . $csrfHash . '"></form>', $formStructure);
                } else {
                    $formStructure['Structure'] = preg_replace('/<\/form>/', '<input type="hidden" name="' . $csrfToken . '" value="' . $csrfHash . '"></form>', $formStructure['Structure']);
                }
            } else {
                // Get all form templates from the database
                $formStructure =  $this->formModel->get_form($formID, $structure_only);

                // Iterate through each form
                foreach ($formStructure as $form) {
                    // Generate the CSRF token and hash
                    $csrfToken = csrf_token();
                    $csrfHash = csrf_hash();
                    // Append a CSRF token to each form fetched from the database
                    if ($structure_only === true) {
                        $form = preg_replace('/<\/form>/', '<input type="hidden" name="' . $csrfToken . '" value="' . $csrfHash . '"></form>', $form);
                    } else {
                        $form['Structure'] = preg_replace('/<\/form>/', '<input type="hidden" name="' . $csrfToken . '" value="' . $csrfHash . '"></form>', $form['Structure']);
                    }
                }
            }
            // Return form
            return $formStructure;
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form retrieval failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to create a new form template and insert it into the database
    public function createForm($data)
    {
        /* 
            Arguments:
            $data: Associative array of form template column values
            Format:
                $data  = [
                    'Name' => 'Form template name',
                    'Version' => 1.0,
                    'Description' => 'Sample format',
                    'Structure' => Serialised HTML form structure
                    'Status' => 1
                    'Rules' => Serialised parameter rules
                ];
        */
        // Initialise form structure variables
        $formStructure = '';
        $fields = $data['Structure'];
        if (isset($data['Rules'])) {
            $data['Rules'] = serialize($data['Rules']);
        }
        foreach ($fields as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key => $newValue) {
                    $formStructure .= $newValue;
                }
            } else {
                $formStructure .= $value;
            }
        }

        // Serialise the form structure
        $data['Structure'] = serialize($formStructure);

        // Send to model to save
        try {
            return $this->formModel->create_form($data);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form insertion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to update a specified form template in the database
    public function updateForm($data)
    {
        /* 
            Arguments:
            $data: Associative array of form template column values
            Format:
                $data  = [
                    'Name' => 'Form template name',
                    'Status' => 1
                    'Version' => 1.0,
                    'Description' => 'Sample format',
                    'Structure' =>  HTML form structure
                ];
        */
        // Initialise form structure variables
        $formStructure = '';
        $fields = $data['Structure'];
        if (isset($data['Rules'])) {
            $data['Rules'] = serialize($data['Rules']);
        }

        foreach ($fields as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key => $newValue) {
                    $formStructure .= $newValue;
                }
            } else {
                $formStructure .= $value;
            }
        }
        // Serialise the form structure
        $data['Structure'] = serialize($formStructure);
        // Send to model to update
        try {
            $this->formModel->update_form($data['FormID'], $data);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form update failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to deactivate a specified form in the database
    public function deactivateForm($formID)
    {
        /* 
            Arguments:
            $formID: Form template to be deleted
        */
        try {
            // Delete the specified form template 
            $this->formModel->update_form_status($formID);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form deletion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to activate a specified form in the database
    public function activateForm($formID)
    {
        /* 
            Arguments:
            $formID: Form template to be activated
        */
        try {
            // Activate the specified form template 
            $this->formModel->update_form_status($formID, 1);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form activation failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to update the active status of all versions of a specified form template in the database
    public function updateAllFormStatus($formID, $new_status)
    {
        /* 
            Arguments:
            $formID: Form template to be deleted
        */
        try {
            // Delete all versions of the specified form template 
            $this->formModel->update_all_form_status($formID, $new_status);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form deletions failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    /* User Form Response CRUD Functions */
    // Function to get all data from the database
    public function getAllData()
    {
        // Return results
        try {
            return $this->formResponseModel->get_all_data();
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Data retrieval failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to get the form data for a given form response
    public function getAssociatedFormData($responseID, $structure_only = true)
    {

        $responseData = $this->getResponseFormData($responseID);

        $formID = $responseData['FormID'];

        try {
            // Retrieve form template(s) from the database based on the arguments passed 
            return $this->formModel->get_form($formID, $structure_only);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form retrieval failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to delete a specified form in the database
    public function deleteResponseFormData($responseID)
    {
        /* 
            Arguments:
            $responseID: Form to be deleted
        */
        try {
            // Delete the specified form template 
            $this->formResponseModel->delete_form_response($responseID);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form response deletion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to get a given form response from the database
    public function getResponseFormData($responseID)
    {
        try {
            return $this->formResponseModel->get_form_response($responseID);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form response fetching failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to return a populated HTML dump for a completed form response
    public function placeFormData($responseID, $response, $view)
    {
        // create new DOM document object
        $dom = new \DOMDocument;
        // ignore malformed html and load html view
        @$dom->loadHTML($view);

        // create new xpath object
        $xpath = new \DOMXPath($dom);

        // find the form action element
        $formElement = $xpath->query("//form")->item(0);
        if ($formElement) {
            // set the form action element to update
            $formElement->setAttribute('action', '/users/update/' . $responseID);
        }

        // for each user response data
        foreach ($response as $key => $value) {
            // use the query object to query the html to find the elements with name = key
            $elements = $xpath->query("//*[@name='$key']");

            // check if there are elements found
            if (!is_null($elements)) {
                // iterate through each element found with the name = key
                foreach ($elements as $element) {
                    /*
                        Set value according the html input types
                        html input
                        html textarea
                        html select
                    */

                    if ($element->tagName === 'input') {
                        if ($element->getAttribute('type') === 'radio') {
                            // Check if the radio button value matches the response value
                            if ($element->getAttribute('value') === $value) {
                                $element->setAttribute('checked', 'checked');
                            }
                        } else if ($element->getAttribute('type') === 'checkbox') {
                            if ($element->getAttribute('value') === $value) {
                                $element->setAttribute('checked', 'checked');
                            }
                        }
                        else {
                            $element->setAttribute('value', $value);
                        }
                    } else if ($element->tagName === 'select') {
                        // Set the selected option based on the response value
                        $options = $element->getElementsByTagName('option');
                        foreach ($options as $option) {
                            if ($option->getAttribute('value') === $value) {
                                $option->setAttribute('selected', 'selected');
                            } else {
                                $option->removeAttribute('selected');
                            }
                        }
                    } else if ($element->tagName === 'textarea') {
                        $element->nodeValue = $value;
                    }
                }
            }
        }

        // Save the edited html structure back to $view
        $view = $dom->saveHTML();

        // return the view
        return $view;
    }

    // Function to add a form response
    public function submitFormData($formID, $user, $formData)
    {
        /* 
            Arguments:
            $formID: Form to be submitted
            $user: User to be submitted 
            $formData: User response to be submitted 
        */
        try {
            // Submit the specified form response  
            $this->formResponseModel->create_form_response($formID, $user, $formData);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form response insertion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to update a form response
    public function submitUpdatedFormData($responseID, $formData)
    {

        /* 
            Arguments:
            $formID: Form to be submitted
            $user: User to be submitted 
            $formData: User response to be submitted 
        */
        try {
            // Submit the specified form response  
            $this->formResponseModel->update_form_response($responseID, $formData);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form response update failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    /* Form Rules Functions */
    // Function to automatically generate rules from a given HTML form structure
    public function generateRulesFromHTML($html, $ignore = true)
    {

        /*
        Passes in the html structure from the controller
        Allows rules to be generated based on html structure, html input type
        $ignore set to true to ignore malformed html structures, will attempt to generate a ruleset despite bugged html structure
        Pass in $ignore = false to flag an exception if the html structure is malformed
        */

        $dom = new \DOMDocument;

        $rules = [];

        if ($ignore === true) {
            @$dom->loadHTML($html);
        } else {
            try {
                $dom->loadHTML($html);
            } catch (\Exception $e) {
                // Log the error or display a user-friendly error message
                log_message('error', 'Rule generation failed: ' . $e->getMessage());
                throw $e;
            }
        }

        // find all input elements
        $inputs = $dom->getElementsByTagName('input');
        $textareas = $dom->getElementsByTagName('textarea');
        $selects = $dom->getElementsByTagName('select');

        // check for any input elements
        if (!is_null($inputs)) {
            // iterate through each element
            foreach ($inputs as $input) {

                // get the name attribute 
                $name = $input->getAttribute('name');

                if ($name === 'csrf_token_name' || $name === 'csrf_test_name' || strpos($name, 'user_file') !== false) {
                    continue;
                }

                // get the type attribute
                $type = $input->getAttribute('type');

                // set rule based on input type
                switch ($type) {
                    case 'checkbox':
                        $rules[$name] = 'required';
                        break;
                    case 'radio':
                        $rules[$name] = 'required';
                        break;
                    case 'date':
                        $rules[$name] = 'required';
                        break;
                    case 'number':
                        $rules[$name] = 'required|integer';
                        break;
                    case 'text':
                        $rules[$name] = 'required|regex_match[/^[a-zA-Z0-9_ ]+$/]';
                        // $rules[$name] = 'required|regex_match[/^[a-zA-Z0-9_\s\-!@#$%^&*(),.?":{}|<>\]+$/]';
                        break;
                    default:
                        $rules[$name] = 'required|regex_match[/^[a-zA-Z0-9_ ]+$/]';
                        // $rules[$name] = 'required|regex_match[/^[a-zA-Z0-9_\s\-!@#$%^&*(),.?":{}|<>\]+$/]';
                        break;
                }
            }
        }

        // check for any textarea elements
        if (!is_null($textareas)) {
            // iterate through each element
            foreach ($textareas as $textarea) {

                $name = $textarea->getAttribute('name');

                $rules[$name] = 'required|max_length[500]|min_length[3]|regex_match[/^[a-zA-Z0-9_ ]+$/]';
            }
        }

        // check for any select elements
        if (!is_null($selects)) {
            // iterate through each element
            foreach ($selects as $select) {

                $name = $select->getAttribute('name');

                $rules[$name] = 'required';
            }
        }

        return $rules;
    }

    // Function to generate a basic set of rules from $post data
    public function generateRulesFromPOST($post)
    {

        // Initialize $rules
        $rules = [];

        // Get keys from $post data
        $keys = array_keys($post);

        // Assign each key as a key in rules, assign each key with a standard set of rules
        foreach ($keys as $key) {
            $rules[$key] = 'required|max_length[500]|min_length[3]|regex_match[/^[a-zA-Z0-9_ ]+$/]';
        }

        return $rules;
    }

    // Function to validate data
    public function validateData($post, $rules, $encrpyt)
    {
        /* 
            Arguments:
            $post: filtered response data 
            $rules: rules for validation 
            $encrpyt: encrpyt or not (true/false) 
        */
        helper(['form', 'validation_helper']);
        return validate($post, $rules, $encrpyt);
    }

    // Function to validate uploaded files
    public function validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes)
    {
        /* 
            Arguments:
            $post: filtered response data 
            $rules: rules for validation 
            $encrpyt: encrpyt or not (true/false) 
        */
        helper(['form', 'validation_helper']);
        return validateUploadedFiles($current_file, $allowedMaxSize, $allowedMimeTypes);
    }

    /* Utility Functions */
    // Function to automatically create a set of HTML attributes
    private function attributes_creator($attributes)
    {
        $attributeString = '';

        if (is_array($attributes)) {
            foreach ($attributes as $key => $val) {
                $attributeString .= $key . '="' . $val . '" ';
            }
        } else {
            $attributeString = $attributes;
        }

        // Trim any trailing whitespace
        $attributeString = trim($attributeString);

        return $attributeString;
    }

    // Function to export a form into PDF
    public function export_to_pdf($formData)
    {
        $pdf = new Pdf();
        $html = '<!DOCTYPE html>
		<html>
		  <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
		  </head>
		  <body>
			<div class="container">
                ' . $formData . '
			</div>
		  </body>
		</html>';

        $os = PHP_OS;

        // Set the path to the wkhtmltopdf binary based on the operating system
        if (stripos($os, 'Win') === 0) {
            $pdf->binary = FCPATH . 'bin/wkhtmltopdf.exe';
        } elseif (stripos($os, 'Darwin') === 0) {
            $pdf->binary = FCPATH . 'bin/wkhtmltopdf_mac_arm';
        } elseif (stripos($os, 'Linux') === 0) {
            $pdf->binary = FCPATH . 'bin/wkhtmltopdf';
        } else {
            // Unsupported operating system
            die('Unsupported operating system.');
        }

        $pdf->addPage($html);

        $pdfContent = $pdf->toString();

        return $pdfContent;
    }

    // Function to unpack and get a HTML dump of a library-formatted form structure
    public function getFormHTML($filename)
    {
        $formStructure = '';
        $fields = $filename;

        foreach ($fields as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key => $newValue) {
                    $formStructure .= $newValue;
                }
            } else {
                $formStructure .= $value;
            }
        }

        return $formStructure;
    }

    /* Functions to create HTML containers */
    // Function to automatically create a new div
    public function new_div($data = array(), $row = '', $span = '', $column = '', $attributes = '')
    {
        $rowClass = is_numeric($row) ? 'row-' . $row : $row;
        $columnClass = ($span ? 'col-' . $span . '-' . $column : ($column ? 'col-md-' . $column : ''));

        $content = implode('', array_values($data));
        $newDIV =  "<div class='$rowClass $columnClass $attributes'>"
            . $content
            . "</div>";

        return $newDIV;
    }

    // Function to automatically create a new unordered list
    public function new_list($data = array(), $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $content = '<ul class="list-group ' . $attributeString . '" >';
        foreach ($data as $item) {
            $content .= '<li class="list-group-item">';
            $content .= $item;
            $content .= '</li>';
        }
        $content .= '</ul>';
        return $content;
    }

    /* Functions to create HTML form elements */

    // Function to automatically create a new form open tag
    public function form_open($action = '', $attributes = '', $method = 'post')
    {
        $attributeString = $this->attributes_creator($attributes);

        $form = '<form action="' . $action . '" method="' . $method . '" ' . $attributeString . '>';


        return $form;
    }

    // Function to automatically create a new form closing tag
    public function form_close()
    {
        return '<div style="text-align: center; padding: 20px 0;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>';
    }

    // Function to automatically create a new form label field
    public function new_label($name = '', $value = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $formLabel = "<label for='" . $name . "' " . $attributeString . ">" . $value . "</label>";
        return $formLabel;
    }

    // Function to automatically create a new text input field
    public function new_input($name = '', $value = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $input = '<input type="text" name="' . $name . '" value="' . $value . '" ' . $attributeString . '>';

        return $input;
    }

    // Function to automatically create a new file upload input field
    public function new_upload_file_input($name = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $input = '<input type="file" name="' . $name . '" ' . $attributeString . '>';

        return $input;
    }

    // Function to automatically create a new textarea input field
    public function new_textarea($name = '', $value = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $textarea = '<textarea name="' . $name . '" value="' . $value . '" ' . $attributeString . '></textarea>';
        return $textarea;
    }

    // Function to automatically create a new radio button input field
    public function new_radio($name = '', $value = '', $attributes = '', $checked = false)
    {
        $attributeString = $this->attributes_creator($attributes);

        $checkedAttribute = $checked ? 'checked' : '';

        $radio = '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $attributeString . ' ' . $checkedAttribute . '>';

        return $radio;
    }

    // Function to automatically create a new checkbox input field
    public function new_checkbox($name = '', $value = '', $attributes = '', $checked = false)
    {
        $attributeString = $this->attributes_creator($attributes);

        $checkedAttribute = $checked ? 'checked' : '';

        $radio = '<input type="checkbox" name="' . $name . '" value="' . $value . '" ' . $attributeString . ' ' . $checkedAttribute . '>';

        return $radio;
    }

    // Function to automatically create a new dropdown menu input field
    function new_dropdown($name = '', $options = array(), $selected = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);


        $dropdown = '<select name="' . $name . '" ' . $attributeString . '>';
        foreach ($options as $value => $display) {
            $selectedAttr = ($value == $selected) ? 'selected' : '';
            $dropdown .= '<option value="' . $value . '" ' . $selectedAttr . '>' . $display . '</option>';
        }
        $dropdown .= '</select>';
        $dropdown .= '<i class="fas fa-caret-down" style="position: absolute; top: 50%; right: 2.5%; transform: translateY(-50%);"></i>';

        return $dropdown;
    }

    // Function to automatically create a new html tag pair
    public function new_html($tag = 'p', $value = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        return '<' . $tag . ' ' . $attributeString . '>' . $value . '</' . $tag . '>';
    }
}
