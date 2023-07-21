<?php
namespace App\Models;

use CodeIgniter\Model;

class FormResponseModel extends Model
{
    // Model fields
    protected $table = 'Response';
    protected $primaryKey = 'ResponseID';
    protected $allowedFields = ['FormID', 'Datetime', 'User', 'Response'];

    // Function to get a specific form response from the database
    public function retrieveFormData($responseID)
    {
        try {
            return $this->where(['ResponseID'=>$responseID])->first();
        }
        catch(\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Form response not found or invalid: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }
    
    // Function to insert a form response into the database
    public function insertFormData($formID, $user, $formData)
    {
        $this->insert([
            'FormID' => $formID,
            'User' => $user,
            'Response' => $formData
        ]);
    }

    // Function to update a form response in the database
    public function updateFormData($responseID, $formData)
    {
        $this->update($responseID, $formData);
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
        $data['responseID'] = $responseID;
		return view('admin/users/delete_success', $data);
	}

    // Function to get all form response and template data from the database
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

    // Get the username based on the responseID
    public function getUsernameByResponseID($responseID)
    {
        try {
            $response = $this->where('ResponseID', $responseID)->first();
            if ($response) {
                return $response['User'];
            } else {
                // Handle the case when the response is not found
                log_message('error', 'Failed to get username: ' . $e->getMessage());
                return null; // or throw an exception, display an error message, etc.
            }
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            log_message('error', 'Failed to get username: ' . $e->getMessage());
            // Throw exception
            throw $e;
        }
    }

    // Function for file upload (to get next response ID)
    public function get_next_id()
    {
        // Build query
        $builder = $this->db->table('Response');
        $builder->selectMax('ResponseID');
        $query = $builder->get();
        
        // Return results
        return intval($query->getFirstRow()->ResponseID) + 1;
    
    }

}