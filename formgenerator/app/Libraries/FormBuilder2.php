<?php

namespace App\Libraries;

use App\Models\FormTemplateModel;

class FormBuilder2
{
    private $formTemplateModel;

    public function __construct()
    {
        $this->formTemplateModel = new FormTemplateModel();
    }
    
    public function new_label($name='', $value='', $attributes='')
    {
        $formLabel = "<label for='" . $name . "' " . $attributes . ">" . $value . "</label>";
        return $formLabel;
    }

    public function new_input($name='', $value='', $attributes='')
    {
        if (is_array($attributes)) {
            $attributeString = '';
            foreach ($attributes as $key => $value) {
                $attributeString .= $key . '="' . $value . '" ';
            }
            // Trim any trailing whitespace
            $attributeString = trim($attributeString);

            $input = '<input type="text" name="' . $name . '" value="' . $value . '" ' . $attributeString . '>';
            return $input;
        }else{
            $input = '<input type="text" name="' . $name . '" value="' . $value . '" ' . $attributes . '>';
            return $input;
        }
    }
    public function new_textarea($name='', $value='', $attributes='')
    {
        if (is_array($attributes)) {
            $attributeString = '';
            foreach ($attributes as $key => $value) {
                $attributeString .= $key . '="' . $value . '" ';
            }
            // Trim any trailing whitespace
            $attributeString = trim($attributeString);

            $input = '<textarea name="' . $name . '" value="' . $value . '" ' . $attributeString . '></textarea>';
            return $input;
        }else{
            $input = '<input type="text" name="' . $name . '" value="' . $value . '" ' . $attributes . '></textarea>';
            return $input;
        }
    }

    public function newFormTemplate($data)
    {

        //Set the new Structure
        $data['Structure'] = serialize($data['Structure']);

        //Send to model to save
        try{
            $result = $this->formTemplateModel->newForm($data);

            return $result;
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form insertion failed: ' . $e->getMessage());
            
            throw $e;
        }
    }

    public function getForm($formID)
    {
        // Retrieve form template from the database based on the formid
        try{
            $formTemplate = $this->formTemplateModel->getFormTemplateById($formID);

            return $formTemplate;
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form retrieval failed: ' . $e->getMessage());

            throw $e;
        }
    }
} 