<?php

namespace App\Libraries;

use App\Models\FormTemplateModel;

class CustomFormLibrary
{
    private $formTemplateModel;

    public function __construct()
    {
        $this->formTemplateModel = new FormTemplateModel();
    }

    /*** 
        Form HTML Container Creation
    ***/

    public function new_div($data= array(), $row='', $span='', $column='', $attributes='')
    {
        if (is_numeric($row)) {
            $rowClass = 'row-' . $row;
        } else {
            $rowClass = $row;
        }
        if ($span) {
            $columnClass = 'col-' . $span . '-' . $column;
        } elseif ($column) {
            $columnClass = 'col-md-' . $column;
        } else {
            $columnClass = '';
        }
   
        $content = implode('', $data);
        $newDIV =  "<div class='$rowClass $columnClass $attributes'>"
                    . $content
                    . "</div>";

        return $newDIV;
    }

    /*** 
        Form HTML Tags Creation
    ***/

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
    
    /***
        Form Creation Helper Class
    ***/
        
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

    /*** 
        Form Template CRUD
    ***/
    public function newFormTemplate($data)
    {
        $formStructure = '';
        $fields = $data['Structure'];
        
        foreach($fields as $name => $tag){
            if ($name !== 'head' && $name !== 'tail') {
                $formStructure .= '<div class="form-floating">';
                $formStructure .= $tag['group'];
                $formStructure .= '</div><br>';
            }else{
                $formStructure .= $tag['group'];
            }
        }
        
        //Set the new Structure
        $data['Structure'] = serialize($formStructure);

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

    /*** 
        User Response CRUD
    ***/

} 