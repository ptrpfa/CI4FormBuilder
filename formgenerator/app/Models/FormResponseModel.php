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
}