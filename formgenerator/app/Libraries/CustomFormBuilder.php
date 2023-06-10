<?php

namespace App\Libraries;

class CustomFormBuilder extends Form
{

    public function createFormTemplate($fields)
    {
        //Get back the form templates 
        $formInputs = $this->generateformInputs($fields);

        //Create the form
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

        return $formViewTemplate;
    }
    
}