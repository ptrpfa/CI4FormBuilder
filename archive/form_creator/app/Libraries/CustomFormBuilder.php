<?php
/* OLD Form Builder Controller */

namespace App\Libraries;

use App\Models\FormModel;

class CustomFormBuilder
{
    protected $formModel;

    public function __construct()
    {
        $this->formModel = new FormModel();
    }

    public function createForm($formid)
    {
        // Retrieve form template from the database based on the formid
        $formTemplate = $this->formModel->getFormTemplateById($formid);

        // Check if the form template exists and has fields
        if ($formTemplate) {
            // Decode the JSON to an array
            $fields = json_decode($formTemplate['fields']);

            // Generate the form view template dynamically based on the form template
            $formViewTemplate = '<form action="submit-form" method="post">';
            foreach ($fields as $field) {
                $formViewTemplate .= '<label>' . $field->label . '</label>';
                $formViewTemplate .= '<input type="' . $field->type . '" name="' . $field->name . '" required>';
            }
            $formViewTemplate .= '<button type="submit">Submit</button>';
            $formViewTemplate .= '</form>';

            return $formViewTemplate;
        } else {
            return 'Form template not found or invalid.';
        }
    }

    public function storeFormData($data, $userid, $formid)
    {
        // Store the form data in the database with the userid and formid
        $formData = [
            'userid' => $userid,
            'formid' => $formid,
            'data' => json_encode($data) // Assuming you want to store the data as JSON
        ];

        $this->formModel->insertData($formData);
    }

    public function saveFormTemplate($formTemplate)
    {
     
        //Call the model to insert
        $formid = $this->formModel->createForm($formTemplate);
            
        // Return the formid
        return $formid;
    }
}
