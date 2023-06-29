<?php
namespace App\Models;

// Imports
use CodeIgniter\Model;

class FormTemplateModel extends Model
{   
    // Model fields
    protected $table = 'Form';
    protected $primaryKey = 'FormID';
    protected $allowedFields = ['Name', 'Version', 'Datetime', 'Description', 'Structure'];

    // Function to get a specified form
    public function get_form($formID)
    {
        //Get form structure 
        $formRow = $this->find($formID);
        
        //Check if empty
        if ($formRow) 
        {     
            return unserialize($formRow['Structure']);
        }else{
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID . '!');
        }
    }

    // Function to create a new form template and insert it into the database
    public function create_form($data)
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
    
    // Function to update a specified form template
    public function update_form($formID, $data)
    {
        null;
    }

    // Function to delete a specified form template
    public function delete_form($formID)
    {
        null;
    }
}