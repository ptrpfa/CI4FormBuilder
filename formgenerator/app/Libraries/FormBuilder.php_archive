<?php

namespace App\Libraries;

use App\Models\FormTemplateModel;

class CustomFormBuilder
{   
    // Class instance
    private $formTemplateModel;

    // Constructor
    public function __construct()
    {
        $this->formTemplateModel = new FormTemplateModel();
    }

    // Function to render HTML input elements
    private function generateFormInputs($fields){
        /* Initialsie HTML input components */
        // Types of input fields
        $fieldTypes = [
            'checkbox' => "<input type='checkbox' class='%s' id='%s' name='%s' value='%s'>",
            'text' => "<input type='text' name='%s' class='%s' placeholder='%s' %s %s>",
            'textarea' => "<textarea name='%s' class='%s' placeholder='%s' %s %s></textarea>"
        ]; 
        // Label field
        $formLabel = "<label for='%s' class='%s'>%s</label>";
        $formInputs = [];

        foreach ($fields as $field) {
            $name = $field['label'];
            $type = $field['type'];
            $label_class = $field['label_class'];
            $required = $field['required'] ? 'required' : '';
            $disabled = $field['disabled'] ? 'disabled' : '';

            //Default field type is text
            $formElement = isset($fieldTypes[$type]) ? $fieldTypes[$type] : $fieldTypes['text'];

            // Specific input type rendering
            if($type === 'checkbox'){
                $checkboxes = $field['checkboxes'];

                //Create the top label
                $formInputs[$name] = [
                    'label' => sprintf($formLabel, $name,  $label_class, $name),  
                    'checkboxes' => []   
                ];

                foreach ($checkboxes as $checkbox){
                    $checkname = $checkbox['name'];
                    $checkvalue = $checkbox['value'];
                    $label_class = $checkbox['label_class'];
                    $type_class = $checkbox['type_class'];

                    $box = [
                        'input' => sprintf($formElement, $type_class, $checkname, $checkname, $checkvalue),
                        'label' => sprintf($formLabel, $checkname, $label_class, $checkname)
                    ];

                    //Append in the checkbox
                    array_push($formInputs[$name]['checkboxes'], $box);
                }

                //formInputs Example
                // $formInputs[$name] = [
                //     'label' => sprintf($formLabel, $name,  $label_class, $name), 
                //     'checkboxes' => [
                //         [
                //              'input' => sprintf($formElement, $type_class, $checkname, $checkname, $checkvalue),
                //              'label' => sprintf($formLabel, $checkname, $label_class, $checkname)
                //         ],
                //         [
                //              'input' => sprintf($formElement, $type_class, $checkname, $checkname, $checkvalue),
                //              'label' => sprintf($formLabel, $checkname, $label_class, $checkname)
                //         ];
                //     ]   
                // ];
            }else{
                $placeholder = $field['placeholder'];
                $type_class = $field['type_class'];
                //Places the different elements from the the top to the formElement
                // 'Field1': "<input type='checkbox' name='%s' class='%s' placeholder='%s' %s %s>"
                $formInputs[$name] = [
                    'label' => sprintf($formLabel, $name, $label_class, $name),     
                    'input' => sprintf($formElement, $name, $type_class, $placeholder, $required, $disabled)
                ];
            }

        }

        return $formInputs;

    }

    // Function to render HTML form
    public function newFormTemplate($data)
    {
        // Render HTML form inputs
        $formInputs = $this -> generateFormInputs($data['Structure']);

        //Create the form template 
        $formViewTemplate = '<form>';
        foreach ($formInputs as $formgroup){
            $formViewTemplate .= '<div class="form-group">';
            $formViewTemplate .= $formgroup['label'];

            if (isset($formgroup['checkboxes'])) {
                $formViewTemplate .= "<br><div class='checkbox-group'>";
                foreach ($formgroup['checkboxes'] as $checkbox) {
                    $formViewTemplate .= "<div class='form-check'>";
                    $formViewTemplate .= $checkbox['input'];
                    $formViewTemplate .= $checkbox['label'];
                    $formViewTemplate .= "</div>";
                }
                $formViewTemplate .= '</div>';
            }else{
                //Normal input like texts
                $formViewTemplate .= $formgroup['input'];
            }
            
            $formViewTemplate .= '</div><br>';
        }

        $formViewTemplate .= '<button type="submit">Submit</button>';
        $formViewTemplate .= '</form>';

        //Set the new Structure
        $data['Structure'] = serialize($formViewTemplate);

        //Send to model to save
        try{
            $result = $this->formTemplateModel->createForm($data);

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