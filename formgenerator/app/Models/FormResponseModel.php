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
        $this->insert([
            'FormID' => $formID,
            'User' => $user,
            'Response' => $formData
        ]);
    }

    //Update the form data
    public function updateFormData($formData, $formID, $user)
    {

    }

    //Delete the form data
	public function deleteFormData($responseID)
	{	
		// Find the specific form entry with the provided $responseID and $formID
		$response = $this->where('ResponseID', $responseID)->first();

		if (!$response) {
			throw new PageNotFoundException('Cannot find the response: ' . $responseID );
			$data['title'] = 'Form Deletion';
			return view('admin/users/error', $data);
		}

		// Delete the specific form entry
		$this->delete($response['ResponseID']);
	
		// Redirect to success page
		$data['title'] = 'Form Deletion';
		return view('admin/users/success', $data);
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