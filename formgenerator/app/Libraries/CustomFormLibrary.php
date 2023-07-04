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

    /* Class Functions */

    /* General Functions */
    // Function to get all data from the database
    public function getAllData() 
    {
        // Return results
        try{
            return $this->formResponseModel->getAllData();
        }catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Data retrieval failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    /* Form Template CRUD */
    
    // Function to get a specifed form template from the database
    public function getForm($formID = null, $structure_only = true)
    {   
        /* 
            Arguments:
            $formID: Default value of null will fetch all form templates from the database. If a form ID is specified, fetch the specified form template from the database.
            $structure_only: Default value of true will only return the unserialised structure of forms. If false, return all form template data.
        */
        try {
            // Retrieve form template(s) from the database based on the arguments passed 
            return $this->formModel->get_form($formID, $structure_only);
        }
        catch(\Exception $e) {
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
                    'Status' => 1
                    'Version' => 1.0,
                    'Description' => 'Sample format',
                    'Structure' =>  HTML form structure
                ];
        */
        // Initialise form structure variables
        $formStructure = '';
        $fields = $data['Structure'];

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
        try{
            return $this->formModel->create_form($data);
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form insertion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to create a new form template from a HTML dump and insert it into the database
    public function createFormDump($data)
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
        
        try{
            // Serialise the form structure (HTML dump)
            $data['Structure'] = serialize($data['Structure']);
            // Create new form template
            return $this->formModel->create_form($data);
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form insertion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    public function test($data){ //For Ryan to buckle boots, dun touch
        $formStructure = '';

        if (isset($data['Structure'])) {
            $fields = $data['Structure'];
        }else{
            $fields = $data;
        }

        foreach ($fields as $key => $value) {
            if (is_array($value)) {
                $formStructure .= $this->test($value);
            } else {
                $formStructure .= $value;
            }
        }
        
        //Set the new Structure
        return $formStructure; //<-- This shit is the form html
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
        try{
            $this->formModel->update_form($data['FormID'], $data);
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form update failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to update a form template with a HTML dump 
    public function updateFormDump($data)
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
        
        try{
            // Serialise the form structure (HTML dump)
            $data['Structure'] = serialize($data['Structure']);
            // Update form template
            $this->formModel->update_form($data['FormID'], $data);
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form update failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to delete a specified form in the database
    public function deleteForm($formID) {
        /* 
            Arguments:
            $formID: Form template to be deleted
        */
        try {
            // Delete the specified form template 
            $this->formModel->update_form_status($formID);
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form deletion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to activate a specified form in the database
    public function activateForm($formID) {
        /* 
            Arguments:
            $formID: Form template to be activated
        */
        try {
            // Activate the specified form template 
            $this->formModel->update_form_status($formID, 1);
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form activation failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function to delete all versions of a specified form template in the database
    public function deleteAllForm($formID) {
        /* 
            Arguments:
            $formID: Form template to be deleted
        */
        try {
            // Delete all versions of the specified form template 
            $this->formModel->delete_all_forms($formID);
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form deletions failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    /* User Response CRUD */

    // Function to delete a specified form in the database
    public function deleteResponseFormData($responseID) {
        /* 
            Arguments:
            $responseID: Form to be deleted
        */
        try {
            // Delete the specified form template 
            $this->formResponseModel->deleteFormData($responseID);
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form deletion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    public function getResponseFormData($responseID) {
        try {
            return $this->formResponseModel->retrieveFormData($responseID);
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form deletion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    public function placeFormData($response, $view)
    {
        $dom = new \DOMDocument;
        $dom->loadHTML($view);
    
        foreach ($response as $key => $value) {
            $xpath = new \DOMXPath($dom);
            $elements = $xpath->query("//*[@name='$key']");
    
            if (!is_null($elements)) {
                foreach ($elements as $element) {
                    if ($element->tagName === 'input') {
                        if ($element->getAttribute('type') === 'radio') {
                            // Check if the radio button value matches the response value
                            if ($element->getAttribute('value') === $value) {
                                $element->setAttribute('checked', 'checked');
                            }
                        } else {
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
    
        $view = $dom->saveHTML();
    
        return $view;
    }

    // public function placeFormData($response, $view)
    // {
    //     $dom = new \DOMDocument;
	// 	$dom->loadHTML($view);
		
	// 	foreach ($response as $key => $value) {
	// 		$xpath = new \DOMXPath($dom);
	// 		$elements = $xpath->query("//*[@name='$key']");
		
	// 		if (!is_null($elements)) {
	// 			foreach ($elements as $element) {
	// 				if($element->tagName === 'input' || $element->tagName === 'select') {
	// 					$element->setAttribute('value', $value);
	// 				} else if($element->tagName === 'textarea') {
	// 					$element->nodeValue = $value;
	// 				}
	// 			}
	// 		}
	// 	}

    //     $view = $dom->saveHTML();
    
    //     return $view;
    // }

    public function submitFormData($formID, $user, $formData) {
        /* 
            Arguments:
            $formID: Form to be submitted
            $user: User to be submitted 
            $formData: User response to be submitted 
        */
        try {
            // Submit the specified form response  
            $this->formResponseModel->insertFormData($formID, $user, $formData);
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form insertion failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    public function validateData($post, $rules, $encrpyt){
        /* 
            Arguments:
            $post: filtered response data 
            $rules: rules for validation 
            $encrpyt: encrpyt or not (true/false) 
        */
        helper(['form', 'validation_helper']);
        return validate($post, $rules, $encrpyt);
    }

    /* Form HTML Container Creation */

    public function new_div($data= array(), $row='', $span='', $column='', $attributes='')
    {
        $rowClass = is_numeric($row) ? 'row-' . $row : $row;
        $columnClass = ($span ? 'col-' . $span . '-' . $column : ($column ? 'col-md-' . $column : ''));
   
        $content = implode('', array_values($data));
        $newDIV =  "<div class='$rowClass $columnClass $attributes'>"
                    . $content
                    . "</div>";

        return $newDIV;
    }
    public function new_list($data = array(), $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $content = '<ul class="list-group ' . $attributeString . '" >';
        foreach($data as $item){
            $content .= '<li class="list-group-item">';
            $content .= $item;
            $content .= '</li>';
        }
        $content .= '</ul>';
        return $content;
    }

    /* Form HTML Tags Creation */

    public function form_open($action = '', $attributes = '')
    {
        $attributeString = $this->attributes_creator($attributes);

        $form = '<form action="' . $action . '" method="post" ' . $attributeString .  '>';
        return $form;
    }

    public function form_close()
    {
        return '<div style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>';
    }

    public function new_label($name='', $value='', $attributes='')
    {
        $attributeString = $this->attributes_creator($attributes);

        $formLabel = "<label for='" . $name . "' " . $attributeString . ">" . $value . "</label>";
        return $formLabel;
    }

    public function new_input($name='', $value='', $attributes='')
    {
        $attributeString = $this->attributes_creator($attributes);

        $input = '<input type="text" name="' . $name . '" value="' . $value . '" ' . $attributeString . '>';
        
        return $input; 
    }

    public function new_textarea($name='', $value='', $attributes='')
    {
        $attributeString = $this->attributes_creator($attributes);

        $textarea = '<textarea name="' . $name . '" value="' . $value . '" ' . $attributeString . '></textarea>';
        return $textarea;

    }

    public function new_radio($name = '', $value = '', $attributes = '', $checked = false)
    {
        $attributeString = $this->attributes_creator($attributes);

        $checkedAttribute = $checked ? 'checked' : '';

        $radio = '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $attributeString . ' ' . $checkedAttribute . '>';

        return $radio;
    }

    public function new_checkbox($name = '', $value = '', $attributes = '', $checked = false)
    {
        $attributeString = $this->attributes_creator($attributes);

        $checkedAttribute = $checked ? 'checked' : '';

        $radio = '<input type="checkbox" name="' . $name . '" value="' . $value . '" ' . $attributeString . ' ' . $checkedAttribute . '>';

        return $radio;
    }

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
        
        // Modify the dropdown or add additional processing here if needed

        return $dropdown;
    }

    public function new_html($tag='p', $value='', $attributes='')
    {
        $attributeString = $this->attributes_creator($attributes);
        
        return '<' . $tag . ' ' . $attributeString . '>' . $value . '</' . $tag . '>';
    }
    
    /* Form Creation Helper Class */
        
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

    public function export_to_pdf($formData){
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
        echo $os;
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
		// $globaloptions = array(
		// 	'title' => 'Meow',
		// );
		// $pdf->setOptions($globaloptions);
        $pdf->addPage($html);
		
        $pdfContent = base64_encode($pdf->toString());
        
        $pdfIframe = '<iframe id="pdf-view" src="data:application/pdf;base64,' . $pdfContent . '" width="100%" height="600px"></iframe>';

        return $pdfIframe;
    }
} 