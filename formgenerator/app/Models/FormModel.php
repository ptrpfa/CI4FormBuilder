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

        // Initialise return variables
        $forms = null;
        $form_structures = null;

        // Check if a formID was specified
        if ($formID !== null) {
            // Retrieve the specified form
            $form = $this->find($formID);
            // Check if a valid form is obtained
            if ($form) {
                // Unserialize form structure and rules
                $form['Structure'] = unserialize($form['Structure']);
                $form['Rules'] = unserialize($form['Rules']);
                // Remove unnecessary keys if returning structure only
                if ($structure_only) {
                    $form_structures = $form['Structure'];
                } else {
                    $forms = $form;
                }
            } else {
                // Throw an exception if the form is not found
                throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
            }
        }
        // No formID specified
        else {
            // Retrieve all form data
            $forms = $this->findAll();
            // Loop through each form
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
        return $structure_only ? $form_structures : $forms;
        /* 
         * formID = null, structure_only = true => returns $form_structure (return all unserialised form structures)
         * formID = null, structure_only = false => returns all $forms (return all forms, with serialised form structures)
         * formID = 1, structure_only = true => returns $form_structure (return unserialised form structure of specified form)
         * forId = 1, structure_only = false => returns $forms (return specified form)
        */
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
                    'Version' => 1.0,
                    'Description' => 'Sample format',
                    'Structure' => Serialised HTML form structure
                    'Status' => 1
                    'Rules' => Serialised parameter rules
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
            Format:
                $data  = [
                    'Name' => 'Form template name',
                    'Version' => 1.0,
                    'Description' => 'Sample format',
                    'Structure' => Serialised HTML form structure
                    'Status' => 1
                    'Rules' => Serialised parameter rules
                ];
        */
        // Get specified form
        $form = $this->find($formID);
        // Check if a valid formID was provided
        if ($form) {
            // Update form template's active status
            $this->update($formID, $data);
        } else {
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
        if ($form) {
            $data = ['Status' => $new_status];
            $data['deletedAt'] = ($new_status == 0) ? date('Y-m-d H:i:s') : null;
            // Update form template's active status
            $this->update($formID, $data);
        } else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }

    // Function to update the status of all versions of a specified form template
    public function update_all_form_status($formID, $new_status)
    {
        /* 
            Arguments:
            $formID: Form template to be updated
        */
        // Get specified form
        $form = $this->find($formID);
        // Check if a valid formID was provided
        if ($form) {
            // Get targeted forms
            $forms = $this->where('Name', $form['Name'])->findAll();
            // Set data to be updated
            $data = ['Status' => $new_status];
            $data['deletedAt'] = ($new_status == 0) ? date('Y-m-d H:i:s') : null;
            // Loop through each form and update its data
            foreach ($forms as $target) {
                $this->update($target['FormID'], $data);
            }
        } else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }

    // Function to check if a given form is active
    public function is_active($formID)
    {
        // Get form
        $form = $this->find($formID);
        // Check if a valid form was obtained
        if ($form) {
            return $form['Status'] == 1;
        } else {
            // Exception handling
            throw new \Exception('Form template not found or invalid for FormID: ' . $formID);
        }
    }
}