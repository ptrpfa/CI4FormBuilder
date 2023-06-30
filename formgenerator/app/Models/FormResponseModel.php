<?php
namespace App\Models;

use CodeIgniter\Model;

class FormResponseModel extends Model
{
    // Model fields
    protected $table = 'Response';
    protected $primaryKey = 'ResponseID';
    protected $allowedFields = ['FormID', 'User', 'Response'];

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

    //Get All Data
    public function getAllData()
    {
        // Build joined query using the form response model as the base
        $builder = $this->table('Response');
        $builder->select('Form.*, Response.ResponseID, Response.Datetime, Response.User, Response.Response');   // Selected columns
        $builder->join('Form', 'Form.FormID = Response.FormID');                                                // Join condition

        // Form query
        $query = $builder->get();
        
        // Check for database errors
        if ($query === false) {
            $error = $this->db->error();
            throw new Exception("Database Error: {$error['message']}");
        }

        // Return results
        return $query->getResult();
    }
}