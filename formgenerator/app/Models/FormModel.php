<?php
namespace App\Models;

// Imports
use CodeIgniter\Model;

class FormModel extends Model
{   
    // Model fields
    protected $table = 'Form';
    protected $primaryKey = 'FormID';
    protected $allowedFields = ['Name', 'Version', 'Datetime', 'Description', 'Structure', 'Status'];

    // Function to get a specified form or all form data from the database
    public function get_form($formID = null, $structure_only = true)
    {   
        /* 
            Arguments:
            $formID: Default value of null will fetch all form templates from the database. If a form ID is specified, fetch the specified form template from the database.
            $structure_only: Default value of true will only return the unserialised structure of forms. If false, return all form template data.
        */

        // Check if a formID was not provided
        if(!$formID) {
            // Check if only the structure of forms are to be returned
            if($structure_only) {
                // Initialise empty array
                $form_structures = [];
                // Loop through each form
                foreach($this->findAll() as $form) {
                    // Append unserialised form structure into array
                    array_push($form_structures, unserialize($form['Structure']));
                }
                // Return array of unserialised form structures
                return $form_structures;
            }
            else {
                // Return all form data
                return $this->findAll();
            }
        }
        // A valid formID was provided
        else {
            // Get specified form
            $form = $this->find($formID);
            // Check if a valid form was obtained
            if($form) {     
                // Return all form data or the unserialised form structure only, depending on the value of the boolean flag
                return $structure_only ? unserialize($form['Structure']) : $form;
            }
            else {
                // Exception handling
                throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
            }
        }
    }

    // Function to create a new form template and insert it into the database
    public function create_form($data)
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
        // Create new form template and insert it into the database
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
        /* 
            Arguments:
            $formID: Form template to be deleted
        */
        // Get specified form
        $form = $this->find($formID);
        // Check if a valid formID was provided
        if($form) {     
            // Update form template's active status
            $this->update($formID, ['Status' => 0]);
        }
        else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }

    // Function to delete all versions of a specified form template
    public function delete_all_forms($formID)
    {
        /* 
            Arguments:
            $formID: Form template to be deleted
        */
        // Get specified form
        $form = $this->find($formID);
        // Check if a valid formID was provided
        if($form) {     
            // Get targeted forms
            $forms = $this->where('Name', $form['Name'])->findAll();
            // Loop through each form and update its status
            foreach($forms as $target) {
                $this->update($target['FormID'], ['Status' => 0]);
            }
        }
        else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }

}