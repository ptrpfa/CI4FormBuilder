<?php
namespace App\Models;

use CodeIgniter\Model;

class FormTemplateModel extends Model
{
    protected $table = 'Form';
    protected $primaryKey = 'FormID';
    protected $allowedFields = ['Name', 'Version', 'Datetime', 'Description', 'Structure'];

    //Get the Form Template
    public function getFormTemplateById($formID)
    {
        //Get form structure 
        $formRow = $this->find($formID);

        if ($formRow) 
        { 
            //Check if empty
            return unserialize($formRow['Structure']);
        }else{
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID . '.');
        }
    }

    //Create a New Form Template
    public function newForm($data)
    {    
        $this->insert($data);

        // Check if the insertion was successful
        if ($this->affectedRows() > 0) {
            // Get the inserted form ID
            $formid = $this->insertID();

            // Return the form ID
            return $formid;
        } else {
            throw new \Exception('Failed to insert form.');
        }
    }
    
    //Update the Form Template
    public function updateForm($formID, $data)
    {

    }

    //Delete the Form Template
    public function deleteForm($formID)
    {
        
    }
}