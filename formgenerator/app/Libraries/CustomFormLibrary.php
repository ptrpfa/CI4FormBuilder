<?php

namespace App\Libraries;

// Imports
use App\Models\FormTemplateModel;
use App\Models\FormResponseModel;

class CustomFormLibrary
{

    // Class variables
    private $formTemplateModel;
    private $formResponseModel;

    // Class constructor
    public function __construct()
    {   
        // Create an instance of both form template and response models
        $this->formTemplateModel = new FormTemplateModel();
        $this->formResponseModel = new FormResponseModel();
    }

    /* Class Functions */

    /*** 
        Form Template CRUD
    ***/
    
    // Function to get a specifed form template from the database
    public function getForm($formID)
    {
        try {
            // Retrieve form template from the database based on the formid
            return $this->formTemplateModel->get_form($formID);
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form retrieval failed: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }
    
    // Function to create a new form template and insert it into the database
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
            $result = $this->formTemplateModel->create_form($data);

            return $result;
        }catch(\Exception $e){
            // Log the error or display a user-friendly error message
            log_message('error', 'Form insertion failed: ' . $e->getMessage());
            
            throw $e;
        }
    }

    // Function to update a specified form template in the database
    public function updateForm($formID, $data) 
    {
        null;
    }

    // Function to delete a specified form in the database
    public function deleteForm($formID) {
        null;
    }

    /*** 
        User Response CRUD
    ***/

    // Something here
    // ..
    // ..

    /*** 
        Table helper function
    ***/

    function generate_table($tableTitle, $columnTitles, $data, $type, $actions)
    {
        $table = '<div class="table-container" style="margin:3%;">';
        $table .= '<div class="d-flex justify-content-between align-items-center">';
        $table .= '<h3>' . $tableTitle . '</h3>';
        $table .= '<button onclick="location.href=\''.site_url($actions['New']).'\'" class="btn btn-danger">New</button>';
        $table .= '</div>';
        $table .= '<div class="table-responsive">';
        $table .= '<table class="table table-hover">';
        $table .= '<thead><tr>';
        foreach ($columnTitles as $columnTitle) {
            $table .= '<th class="col-2 text-nowrap">' . $columnTitle . '</th>';
        }
        $table .= '<th class="col-2 text-nowrap">Action</th>';
        $table .= '</tr></thead>';
    
        $table .= '<tbody>';
        foreach ($data as $row) {
            $table .= '<tr>';
            $table .= '<td>';
            $table .= '<div class="' . $type . '">';
            $table .= '<span class="dropdown-toggle mr-2" id="dropdown_' . $row['id'] . '"></span>';
            $table .= $row['name'];
            $table .= '</div>';
            $table .= '</td>';
    
            $skipFirstColumn = true;
            foreach ($columnTitles as $columnTitle) {
                if ($skipFirstColumn) {
                    $skipFirstColumn = false;
                    continue;
                }
            
                $table .= '<td>' . ($row[$columnTitle] ?? '') . '</td>';
            }
            
            if(array_key_exists('Create', $actions) || array_key_exists('DeleteAll', $actions)){
                $table .= '<td>';
                $table .= '<div class="btn-group dropleft">';
                $table .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $table .= 'Do What Nig';
                $table .= '</button>';
                $table .= '<div class="dropdown-menu">';
                if (array_key_exists('Create', $actions)) {
                    $table .= '<button onclick="location.href=\''.site_url($actions['Create']).'\'" class="dropdown-item" type="button">New Form</button>';
                }
                if (array_key_exists('DeleteAll', $actions)) {
                    $table .= '<button onclick="location.href=\''.site_url($actions['DeleteAll']).'\'"class="dropdown-item" type="button" style="color:red;">Delete</button>';
                }
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</td>';       
            }else{
                $table .= '<td></td>';
            }

            $table .= '</tr>';
    
            if (isset($row['Subrows']) && is_array($row['Subrows'])) {
                $table .= '<tbody class="subrows hide" id="subrows_' . $row['id'] . '" >';
                foreach ($row['Subrows'] as $subrow) {
                    $table .= '<tr style="background-color:#f0f0f0;" >';
                    $table .= '<td></td>';
                    foreach($subrow as $key=>$value){
                        if($key != 'actions'){
                            $table .= '<td>' . $value . '</td>';
                        }
                    }
                    $rowAction = $subrow['actions'];

                    $table .= '<td>';
                    $table .= '<button onclick="location.href=\''.site_url($rowAction['Read']).'\'" class="btn btn-info mr-2 edit-button">View</button>';
                    $table .= '<button onclick="location.href=\''.site_url($rowAction['Update']).'\'" class="btn btn-primary mr-2 edit-button">Edit</button>';
                    $table .= '<button onclick="location.href=\''.site_url($rowAction['Delete']).'\'" class="btn btn-danger delete-button">Delete</button>';
                    $table .= '</td>';  
                    $table .= '</tr>';
                }
                $table .= '</tbody>';
            }
        }
        $table .= '</tbody>';
    
        $table .= '</table>';
        $table .= '</div>';
    
        $table .= '</div>';
    
        return $table;
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

} 