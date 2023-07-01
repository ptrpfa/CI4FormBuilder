<?php

namespace App\Libraries;

// Imports
use App\Models\FormModel;
use App\Models\FormResponseModel;

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
    public function updateForm($formID, $data) 
    {
        null;
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

} 