<?php
namespace App\Models;

use CodeIgniter\Model;

class FormResponseModel extends Model
{
    // Model fields
    protected $table = 'Response';
    protected $primaryKey = 'ResponseID';
    protected $allowedFields = ['FormID', 'User', 'Response'];

    // Function to get all form response and template data from the database
    public function get_all_data() 
    {
        // Build joined query 
        $builder = $this->db->table('Response');
        $builder->select('Form.*, Response.ResponseID, Response.Datetime, Response.User, Response.Response');   // Selected columns
        $builder->join('Form', 'Form.FormID = Response.FormID');                                                // Join condition

        // Form query
        $query = $builder->get();
        
        // Return results
        return $query->getResult();
    }

    //Get the form data
    public function retrieveFormData($formData, $formID, $user)
    {

    }
    
    //Inserting form data
    public function insertFormData($formID, $user, $formData)
    {
        $this->insert($formID, $user, $formData);
    }

    //Update the form data
    public function updateFormData($formData, $formID, $user)
    {

    }

    //Delete the form data
    public function deleteFormData($formData, $formID, $user)
    {

    }
}