<?php

namespace App\Libraries;

class Form {
    private $fieldTypes;

    public function __construct() {
        $this->fieldTypes = [
            'checkbox' => "<input type='checkbox' class='%s' id='%s' name='%s' value='%s'>",
            'text' => "<input type='text' name='%s' class='%s' placeholder='%s' %s %s>",
            'textarea' => "<textarea name='%s' class='%s' placeholder='%s' %s %s></textarea>"
        ]; //Expand when needed
    }

    protected function generateformInputs($fields) {

        $formInputs = [];
        $formLabel = "<label for='%s' class='%s'>%s</label>";

        foreach ($fields as $field) {
            $name = $field['label'];
            $type = $field['type'];
            $label_class = $field['label_class'];
            $required = $field['required'] ? 'required' : '';
            $disabled = $field['disabled'] ? 'disabled' : '';

            //Default file type is text
            $formElement = isset($this->fieldTypes[$type]) ? $this->fieldTypes[$type] : $this->fieldTypes['text'];

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
                //     'label' => sprintf($formLabel, $name, $name),  
                //     'checkboxes' => [
                //         [
                //             'input' => sprintf($formElement, $checkname, $checkname, $checkvalue),
                //             'label' => sprintf($formLabel, $checkname, $checkname)
                //         ],
                //         [
                //             'input' => sprintf($formElement, $checkname, $checkname, $checkvalue),
                //             'label' => sprintf($formLabel, $checkname, $checkname)
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
}