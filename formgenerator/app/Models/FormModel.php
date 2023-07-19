<?php
namespace App\Models;

// Imports
use CodeIgniter\Model;

class FormModel extends Model
{   
    // Model fields
    protected $table = 'Form';
    protected $primaryKey = 'FormID';
    protected $allowedFields = ['Name', 'Version', 'Datetime', 'Description', 'Structure', 'Status', 'deletedAt', 'Rules'];

    // Function to get a specified form or all form data from the database
    public function get_form($formID = null, $structure_only = true)
    {   
        /* 
            Arguments:
            $formID: Default value of null will fetch all form templates from the database. If a form ID is specified, fetch the specified form template from the database.
            $structure_only: Default value of true will only return the unserialised structure of forms. If false, return all form template data.
        */

        // // Check if a formID was not provided
        // if(!$formID) {
        //     // Check if only the structure of forms are to be returned
        //     if($structure_only) {
        //         // Initialise empty array
        //         $form_structures = [];
        //         // Loop through each form
        //         foreach($this->findAll() as $form) {
        //             // Append unserialised form structure into array
        //             array_push($form_structures, unserialize($form['Structure']));
        //         }
        //         // Return array of unserialised form structures
        //         return $form_structures;
        //     }
        //     else {
        //         // Return all form data
        //         $forms = $this->findAll();

        //         foreach ($forms as &$form) {
        //             // Unserialize form structure and rules
        //             $form['Structure'] = unserialize($form['Structure']);
        //             $form['Rules'] = unserialize($form['Rules']);
        //         }
                
        //         return $forms;
        //     }
            
        // }
        // // A valid formID was provided
        // else {
        //     // Get specified form
        //     $form = $this->find($formID);
        //     // Check if a valid form was obtained
        //     if($form) {     
        //         // Return all form data or the unserialised form structure only, depending on the value of the boolean flag
        //         $form['Structure'] = unserialize($form['Structure']);
        //         $form['Rules'] = unserialize($form['Rules']);

        //         return $structure_only ? $form['Structure'] : $form;
        //     }
        //     else {
        //         // Exception handling
        //         throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        //     }
        // }

        $forms = null;
        $form_structures = [];
        
        if ($formID !== null) {
            // Retrieve the specified form
            $form = $this->find($formID);
        
            if ($form) {
                // Unserialize form structure and rules
                $form['Structure'] = unserialize($form['Structure']);
                $form['Rules'] = unserialize($form['Rules']);
        
                // Remove unnecessary keys if returning structure only
                if ($structure_only) {
                    $form_structures[] = $form['Structure'];
                } else {
                    $forms = $form;
                }
            } else {
                // Throw an exception if the form is not found
                throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
            }
        } else {
            // Retrieve the form data
            $forms = $this->findAll();
        
            foreach ($forms as &$form) {
                // Unserialize form structure and rules
                $form['Structure'] = unserialize($form['Structure']);
                $form['Rules'] = unserialize($form['Rules']);
        
                // Remove unnecessary keys if returning structure only
                if ($structure_only) {
                    $form_structures[] = $form['Structure'];
                    unset($form['Rules']);
                }
            }
        }

        // Return the form data
        /* 
         * formID = null, structure = true => returns $form_structure
         * formID = null, structure = false => returns all $forms
         * formID = 1, structure = true => returns all $form_structure
         * forId = 1, structure = false => returns $forms (single)
        */
        return $structure_only ? $form_structures : $forms;
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
        /* 
            Arguments:
            $formID: Form template to be updated
            $data: Associative array of data to update
        */
        // Get specified form
        $form = $this->find($formID);
        // Check if a valid formID was provided
        if($form) {     
            // Update form template's active status
            $this->update($formID, $data);
        }
        else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }

    // Function to update the status of a specified form template
    public function update_form_status($formID, $new_status = 0)
    {   
        /* 
            Arguments:
            $formID: Form template to be updated
        */
        // Get specified form
        $form = $this->find($formID);
        // Check if a valid formID was provided
        if($form) {     
            $data = ['Status' => $new_status];
            $data['deletedAt'] = ($new_status == 0) ? date('Y-m-d H:i:s') : null;
            // Update form template's active status
            $this->update($formID, $data);
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
                $this->update($target['FormID'], ['Status' => 0, 'deletedAt' => date('Y-m-d H:i:s')]);
            }
        }
        else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }

    // public function getRules($formID)
    // {
    //     $form = $this->find($formID);
    //     $rules = null;

    //     if ($form && $form->Rule !== null) {
    //         $rules = $form->rule;
    //     }
    
    //     return $rules;
    // }

}